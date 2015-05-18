<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = 'comments';

	protected $fillable  = [
	'content',
	'created_at'
	];

	/**
	*
	**
	*@var this belongs to user
	*/


	public function user() {

		return $this->belongsTo('App\User');

	}

	/**
	*
	**
	*@var this belongs to article model
	*/

	public function article()
	{
		return $this->belongsTo('App\Article');
	}


	public function posts(){

		return $this->belongsTo('App\Post','post_id');

	}

	public function scopeUserName($query)
	{

	}

}
	