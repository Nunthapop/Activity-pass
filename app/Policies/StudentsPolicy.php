<?php

namespace App\Policies;

use App\Models\User;

class StudentsPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
       
    }
    // function update(User $user)
    // {
    //     return $user->role === 'USER';
    // }
    function create (User $user)
    {
        return $user->isAdministrator();
    }



    function view(User $user)
    {
        if ($user->isUser()) {
            return true;
        }
        else if ($user->isAdministrator()) {
            return true;
        }
        else {
            return false;
        }
       
    }
}
