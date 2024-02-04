<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class OwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkowner(User $user)
    {
        return ($user->role=="owner")
        ? Response::allow()
        : Response::deny("You don't have access to this function.");
    }
}
