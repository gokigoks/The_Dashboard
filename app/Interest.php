<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model {

		// define table used

	protected $table = 'permission';

	/*
	*	Define relation with other model
	*
	**/

	public function user() {

		$this->belongsToMany('App\User');
	}


}
