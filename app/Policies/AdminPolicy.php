<?php

namespace App\Policies;

use App\Admin_user;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
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

    public function yuan(User $admin_user)
    {
        dd($admin_user);
    }
}
