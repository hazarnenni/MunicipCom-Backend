<?php

namespace App\Http\Controllers;

use App\Models\Circonscription;
use App\Models\Communeinfo;
use App\Models\Onlinefile;
use App\Models\Service;

use Illuminate\Http\Request;



class CommuneController extends Controller
{
    public function showUsers(){
        return view('users');
    }
    public function showProjects(){
        return view('project');
    }
    public function showInfo()
    {
        $info = Communeinfo::all();
        return $info;
    }

    public function showServices()
    {
        $service = Service::all();
        return $service;
    }
    public function getServicebyId($id)
    {
        $service = Service::find($id);
        return $service;
    }

    public function showFiles()
    {
        $files = Onlinefile::all();
        return $files;
    }

    public function showCirconscription(){
        $cr = Circonscription::all();
        return $cr;
    }
    public function getCirconscription()
{
        return view('circonscription');
}
}
