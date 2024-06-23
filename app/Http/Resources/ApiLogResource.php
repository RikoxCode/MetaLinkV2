<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'action' => $this->action,
            'status_code' => $this->status_code,
            'method' => $this->method,
            'url' => $this->url,
            'ip_address' => $this->ip_address,
            'duration' => $this->duration,
            'request_headers' => $this->request_headers,
            'response_headers' => $this->response_headers,
            'request_body' => $this->request_body,
            'response_body' => $this->response_body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
