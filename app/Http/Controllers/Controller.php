<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function generateSlug(string $name, Model $model): string
    {
        $slug = Str::slug($name);
        do{
            $slug += '-' . $model::where('slug', $slug)->count();
        }while($model::where('slug', $slug)->count() > 0);

        return $slug;
    }
}
