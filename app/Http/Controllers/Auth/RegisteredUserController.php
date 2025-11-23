<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        // Generate random math captcha
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $question = "What is {$num1} + {$num2}?";
        $answer = $num1 + $num2;
        
        // Store in session
        session(['captcha_question' => $question, 'captcha_answer' => $answer]);
        
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value != session('captcha_answer')) {
                        $fail('The captcha answer is incorrect.');
                    }
                },
            ],
        ]);

        // Clear captcha from session
        session()->forget(['captcha_question', 'captcha_answer']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
