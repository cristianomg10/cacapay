<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::paginate(10);
        return view('cidades.index', compact('cidades'));
    }

    public function create()
    {
        return view('cidades.create');
    }

    public function store(StoreCidadeRequest $request)
    {
        Cidade::create($request->validated());
        session()->flash('success', 'Cidade cadastrada com sucesso!');
        return redirect()->route('cidades.index');
    }

    public function edit(Cidade $cidade)
    {
        return view('cidades.edit', compact('cidade'));
    }

    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        $cidade->update($request->validated());
        session()->flash('success', 'Cidade atualizada com sucesso!');
        return redirect()->route('cidades.index');
    }

    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        session()->flash('success', 'Cidade excluída com sucesso!');
        return redirect()->route('cidades.index');
    }
}
