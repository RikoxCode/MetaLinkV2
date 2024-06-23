<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

    protected $table = 'api_logs';

    protected $fillable = [
        'user_id',
        'action',
        'status_code',
        'method',
        'url',
        'ip_address',
        'duration',
        'request_headers',
        'response_headers',
        'request_body',
        'response_body',
    ];

    protected $casts = [
        'request_headers' => 'array',
        'response_headers' => 'array',
        'request_body' => 'array',
        'response_body' => 'array',
    ];
}
