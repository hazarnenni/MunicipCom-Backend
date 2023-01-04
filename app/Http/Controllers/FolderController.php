<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function add(Request $request)
    {
        $folder = Folder::create($request->all());


        return response($folder, 201);
    }
}
