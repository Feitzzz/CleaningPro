<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $user_type = 'cleaner';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required', 'in:cleaner,recruiter'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        // Create recruiter or cleaner profile
        if ($user->user_type === 'recruiter') {
            \App\Models\Recruiter::create([
                'user_id' => $user->id,
                'company_name' => $user->name . "'s Company",
            ]);
            $this->redirect(route('recruiterdashboard', absolute: false), navigate: true);
        } elseif ($user->user_type === 'cleaner') {
            \App\Models\Cleaner::create([
                'user_id' => $user->id,
                'phone' => null,
                'address' => null,
            ]);
            $this->redirect(route('cleanerdashboard', absolute: false), navigate: true);
        } else {
            $this->redirect(route('dashboard', absolute: false), navigate: true);
        }
    }
}
