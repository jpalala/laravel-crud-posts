<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::all();
		return View::make('posts.index')
			->with('posts',$posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title' => 'required',
			'content' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('posts/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$post = new Post;
			$post->name       = Input::get('title');
			$post->email      = Input::get('content');
			$post->created    = date('Y-m-d H:i:s');

			$post->save();

			// redirect
			Session::flash('message', 'Successfully created post!');
			return Redirect::to('posts');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	$rules = array(
			'title'       => 'required',
			'content'      => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('posts/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$post = Posts::find($id);
			$post->title       = Input::get('title');
			$post->content     = Input::get('content');
			$post->save();

			// redirect
			Session::flash('message', 'Successfully updated post!');
			return Redirect::to('posts');
		}
	//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		// delete
		$post = Post::find($id);
		$post->delete();

		// redirect
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('posts')
	}


}
