<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
	protected $guarded = ['id'];

	public function business() {
		return $this->belongsTo('App\Business');
	}

}
