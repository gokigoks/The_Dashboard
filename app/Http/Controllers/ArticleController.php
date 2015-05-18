<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use DB;
use App\Article;
use App\Interest;
use App\Comment;
use Carbon\Carbon;
use App\User;
use Auth;
use App\Http\Requests\createArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){
		$this->middleware('admin', ['except' => ['index','show']]);
	}


	public function index()
	{

		$articles = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->select('articles.id', 'articles.title', 
            	'articles.content', 'articles.updated_at', 'users.name', 'users.profile_pic')
            ->orderBy('articles.updated_at','DESC')
            ->paginate(3);
		
		return view('Article.article', compact('articles'));

	}

	/**
	 * Show the form for creating a new entry.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$tags = Interest::lists('name','name');			

		return view('Article.createArticle',compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(createArticleRequest $request)
	{
		$article = new Article($request->all());

		$name = $request->input('interest');

		$tag_id = DB::table('interests')
			->select('interests.id')
			->where('name','=',$name)->get();

		$article->interest()->attach($tag_id);

		Auth::user()->article()->save($article);



		flash()->overlay('Your article has been created', 'Thank you for posting');
		
		return redirect('article');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Article $article)
	{
		//$article = Article::all();	
		//dd($article);
		//$article = Article::where('title', 'LIKE' ,'%food%')->get();
		$article->posted_by = User::find($article->user_id)->name;
		$comments = $article->comments()->get();
		//dd($comments->toArray());


		
		return view('Article.show',compact(['article' , 'comments']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Article $article)
	{	
		$tags = Interest::lists('name','name');		
		return view('Article.edit', compact(['article' , 'tags']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($article , createArticleRequest $request)
	{	
		
		$article->created_at = Carbon::now();
		$article->update($request->all());

		flash()->overlay('Your article has been updated', 'Thank you');

		return redirect('article');
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

	public function threads(){

		//return

	}

	public function makeComment(Request $request){
	

		$comment = new Comment();
		$comment->content = $request->input('content');
		$article_id = $request->input('article_id');

		$article = Article::findOrFail($article_id);

		$comment->user()->associate(Auth::user());
		$comment->article()->associate($article);

		$comment->save();


	}
}
	