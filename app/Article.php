<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
	protected $table = 'articles';

	/**
	*
	*@var 
	*
	*/



	protected $fillable  = [
	'title',
	'content',
	'created_at'
	];

	

	/*
	* 	Setting the article relation to user
	*	
	**/

	public function user() {

		return $this->belongsTo('App\User');

	}

	/**
	*
	**
	*@var this model has many comments
	*/

	
	public function comments() {

		return $this->hasMany('App\Comment');
		
	}


	
}

