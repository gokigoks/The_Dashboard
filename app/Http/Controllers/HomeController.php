<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;
use App\Comment;
use App\User;
use App\Post;
use Auth;
use App\Http\Requests\createArticleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	

		try{

		
		// $post = DB::table('posts')
//           ->join('users', 'posts.user_id', '=', 'users.id')
//           ->select('posts.id', 'posts.content', 
//           	'posts.created_at', 'users.name')
//           ->orderBy('posts.updated_at','DESC')
//           ->take(10)->get();

		$id = Auth::user()->id;
		$post = Post::IdDescending()->get();		

         		
		return view('user.dashboard',compact('post'));

		}
		catch(ModelNotFoundException $e){
			
		}
		
		
	}

}
