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
    public function new(Customer $customer, $id)
    {
        $menuItem = MenuItem::findOrFail($id);

        $sale = Sale::where('user_id',\Auth::user()->branches()->first()->id)
            ->where('customer_id',$customer->id)
            ->where('status',0)
            ->where('is_cancel',false)
            ->get();

        if(count($sale) > 0) {
            $menuItem->sales()->attach($sale);
            return redirect()->action('CustomerController@addservice_stub', ['customer' => $customer]);
        }
        else
        {
            $sale = Sale::create([
                'user_id' => \Auth::user()->branches()->first()->id,
                'customer_id' => $customer->id,
                'customercar_id' => $customer->cars->first()->id,
                'status' => 0,
                'sales_total' => 0,
                'is_cancel' => false
            ]);

            $menuItem->sales()->attach($sale);
            $sale->customers()->attach($customer);

            return redirect()->action('CustomerController@addservice_stub', ['customer' => $customer]);
        }
    }

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submit(Sale $sale)
    {
        /**
         * 1. Find if the customer is member.
         * 2. Get the corresponding prices.
         * 3. Sum the total.
         * 4. Insert the total into the sale_total column.
         */

        $customer = Customer::find($sale->customer_id);
        $menuitems = $sale->menuitems;

        foreach($menuitems as $menuitem)
        {
            $sales_total[] = ($customer->is_member) ? $menuitem->prices()->first()->member_price : $menuitem->prices()->first()->normal_price;
        }

        $sum = 0;

        foreach($sales_total as $st)
        {
            $sum += $st;
        }

        $sale->status = 1;
        $sale->sales_total = $sum;
        $sale->save();

        // redirect back to home page
        return redirect('/');
    }

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel(Sale $sale)
    {
        // dd($sale);

        $sale->is_cancel = true;
        $sale->save();

        // redirect back to home page
        return redirect('/');
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
