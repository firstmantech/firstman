<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'description'];

    protected $table = 'states';

    public function city()
    {
    	return $this->hasMany(City::class);
    }
}
