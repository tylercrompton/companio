<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // If you seeded the user table prior to applying this migration, then
        // you will need to reseed it or manually update the records so that
        // the administrators and managers get the proper role.
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'manager', 'admin'])
                ->default('user')
                ->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
}
