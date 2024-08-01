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
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],           
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => 4,

        ]);

        event(new Registered($user));

        Auth::login($user);
        switch ($user->role_id) {
            case 4: // Parent
                return redirect()->route('parent.dashboard')->with('success', 'Parent registered successfully.');
                break;
            // Add cases for other roles as needed
            default:
                return redirect()->route('welcome');
        }
    }
}
