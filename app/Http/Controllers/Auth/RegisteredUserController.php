<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cidades = Cidade::all();
        return view('auth.register', compact('cidades'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'max:14', 'unique:clientes,cpf'],
            'telefone' => ['required', 'string', 'max:20'],
            'cidade_id' => ['required', 'integer', 'exists:cidades,id'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => User::count() === 0,
        ]);

        $cliente = Cliente::create([
            'user_id' => $user->id,
            'nome' => $request->name,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'cidade_id' => $request->cidade_id,
            'numero_conta' => 'CTA' . now()->format('Ymd') . strtoupper(substr(uniqid(), -6)),
            'saldo' => 0,
        ]);

        event(new Registered($user));

        Auth::guard('cliente')->loginUsingId($cliente->id);

        return redirect(route('cliente.dashboard'));
    }
}
