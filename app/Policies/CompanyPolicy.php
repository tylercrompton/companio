<?php

namespace App\Policies;

use App\Company;
use App\User;
use App\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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
     * Determine whether the user can view any companies.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->role == UserRole::manager;
    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  User  $user
     * @param  Company  $company
     * @return bool
     */
    public function view(User $user, Company $company)
    {
        return !is_null($company->managers()->find($user->id));
    }

    /**
     * Determine whether the user can create companies.
     *
     * @return bool
     */
    public function create()
    {
        return false;
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  User  $user
     * @param  Company  $company
     * @return bool
     */
    public function update(User $user, Company $company)
    {
        return !is_null($company->managers()->find($user->id));
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @return bool
     */
    public function delete()
    {
        return false;
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @return bool
     */
    public function restore()
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @return bool
     */
    public function forceDelete()
    {
        return false;
    }
}
