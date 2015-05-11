<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Auth\Guard;	
use Auth;						
class CreatePostRequest extends Request {

	protected $auth;

	public function construct(Guard $auth){
		$this->auth = $auth;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{	
		//if($this->auth->check())
		if(Auth::check())	
		{

			return true;

		}
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'content' => 'required',
		];
	}

}
