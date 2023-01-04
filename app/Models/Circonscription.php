<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Circonscription extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'location',
        'phone',

    ];
    protected $table = 'circonscriptions';
    public $timestamps = false;
}
