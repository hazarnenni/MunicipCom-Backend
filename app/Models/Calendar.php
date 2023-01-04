<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Calendar extends Model
{
    protected $fillable = ['id', 'title', 'details','startDate', 'endDate'];

    protected $table = 'calendar';
}
