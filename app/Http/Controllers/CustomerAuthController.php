<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Page
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
         return view('Authentication.customer.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Register Page
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
         return view('Authentication.customer.register');
    }


    /*
    |--------------------------------------------------------------------------
    | Customer Registration
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:customers,email',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        Customer::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => $validated['password'],
        ]);

        return redirect()
            ->route('customer.login')
            ->with(
                'success',
                'Registration successful. Please login.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Customer Login
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
            Auth::guard('customer')
                ->attempt($credentials, $request->boolean('remember'))
        ) {

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()
            ->withErrors([
                'email' => 'Email or password is incorrect.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | Customer Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('customer.login');
    }
}