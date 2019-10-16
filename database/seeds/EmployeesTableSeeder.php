<?php

use Illuminate\Database\Seeder;

use App\Company;
use App\Employee;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Company::exists()) {
            factory(Company::class, 1)->create();
        }

        factory(Employee::class, 1000)->create();
    }
}
