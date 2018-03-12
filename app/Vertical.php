<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertical extends Model
{
    protected $fillable = ['name', 'description'];

    protected $table = 'verticals';
}
