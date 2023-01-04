<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Onlinefile extends Model
{
    protected $fillable = ['id', 'name', 'files', 'created_at'];

    protected $table = 'onlinefiles';
    protected $id = 'id';
    protected $casts = [
        'created_at' => 'datetime:d/m/Y'
    ];
}

