<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    protected $fillable = ['id', 'title', 'subtitle', 'details', 'logo'];

    protected $table = 'services';
    protected $id = 'id';
    // protected $casts = [
    //     'startDate' => 'datetime:d/m/Y'
    // ];
}
