<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class albums extends Controller
{
    public function show()
    {
        $albums = Album::all();
        return $albums;
    }
}
