<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['max:255', 'required'],
            'username' => ['max:255', 'required', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255', Password::min(8)]
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
