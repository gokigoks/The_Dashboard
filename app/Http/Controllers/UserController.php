<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Support\Facades\Request;

use App\Http\Controllers\Controller;
use App\Comment;  
use App\Post;
use App\User;
use App\Group;
use Input;
use Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\MakeGroupRequest;

use App\Http\Requests\UpdateUserSettings;




class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	private $auth;




	public function __construct(Auth $auth){

		$this->middleware('auth');

		$this->auth = $auth;

	}

	public function index()
	{
		$post = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->select('articles.id', 'articles.title', 
            	'articles.content', 'articles.updated_at', 'users.name')
            ->orderBy('articles.updated_at','DESC')
            ->paginate(3);
		
		return view('Article.article', compact('article'));
	}

	public function settings(){

		$user = Auth::user();
		$groups = Group::where('user_id','=',Auth::user()->id);

		return view('user.settings',compact('user'))->with(compact('groups'));

	}


	public function saveSettings(UpdateUserSettings $request){

		$user = User::findOrFail(Auth::user()->id);
		

		if(Input::hasFile('image')){
			
			$file = $request->file('image');
			$destinationPath = public_path().'/img/';
			$filename = str_random(10).$file->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$user->profile_pic = $filename;	
			
		}


		if(Request::has('name'))
		{
		 	$user->name = $request->input('name'); 

		}
		
		if(Request::has('email')){
		
			$user->email = $request->input('email');
			
		}
		
		

		$user->save();

		
		return redirect('user/settings');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storePost(CreatePostRequest $request)
	{
		
		$post = new Post($request->all());
		$post->user()->associate(Auth::user());
		
		$post->save();
		flash()->overlay('You have posted something', 'Thank you for posting');
		return redirect('home');

	}


		public function storeComment(CreateCommentRequest $request)
	{
		

		$comment = new Comment($request->all());
		$post_id = $request->input('id');
		$post = Post::findOrFail($post_id);

		$comment->posts()->associate($post);
		$comment->user()->associate(Auth::user());
		$comment->save();
		
	}


	/**
	 * Make a new group
	 *
	 * @param  request
	 * @return associate it with the creator
	 */
	public function makeGroup(MakeGroupRequest $request){

		//$group_name = $request->input('group_name');
		$group = new Group($request->all()); 
		
		//$group->creator->id

	}

	public function flagPost()
	{												
									
		
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
