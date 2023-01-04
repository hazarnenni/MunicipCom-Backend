<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Vote;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return $project;
    }

    public function getProjectbyId($id)
    {
        $project = Project::find($id);
        return $project;
    }

    public function addVote(Request $request)
    {
        $vote = Vote::create($request->all());



        return response($vote, 201);
    }
}
