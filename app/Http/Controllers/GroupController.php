<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\makeGroupRequest;
use App\Group;
use Auth;
use App\User;



class GroupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		try {

			$group = Group::findOrFail($id);
			$users = $group->users()->get();

		} catch (ModelNotFoundException $e) {

			abort(404);

			//abort page to views/errors/404.blade.php

		}
			
		return view('group.dashboard',compact(['group','users']));
	}
	
	/**
	 * Use  
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create(makeGroupRequest $request)
	{

		$group = new Group(); //create new group
		
		$group->name = $request->input('name');	

		$group->creator_id = Auth::user()->id;
		
		$group->save();

		Auth::user()->group()->attach([$group->id,$group->creator_id]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	//public function ()
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

}
