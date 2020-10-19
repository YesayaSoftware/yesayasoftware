<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the given profile.
     *
     * @param  \App\User $signedInUser
     * @param  \App\User $user
     * @return boolean
     */
    public function update(User $signedInUser, User $user)
    {
        return $signedInUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the given profile.
     *
     * @param  \App\User $signedInUser
     *
     * @return boolean
     */
    public function admin(User $signedInUser)
    {
        return $signedInUser->isAdmin();
    }
}
