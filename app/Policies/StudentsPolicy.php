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
    function update(User $user)
    {
        return $user->role === 'USER';
    }
    function view(User $user)
    {
        
        return $user->role === '';
    }
}
