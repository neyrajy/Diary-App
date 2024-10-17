<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $request->session()->regenerate();
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Redirect based on user role
        if ($user->role_id == 1) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->role_id == 2) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id == 3) {
            return redirect()->route('manager.dashboard');
        } elseif ($user->role_id == 4) {
            return redirect()->route('parent.dashboard');
        } elseif ($user->role_id == 5) {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->role_id == 6) {
            return redirect()->route('driver.dashboard');
        } elseif ($user->role_id == 7) {
            return redirect()->route('staff.dashboard');
        }else{
            return redirect()->back()->with('error_message_out','Icorrect username or password!');
        }
    
        // Default redirection if no role matches
        // return redirect()->intended(RouteServiceProvider::HOME);
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
