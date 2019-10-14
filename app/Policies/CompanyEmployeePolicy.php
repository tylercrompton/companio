<?php

namespace App\Policies;

use App\Employee;
use App\User;
use App\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyEmployeePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool|void
     */
    public function before(User $user)
    {
        if ($user->role == UserRole::admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any employees.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return mixed
     */
    public function view(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return mixed
     */
    public function update(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return mixed
     */
    public function delete(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can restore the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return mixed
     */
    public function restore(User $user, Employee $employee)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the employee.
     *
     * @param  User  $user
     * @param  Employee  $employee
     * @return mixed
     */
    public function forceDelete(User $user, Employee $employee)
    {
        //
    }
}
