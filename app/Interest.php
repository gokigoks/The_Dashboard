<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model {

		// define table used

	protected $table = 'interests';

	/*
	*	Define relation with other model
	*
	**/

	public function user() {

		$this->belongsToMany('App\User');
	}

	public function article(){

		$this->belongsToMany('App\Article','article_interest');
	}

	// public function scopeTags(){

	// 	return 
	// }

}
