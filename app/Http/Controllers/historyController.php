<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index()
    {
        $history = History::all();
        return $history;
    }
}
