<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheetMusic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'composer',
        'arranger',
        'publisher',
        'genre',
        'key',
        'duration',
        'tempo',
        'difficulty',
        'file_path',
        'image_path',
        'tags',
        'status',
        'visibility',
        'license',
        'price',
        'latest_play',

        'description',

        'archive_id',
        'group_id',
    ];

}
