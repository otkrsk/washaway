<?php

namespace App\Http\Controllers;

use App\Customer;
use App\MenuItem;
use App\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
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
    public function open()
    {
        return view('sales.create');
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
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new(Customer $customer, MenuItem $menuItem)
    {
        dd($customer);
        dd('Create New Sale');

        $sale = Sale::create([
            'user_id' => \Auth::user()->branches()->first()->id,
            'customer_id' => $customer_id
        ]);

        $menuItem->sales()->attach($sale);
    }

    /**
     * Remove a service from the list.
     *
     * @return \Illuminate\Http\Response
     */
    public function remove_service(Customer $customer, Sale $sale, $id)
    {
        $menuitems = $sale->menuitems;
        $menuItem = MenuItem::findOrFail($id);

        $menuItem->sales()->detach($sale);

        // return view('customers.addservices',compact('customer','menuitems','sale'));
        return redirect()->action('CustomerController@addservice_stub', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
