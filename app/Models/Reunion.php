<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reunion extends Model
{
    protected $table = 'reunion';
    protected $fillable = ['title', 'dateDebut', 'dateFin'];

}
