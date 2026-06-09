<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmpresaParceiraRequest;
use App\Http\Requests\UpdateEmpresaParceiraRequest;
use App\Http\Resources\EmpresaParceiraResource;
use App\Models\EmpresaParceira;

class EmpresaParceiraController extends Controller
{
    public function index()
    {
        return EmpresaParceiraResource::collection(EmpresaParceira::all());
    }

    public function store(StoreEmpresaParceiraRequest $request)
    {
        $empresa = EmpresaParceira::create($request->validated());
        return new EmpresaParceiraResource($empresa, 201);
    }

    public function show(EmpresaParceira $empresaParceira)
    {
        return new EmpresaParceiraResource($empresaParceira);
    }

    public function update(UpdateEmpresaParceiraRequest $request, EmpresaParceira $empresaParceira)
    {
        $empresaParceira->update($request->validated());
        return new EmpresaParceiraResource($empresaParceira);
    }

    public function destroy(EmpresaParceira $empresaParceira)
    {
        $empresaParceira->delete();
        return response()->json(null, 204);
    }
}
