<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Communeinfo extends Model
{
    protected $fillable = ['id', 'name', 'email', 'phone', 'address', 'logo'];

    protected $table = 'communeinfos';
    protected $id = 'id';
}
