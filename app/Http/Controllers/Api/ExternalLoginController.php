<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExternalLoginController extends Controller
{
    public function login(Request $request)
    {
        $userData = $request->user;

        $user = User::firstOrCreate(
            ['email' => $userData['email']],
            ['name' => $userData['name'], 'password' => bcrypt('password')]
        );

        Auth::login($user);

        return response()->json(['success' => true]);
    }
}
