<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model {

	protected $table = 'flags';

	//table


	public function post(){

		return $this->belongsTo('App\Post');

	}

	public function article(){

		return $this->belongsTo('App\Article');

	}

	
	
}
