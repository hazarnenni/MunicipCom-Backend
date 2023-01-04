<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    public const Form = 'Form';
    public const Response = 'Response';

    public static $natures = [self::Form, self::Response];

    protected $fillable = ['name', 'nature', 'created_at'];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
