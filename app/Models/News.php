<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{
    protected $fillable = [
        'label',
        'details',
        'photo',
        'date'
    ];

    protected $table = 'news';
    protected $id = 'id';
    protected $casts = [
        'date' => 'datetime:d/m/Y'
    ];
}
