<?php

namespace App\Models;

use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SluggableTrait;

    protected $fillable = [
        'slug',
    ];

    protected $with = [
        'translates',
    ];
}
