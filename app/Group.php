<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	/**
	*
	*@return returns the model
	**/

	protected $table = 'groups';
	//table used

	protected $fillable = ['name', 'interest', 'creator_id'];
	//protect variables from mass assignment



	public function users(){

		return $this->belongsToMany('App\User');

	}

	
	public function interest(){

		return $this->hasOne('App\Interest');

	}

	

}
