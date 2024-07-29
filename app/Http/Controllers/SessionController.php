<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', Rule::exists('users', 'username')],
            'password' => ['required']
        ]);

        if (!auth()->attempt($attributes)){
            throw ValidationException::withMessages(['password' => 'Invalid password']);
        }

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
