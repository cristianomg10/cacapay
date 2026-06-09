<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Http\Resources\CidadeResource;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index()
    {
        return CidadeResource::collection(Cidade::all());
    }

    public function store(StoreCidadeRequest $request)
    {
        $cidade = Cidade::create($request->validated());
        return new CidadeResource($cidade, 201);
    }

    public function show(Cidade $cidade)
    {
        return new CidadeResource($cidade);
    }

    public function update(UpdateCidadeRequest $request, Cidade $cidade)
    {
        $cidade->update($request->validated());
        return new CidadeResource($cidade);
    }

    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
        return response()->json(null, 204);
    }
}
