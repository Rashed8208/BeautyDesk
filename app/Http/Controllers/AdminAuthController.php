<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Login Page
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('Authentication.admin.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Admin Login
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ]);

        if (
            Auth::guard('web')
                ->attempt($credentials, $request->boolean('remember'))
        ) {

            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid admin email or password.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | Admin Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login');
    }
}