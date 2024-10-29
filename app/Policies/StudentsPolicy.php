<?php

namespace App\Policies;

use App\Models\activities;
use App\Models\User;

class StudentsPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {}
    // function update(User $user)
    // {
    //     return $user->role === 'USER';
    // }
    function create(User $user)
    {
        return $user->isAdministrator();
    }



    function view(User $user)
    {
        if ($user->isUser()) {
            return true;
        } else if ($user->isAdministrator()) {
            return true;
        } else {
            return false;
        }
    }
    function MyActivity(User $user)
    {
        if ($user->isUser()) {
            return true;
        }
    }


    function delete(User $user): bool
    {
        // to make sure there is products_count.
        // $act->loadCount('rewards');//count on function name types
        
        if ($user->isAdministrator()) {
            return true;
        }
        return false;
    }
}
