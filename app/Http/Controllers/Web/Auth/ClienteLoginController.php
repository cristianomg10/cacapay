<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('cliente.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
        ]);

        if (Auth::guard('cliente')->attempt([
            'email' => $credentials['email'],
            'password' => $credentials['senha'],
        ], $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('cliente.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('cliente')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('cliente.login');
    }
}
