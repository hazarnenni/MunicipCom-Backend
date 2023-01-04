<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return $news;
    }

    public function getNewsbyId($id)
    {
        $news = News::find($id);
        return $news;
    }
}
