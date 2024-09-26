<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'phoneNumber' => [
                    'required',
                    'string',
                    'size:11',
                    'unique:' . User::class,
                    'regex:/^01[0-9]{9}$/'
                ],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'phoneNumber.required' => 'The phone number field is required.',
                'phoneNumber.size' => 'The phone number field must be exactly 11 number.',
                'phoneNumber.unique' => 'The phone number has already been taken.',
                'phoneNumber.regex' => 'It must start with 01',
            ]
        );

        $user = User::create([
            'type' => 'customer',
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->type === 'customer') {
            return redirect()->route('customer.dashboard');
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
