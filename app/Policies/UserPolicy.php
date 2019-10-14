<?php

namespace App\Policies;

use App\User;
use App\UserRole;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $authUser
     * @param  User  $modelUser
     * @return bool
     */
    public function view(User $authUser, User $modelUser)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $authUser
     * @param  User  $modelUser
     * @return bool
     */
    public function update(User $authUser, User $modelUser)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $authUser
     * @param  User  $modelUser
     * @return bool
     */
    public function delete(User $authUser, User $modelUser)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $authUser
     * @param  User  $modelUser
     * @return bool
     */
    public function restore(User $authUser, User $modelUser)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $authUser
     * @param  User  $modelUser
     * @return bool
     */
    public function forceDelete(User $authUser, User $modelUser)
    {
        return false;
    }
}
