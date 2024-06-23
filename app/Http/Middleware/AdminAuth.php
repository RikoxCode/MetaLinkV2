<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ApiLogController;
use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $res = Http::withHeaders([
            'Authorization' => $request->header('Authorization'),
        ])->post('https://auth.netshlife.dev/api/v1/auth/me');

        $resBody = $res->json();

        if($res->status() === 200 && ($resBody['data']['permissions_level'] >= 80 || $resBody['data']['is_sys_admin'] === 1)){

            $response = $next($request);

            if(str_contains($request->path(), 'logs')){
                $apiLogController = new ApiLogController();
                $apiLogController->store($request, $response, $resBody);
            }

            return $response;
        }
        return response()->json(['message' => 'Your permission level is not high enough!'], 401);
    }
}
