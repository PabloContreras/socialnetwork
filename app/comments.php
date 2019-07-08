<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
	protected $dates = [
    'created_at',
    'updated_at',
    // your other new column
];
    public function post()
    {
        return $this->morphToMany('App\Post');
    }
}
