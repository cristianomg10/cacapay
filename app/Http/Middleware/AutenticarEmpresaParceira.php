<?php

namespace App\Http\Middleware;

use App\Models\EmpresaParceira;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticarEmpresaParceira
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token inválido'], 401);
        }

        $empresa = EmpresaParceira::where('token_acesso', $token)->first();

        if (!$empresa) {
            return response()->json(['message' => 'Token inválido'], 401);
        }

        $request->merge(['empresa_parceira_autenticada' => $empresa]);

        return $next($request);
    }
}
