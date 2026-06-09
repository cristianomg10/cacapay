<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cidade;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('cidade')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $cidades = Cidade::all();
        return view('clientes.create', compact('cidades'));
    }

    public function store(StoreClienteRequest $request)
    {
        $data = $request->validated();
        $data['senha'] = bcrypt($data['senha']);
        Cliente::create($data);
        session()->flash('success', 'Cliente cadastrado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        $cidades = Cidade::all();
        return view('clientes.edit', compact('cliente', 'cidades'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $data = $request->validated();
        if (!empty($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        } else {
            unset($data['senha']);
        }
        $cliente->update($data);
        session()->flash('success', 'Cliente atualizado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        session()->flash('success', 'Cliente excluído com sucesso!');
        return redirect()->route('clientes.index');
    }
}
