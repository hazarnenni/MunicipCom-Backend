<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    public const ShortText = 'ShortText';
    public const LongText = 'LongText';
    public const UniqueChoice = 'UniqueChoice';
    public const MultiChoice = 'MultiChoice';
    public const ListUniSelect = 'ListUniSelect';
    public const ListMultiSelect = 'ListMultiSelect';
    public const Date = 'Date';
    public const DateTime = 'DateTime';
    public const Number = 'Number';
    public const Email = 'Email';

    public static $natures = [
        self::ShortText, self::LongText, self::UniqueChoice, self::MultiChoice,
        self::ListUniSelect, self::ListMultiSelect, self::Date, self::DateTime, self::Number, self::Email
    ];

    protected $fillable = ['name', 'nature', 'form_id', 'mandatory'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
