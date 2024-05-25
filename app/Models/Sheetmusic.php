<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheetmusic extends Model
{
    use HasFactory;

    protected $fillable = [
        'archive_id',
        'title',
        'slug',
        'description',
        'composer',
        'arranger',
        'publisher',
        'style',
        'grad',
        'flex',
        'duration',
        'is_digital',
        'demo_url',
        'price',
    ];

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
