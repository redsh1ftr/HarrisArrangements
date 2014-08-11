<?php

class ReflectionsController extends \BaseController {

	/**
	 * Display a listing of reflections
	 *
	 * @return Response
	 */
	public function index()
	{
		$reflections = Reflection::all();

		return View::make('reflections.index', compact('reflections'));
	}

	/**
	 * Show the form for creating a new reflection
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reflections.create');
	}

	/**
	 * Store a newly created reflection in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Reflection::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Reflection::create($data);

		return Redirect::route('reflections.index');
	}

	/**
	 * Display the specified reflection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reflection = Reflection::findOrFail($id);

		return View::make('reflections.show', compact('reflection'));
	}

	/**
	 * Show the form for editing the specified reflection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reflection = Reflection::find($id);

		return View::make('reflections.edit', compact('reflection'));
	}

	/**
	 * Update the specified reflection in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reflection = Reflection::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Reflection::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$reflection->update($data);

		return Redirect::route('reflections.index');
	}

	/**
	 * Remove the specified reflection from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Reflection::destroy($id);

		return Redirect::route('reflections.index');
	}

}
