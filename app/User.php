<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password','img','about'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/*
	*
	* A user can have many article
	*/

	public function article() {

		return $this->hasMany('App\Article');

	}

	public function permission() {

		return $this->hasMany('App\Permission');

	}

	

	public function role() {

		return $this->hasOne('App\Role');

	}

	/**
	*
	* role checker for user model
	* @var boolean
	* @return user->role
	*/

	public function is($role){

		if($this->attributes['role'] == $role)
		{
			return true;
		}

		return false;
	}

	/**
	*	checks if the user owns a current post
	*
	*
	*/

	public function posts(){
		
		return $this->hasMany('App\Post');

	}
//


}
