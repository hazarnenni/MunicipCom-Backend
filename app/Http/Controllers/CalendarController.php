<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()

    {
        $events = array();
        $reunion = Reunion::all();
        foreach($reunion as $reunion){
            $events[] = [
                'title' => $reunion->title,
                'start' => $reunion->dateDebut,
                'end' => $reunion->dateFin,

            ];
        }

        return view('calendar', ['events' => $events]);

       }

public function adminP(){
        return view('vendor.voyager.index');
}

}
