<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'label',
        'details',
        'photo',
        'startDate',
        'endDate'

    ];

    protected $table = 'projects';
    protected $id = 'id';
    protected $casts = [
        'date' => 'datetime:d/m/Y',
        'startDate' => 'datetime:d/m/Y',
        'endDate' => 'datetime:d/m/Y'
    ];
}
