<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, User $targetuser)
    {
        return $user->role_id === 1 && $targetuser->role_id === 1;
    }
}
