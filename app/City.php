<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['state_id', 'name', 'description'];

    protected $table = 'cities';

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
