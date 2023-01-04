<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Event extends Model
{
    protected $fillable = ['id', 'title', 'description', 'object', 'photo', 'startDate', 'endDate', 'location'];

    protected $table = 'events';
    protected $id = 'id';
    protected $casts = [
        'startDate' => 'datetime:d/m/Y'
    ];
}
