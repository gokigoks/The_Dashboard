<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model {


	/*
	*
	*	invitation model for entering group
	*
	**/



	protected $table = 'invitations';

	/*
	*
	**
	*@var return relation of model to user
	**/


	public function user(){

		return $this->belongsTo('App\User');

	}

	public function group(){

		return $this->belongsTo('App\Group');

	}

}
