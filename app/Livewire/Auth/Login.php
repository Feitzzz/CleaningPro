<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', __('auth.failed'));
            return;
        }

        $user = Auth::user();
        if ($user->user_type === 'cleaner') {
            $this->redirect(route('cleanerdashboard', absolute: false), navigate: true);
            echo "<script>window.location.href = '" . route('cleanerdashboard', [], false) . "';</script>";
            exit;
        } elseif ($user->user_type === 'recruiter') {
            $this->redirect(route('recruiterdashboard', absolute: false), navigate: true);
            echo "<script>window.location.href = '" . route('recruiterdashboard', [], false) . "';</script>";
            exit;
        } else {
            $this->redirect(route('dashboard', absolute: false), navigate: true);
            echo "<script>window.location.href = '" . route('dashboard', [], false) . "';</script>";
            exit;
        }
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
