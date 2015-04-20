<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	// define table used

	protected $table = 'permission';

	/*
	*	Define relation with other model
	*
	**/

	public function user() {

		$this->belongsTo('App\User');
	}

}
