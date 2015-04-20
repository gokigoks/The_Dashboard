<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use DB;
use App\Article;
use Carbon\Carbon;
use Auth;
use App\Http\Requests\createArticleRequest;

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
		// $article = Article::latest()->get();

		// $article['user'] = Auth::user();

		$article = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.user_id')
            ->select('articles.id', 'articles.title', 
            	'articles.content', 'articles.updated_at', 'users.name')
            ->orderBy('articles.updated_at','DESC')
            ->paginate(3);
		
		return view('Article.article', compact('article'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return view('Article.createArticle');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(createArticleRequest $request)
	{
		$article = new Article($request->all());

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
	public function show($id)
	{
		$article = Article::findOrFail($id);

		return view('Article.show',compact('article'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$article = Article::findOrFail($id);
		return view('Article.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id , createArticleRequest $request)
	{	
		$article = Article::findOrFail($id);
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

}
