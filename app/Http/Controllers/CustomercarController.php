<?php

namespace App\Http\Controllers;

use App\Carcolor;
use App\Carmodel;
use App\Customer;
use App\Customercar;

use Illuminate\Http\Request;

class CustomercarController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_subcar(Request $request)
    {
        // dd($request->request);

        // 1. Check if plate no exists
        $check = Customercar::plate_no_exists($request->plate_no);

        if($check)
        {
            return back()->with('plate_no_error', 'Plate Number is already attached to Member');
        }

        if(is_null($request->plate_no))
        {
            return back()->with('plate_no_error', 'Plate Number cannot be empty');
        }

        if(!isset($request->brand_id))
        {
            return back()->with('brand_error', 'Please select choose a Brand');
        }

        if(!isset($request->model_id))
        {
            return back()->with('model_error', 'Please select choose a Model');
        }

        if(!isset($request->color_id))
        {
            return back()->with('color_error', 'Please select choose a Color');
        }

        $customer = Customer::find($request->customer_id);
        $car_model = Carmodel::find($request->model_id);

        $subcar = Customercar::create([
            'customer_id' => $request->customer_id,
            'plate_no' => $request->plate_no,
            'brand' => $request->brand_id,
            'model' => $request->model_id,
            'color' => $request->color_id,
            'type' => $car_model->type,
            'is_subcar' => true
        ]);
        
        return redirect()->action('ServiceController@listMemberships', ['customer' => $customer]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customercar  $customercar
     * @return \Illuminate\Http\Response
     */
    public function show(Customercar $customercar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customercar  $customercar
     * @return \Illuminate\Http\Response
     */
    public function edit(Customercar $customercar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customercar  $customercar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customercar $customercar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customercar  $customercar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customercar $customercar)
    {
        //
    }
}
