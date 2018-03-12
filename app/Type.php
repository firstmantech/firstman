<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['service_id', 'name', 'description', 'min_price', 'max_price'];

    protected $table = 'types';
}
