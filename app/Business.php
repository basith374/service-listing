<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    
	protected $table = 'business';

	protected $guarded = ['id'];

	protected $appends = ['ratings', 'best_rating'];

	public function district() {
		return $this->belongsTo('App\District');
	}

	public function locality() {
		return $this->belongsTo('App\Locality');
	}

	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function reviews() {
		return $this->hasMany('App\Review');
	}

	public function getRatingsAttribute() {
		return $this->reviews->avg('rating');
	}

	public function getBestRatingAttribute() {
		return $this->reviews->max('rating');
	}

}
