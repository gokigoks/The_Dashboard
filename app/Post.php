<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	//
	/*
	*
	*
	**/
	protected $table = "posts";

	protected $fillable  = [
	'content',
	'created_at'
	];

	public function user(){

		return $this->belongsTo('App\User');

	}

	public function comments(){

		return $this->hasMany('App\Comment');

	}

	public function scopeIdDescending($query)
	{
	        return $query->orderBy('id','DESC');
	} 


}
