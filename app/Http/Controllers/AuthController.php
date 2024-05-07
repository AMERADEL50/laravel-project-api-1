<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {

        // return 'LOGIN';
        $credentials = $request->only("email", "password");

        // Check if the email and password are valid to login(Authentication)
        $auth = Auth::attempt($credentials);

        if ($auth) {
            // Get the authenticated user data
            $auth_user = Auth::user();

            // $user = User::where('id', $auth_user->id);
            $user = User::find($auth_user->id);

            // $token_obj = $user->createToken('');
            // $token = $token_obj->plainTextToken;

            $abilities = explode('|', $user->roles);

            $token = $user->createToken('api_login', $abilities)->plainTextToken;

            $user['token'] = $token;

            return $user;
        }
        return 'Not Correct!';
    }

    function register()
    {
        return 'register';
    }

    function forget_password()
    {
        return 'forget_password';
    }

    function reset_password()
    {
        return 'reset_password';
    }

}
