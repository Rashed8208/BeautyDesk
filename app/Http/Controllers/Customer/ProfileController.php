<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Show customer profile.
     */
    public function show(): View
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.profile.show', compact('customer'));
    }


    /**
     * Show customer profile edit page.
     */
    public function edit(): View
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.profile.edit', compact('customer'));
    }


    /**
     * Update customer profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // Get authenticated customer.
        $customer = Auth::guard('customer')->user();

        // Validate submitted information.
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
                Rule::unique('customers', 'email')
                    ->ignore($customer->id),
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'current_password' => [
                'nullable',
                'required_with:password',
                'string',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

        ]);


        // Verify current password before changing password.
        if (!empty($validated['password'])) {

            if (
                empty($validated['current_password']) ||
                !Hash::check(
                    $validated['current_password'],
                    $customer->password
                )
            ) {
                return back()
                    ->withErrors([
                        'current_password' =>
                            'Your current password is incorrect.',
                    ])
                    ->withInput(
                        $request->except([
                            'current_password',
                            'password',
                            'password_confirmation',
                        ])
                    );
            }
        }


        // Update customer details.
        $customer->name = $validated['name'];
        $customer->email = $validated['email'];
        $customer->phone = $validated['phone'] ?? null;
        $customer->address = $validated['address'] ?? null;


        // Change password only if a new password was provided.
        if (!empty($validated['password'])) {

            $customer->password = Hash::make(
                $validated['password']
            );
        }


        // Save updated information.
        $customer->save();


        // Redirect to profile page with success message.
        return redirect()
            ->route('customer.profile.show')
            ->with(
                'success',
                'Your profile has been updated successfully.'
            );
    }
}
