<?php

namespace App\Http\Controllers;

use App\Car;
use App\Carbrand;
use App\Carmodel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $flag = $_GET['flag'];

        switch($flag)
        {
            case 1:
                return view('cars.createbrand');
                break;
            case 2:
                $brands = Carbrand::get();
                return view('cars.createmodel',compact('brands'));
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch($request->flag)
        {
            case 1:
                $carBrand = Carbrand::create(['name' => $request->brand]);
                break;
            case 2:
                $carModel = Carmodel::create([
                    'name' => $request->model,
                    'carbrand_id' => $request->brand,
                    'type' => $request->car_type
                ]);
                break;
        }

        return redirect()->route('admin.editcarinfo');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    public function delete($id)
    {
        Carmodel::destroy($id);
        return redirect()->route('admin.editcarinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
