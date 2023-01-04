<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    protected $fillable = ['title', 'description', 'pictures'];

    protected $table = 'albums';
    protected $casts = [
        'created_at' => 'datetime:d/m/Y'
    ];
}
