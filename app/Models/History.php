<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class History extends Model
{
    protected $fillable = ['id', 'title', 'description', 'photo'];

    protected $table = 'history';
    protected $id = 'id';
}
