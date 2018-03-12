<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['vertical_id', 'name', 'description', 'min_price', 'max_price'];

    protected $table = 'services';
}
