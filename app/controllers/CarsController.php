<?php

class CarsController extends \BaseController {

	/**
	 * Display a listing of cars
	 *
	 * @return Response
	 */
	public function index()
	{
		$cars = Car::all();

		return View::make('cars.index', compact('cars'));
	}

	/**
	 * Show the form for creating a new car
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cars.create');
	}

	/**
	 * Store a newly created car in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Car::$rules,Car::$messages);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$car = new Car;

		
		$car->date = date('Y-m-d');
		$car->reg_no = Input::get('reg_no');
		$car->make = Input::get('make');
		$car->tank_capacity = Input::get('tank_capacity');
		$car->status = 'available';		
		$car->save();

		return Redirect::route('cars.index');
	}

	/**
	 * Display the specified car.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$car = Car::findOrFail($id);

		return View::make('cars.show', compact('car'));
	}

	/**
	 * Show the form for editing the specified car.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$car = Car::find($id);

		return View::make('cars.edit', compact('car'));
	}

	/**
	 * Update the specified car in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$car = Car::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Car::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$car->reg_no = Input::get('reg_no');
		$car->make = Input::get('make');
		$car->tank_capacity = Input::get('tank_capacity');
		$car->status = 'available';		
		$car->update();

		return Redirect::route('cars.index');
	}

	/**
	 * Remove the specified car from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Car::destroy($id);

		return Redirect::route('cars.index');
	}

}
