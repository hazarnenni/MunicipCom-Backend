<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{
    protected $fillable = [
        'email',
        'reason',
        'voting',

    ];
    protected $table = 'votes';
    public $timestamps = false;
}
