<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class StaffPolicy
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

    public function checkstaff(User $user)
    {
        return ($user->role=="staff" || $user->role=="owner")
        ? Response::allow()
        : Response::deny("You don't have access to this function.");

    }
}
