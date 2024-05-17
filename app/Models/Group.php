<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'conductor',
        'description',
        'cover_image',
        'status',
        'visibility'
    ];
}
