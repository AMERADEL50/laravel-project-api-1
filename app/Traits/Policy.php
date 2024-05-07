<?php
namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Policy{

    function checkUserAbilitis($abilities)
    {
        // $user_abilites = explode('|', Auth::user()->roles);

        $user_abilites = Auth::user()->roles;

        return  count(array_intersect($user_abilites, $abilities)) > 0 ? true : false;
    }
}
