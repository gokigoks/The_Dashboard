<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	//
	protected $table = 'role';

	/*
	*	@var table
	*
	*/

	public function user(){

		return $this->belongsTo('App\User');

	}


}
