<?php


namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\{TokenExpiredException, TokenInvalidException};

class APIProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $exception) {
            if ($exception instanceof TokenInvalidException){
                return response()->json(['status' => 'Token é inválido!']);
            }else if ($exception instanceof TokenExpiredException){
                return response()->json(['status' => 'O token está expirado!']);
            }else{
                return response()->json(['status' => 'Token de autorização não encontrado!']);
            }
        }
        return $next($request);
    }
}
