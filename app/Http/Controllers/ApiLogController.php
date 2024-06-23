<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiLogResource;
use App\Models\ApiLog;
use Illuminate\Http\Request;

class ApiLogController extends Controller
{
    public function index()
    {
        return ApiLogResource::collection(ApiLog::get());
    }

    public function show(ApiLog $log)
    {
        return ApiLogResource::make($log);
    }

    public function store(Request $request, $response, $user)
    {
        $logData = [
            'user_id' => $user['data']['id'] || null,
            'action' => $request->path(),
            'status_code' => http_response_code(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip_address' => $this->anonymizeIp($request->ip()),
            'duration' => $this->getDuration($request),
            'request_headers' => json_encode($request->headers->all()),
            'response_headers' => json_encode($this->getResponseHeaders($response)),
            'request_body' => json_encode($request->all()),
            'response_body' => json_encode($this->getResponseBody($response)),
        ];

        $apilog = new ApiLog();
        $apilog->fill($logData);
        $apilog->save();
    }

    private function getDuration(Request $request)
    {
        return (int) ((microtime(true) - LARAVEL_START) * 1000);
    }

    private function anonymizeIp($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return preg_replace('/\.\d+$/', '.0', $ip);
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return preg_replace('/:[0-9a-f]{1,4}$/i', ':0000', $ip);
        }
        return $ip;
    }

    private function getResponseHeaders($response)
    {
        return $response->headers->all();
    }

    private function getResponseBody($response)
    {
        return $response->getContent();
    }
}
