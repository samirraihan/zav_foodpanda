<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SsoController extends Controller
{
    public function check()
    {
        $token = request('token');

        if (!$token) {
            return redirect('/login');
        }

        $response = Http::withToken($token)
            ->get(config('services.ecommerce.url') . '/api/me');

        if (!$response->successful()) {
            return redirect('/login');
        }

        $data = $response->json();

        $user = User::firstOrCreate(
            ['email' => $data['email']],
            [
                'name' => $data['name'],
                'password' => bcrypt('password')
            ]
        );

        Auth::login($user);

        return redirect('/dashboard');
    }
}
