Companio
========

Companio is a “CRM” for companies and their employees.

Requirements
------------

- [PHP][php]
- [Composer][composer]
- [ext-fileinfo][ext-fileinfo]
- [Vagrant][vagrant]

ext-fileinfo should already be included with your PHP installation. However, it's not enabled by default on Windows.

Technically, Vagrant isn't required, so if you feel compelled to avoid it, then you're of course welcome to run this application without it. However, the installation instructions assume that you will use it, so you'll need to significantly deviate from the instructions if that's not the case.

Installation
------------

First, ascertain that the project directory is your current working directory. Then, install all of the Composer packages via the following command:

    $ composer install

Next, generate the Homestead configuration file. On POSIX-compliant systems, this is done as follows:

    $ php vendor/bin/homestead make

On Windows, this is done as follows:

    $ vendor\\bin\\homestead make

Review “Homestead.yaml”. The default configuration is usually sufficient, so changes aren't normally needed.

Moving forward, to run the server, execute the following command:

    $ vagrant up

The first time may take several minutes as it will need to download the `laravel/homestead` Vagrant box first if it's not already on your system. On Windows, you might need to run the above command as an administrator.

You might also want to consider updating your “hosts” file.

We'll do the last bit of setup on the virtual machine. Login via the following command:

    $ vagrant ssh

First, change to the project directory. By default, this is “/home/vagrant/code”.

    (ssh) $ cd code

Then, create a configuration file by copying the `.env.example` file.

    (ssh) $ cp .env.example .env

Next, generate an application key as follows:

    (ssh) $ php artisan key:generate

After that, create a symbolic link as follows:

    (ssh) $ ln -s ../storage/app/public public/storage

Then, run the migrations and seed the database.

    (ssh) $ php artisan migrate --seed

Next, install the Node.js modules.

    (ssh) $ npm install

On Windows, you might run into permission issues with the above command. If so, then do the following:

1. Log out of the virtual machine.
2. Execute `$ vagrant suspend`.
3. Follow the instructions in [this StackOverflow answer][symlink-error].
4. Execute `$ vagrant up`.
5. Execute `(ssh) $ rm -rf node_modules; npm cache clean --force && npm install`.

Finally, compile the assets via following command:

    (ssh) $ npm run dev

[php]: https://www.php.net/
[composer]: https://getcomposer.org/
[ext-fileinfo]: https://www.php.net/manual/en/book.fileinfo.php
[vagrant]: https://www.vagrantup.com/
[symlink-error]: https://superuser.com/questions/210824/creating-a-symbolic-link-to-mapped-network-drive-in-windows/725998#725998
