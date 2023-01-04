<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Folder extends Model
{
    protected $fillable = ['id', 'label', 'name', 'cin', 'files', 'details '];

    protected $table = 'folders';
    protected $id = 'id';
    // protected $casts = [
    //     'created_at' => 'datetime:d/m/Y'
    // ];
    public $timestamps = false;
}
