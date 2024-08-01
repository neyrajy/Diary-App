<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function authenticate()
    // {
    //     $this->ensureIsNotRateLimited();

    //     /*
    //     if (! Auth::attempt($this->only('name', 'password'), $this->boolean('remember'))) {
    //         RateLimiter::hit($this->throttleKey());

    //         throw ValidationException::withMessages([
    //             'login' => __('auth.failed'),
    //         ]);
    //     }*/

    //     $user = User::where('email', $this->login)
    //         ->orWhere('fisrstname', $this->login)
    //         ->orWhere('phone', $this->login)
    //         ->first();

    //     if (!$user || !Hash::check($this->password, $user->password)) {
    //         RateLimiter::hit($this->throttleKey());

    //         throw ValidationException::withMessages([
    //             'login' => __('auth.failed'),
    //         ]);
    //     }

    //     Auth::login($user, $this->boolean('remember'));
    //     RateLimiter::clear($this->throttleKey());
    // }
    // Authenticate method in LoginRequest.php

public function authenticate()
{
    $this->ensureIsNotRateLimited();

    $user = User::where('email', $this->login)
        ->orWhere('firstname', $this->login)
        ->orWhere('phone', $this->login)
        ->first();

    if (!$user || !Hash::check($this->password, $user->password)) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => __('auth.failed'),
        ]);
    }

    Auth::login($user, $this->boolean('remember'));
    RateLimiter::clear($this->throttleKey());

    // Redirect based on user role
    if (auth::check() && Auth::user()->role_id == 1) {
        return route('superadmin.dashboard');
    }
    elseif (auth::check() && Auth::user()->role_id == 2) {
        return route('admin.dashboard');
    } elseif (auth::check() && Auth::user()->role_id == 3) {
        return route('manager.dashboard');
    } elseif (auth::check() && Auth::user()->role_id == 4) {
        return route('parent.dashboard');
    }
    elseif (auth::check() && Auth::user()->role_id == 5) {
        return route('teacher.dashboard');
    } elseif (auth::check() && Auth::user()->role_id == 6) {
        return route('driver.dashboard');
    }elseif (auth::check() && Auth::user()->role_id == 7) {
        return route('staff.dashboard');
    } else {
        //return RouteServiceProvider::HOME; // Default home route
        return redirect()->route("login");
    }
}


    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
