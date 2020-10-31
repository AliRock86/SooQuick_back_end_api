<?php
namespace App\Http\Middleware;
use App\User;
use Closure;
use Exception;
use JWTAuth;
class JwtOpertionsMiddleware{
    public function handle($request, Closure $next, $guard = null)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                throw new Exception('User Not Found');
            }elseif ($user->role->role_name != 'admin') { 
                throw new Exception('Unauthorized Permission');
            }

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    'sucess' => false,
                    'data' => 'Token Invalid',
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {

                return response()->json([
                    'sucess' => false,
                    'data' => 'Token Expired',
                ], 401);
            } else {
                if ($e->getMessage() === 'User Not Found') {

                    return response()->json([
                        'sucess' => false,
                        'data' => 'User Not Found',
                    ], 401);
                }elseif($e->getMessage() === 'Unauthorized Permission'){
                    return response()->json([
                        'sucess' => false,
                        'data' => 'Unauthorized Permission',
                    ], 401);
                }

                return response()->json([
                    'sucess' => false,
                    'data' => 'Authorization Token not found',
                ], 401);
            }
        }
        return $next($request);
    }
}

