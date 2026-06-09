<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpresaParceiraRequest;
use App\Http\Requests\UpdateEmpresaParceiraRequest;
use App\Models\EmpresaParceira;

class EmpresaParceiraController extends Controller
{
    public function index()
    {
        $empresasParceiras = EmpresaParceira::paginate(10);
        return view('empresas-parceiras.index', compact('empresasParceiras'));
    }

    public function create()
    {
        return view('empresas-parceiras.create');
    }

    public function store(StoreEmpresaParceiraRequest $request)
    {
        EmpresaParceira::create($request->validated());
        session()->flash('success', 'Empresa parceira cadastrada com sucesso!');
        return redirect()->route('empresas-parceiras.index');
    }

    public function edit(EmpresaParceira $empresasParceira)
    {   
        return view('empresas-parceiras.edit', compact('empresasParceira'));
    }

    public function update(UpdateEmpresaParceiraRequest $request, EmpresaParceira $empresasParceira)
    {
        $empresaParceira->update($request->validated());
        session()->flash('success', 'Empresa parceira atualizada com sucesso!');
        return redirect()->route('empresas-parceiras.index');
    }

    public function destroy(EmpresaParceira $empresaParceira)
    {
        $empresaParceira->delete();
        session()->flash('success', 'Empresa parceira excluída com sucesso!');
        return redirect()->route('empresas-parceiras.index');
    }
}
