<?php

class ArrangementsController extends \BaseController {

	/**
	 * Display a listing of arrangements
	 *
	 * @return Response
	 */
	public function index()
	{
		$arrangements = Arrangement::all();

		return View::make('arrangements.index', compact('arrangements'));
	}

	/**
	 * Show the form for creating a new arrangement
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('arrangements.create');
	}

	/**
	 * Store a newly created arrangement in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Arrangement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Arrangement::create($data);

		return Redirect::route('arrangements.index');
	}

	/**
	 * Display the specified arrangement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$arrangement = Arrangement::findOrFail($id);

		return View::make('arrangements.show', compact('arrangement'));
	}

	/**
	 * Show the form for editing the specified arrangement.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$arrangement = Arrangement::find($id);

		return View::make('arrangements.edit', compact('arrangement'));
	}

	/**
	 * Update the specified arrangement in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$arrangement = Arrangement::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Arrangement::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$arrangement->update($data);

		return Redirect::route('arrangements.index');
	}

	/**
	 * Remove the specified arrangement from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Arrangement::destroy($id);

		return Redirect::route('arrangements.index');
	}

}
