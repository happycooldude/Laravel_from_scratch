<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class xPost
{
    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{slug}.html"))){
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 60, function () use ($path) {
            return file_get_contents($path);
        });
    }
}
