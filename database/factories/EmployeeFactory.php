<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company_id' => Company::all()->random()->id,  // assumes that at least one company exists
        'email' => $faker->companyEmail,
        /*
         * Faker's generator's phoneNumber and e164PhoneNumber properties tend
         * to evaluate to syntactically invalid phone numbers because it uses
         * uses random digits. Though the formatting is serviceable, not all
         * digit combinations are syntactically valid. However, its
         * tollFreePhoneNumber property seems to evaluate to a syntactically
         * valid phone number every time, so we'll use that.
         */
        'phone' => phone($faker->tollFreePhoneNumber, 'US', 'E164'),
    ];
});
