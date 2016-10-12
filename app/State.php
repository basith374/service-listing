<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    
	public function districts() {
		return $this->hasMany('App\District');
	}

	public function businesses() {
		return $this->hasManyThrough('App\Business', 'District');
	}

}
