<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Menu;
use App\MenuItem;
use App\Sale;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function listServices(Customer $customer, Sale $sale = null)
    {
        // dd($sale);
        $services = Menu::where('branch_id', $customer->branch_id)->first();
        $menuitems = $services->menuitems;

        if($sale)
        {
            return view('services.services',compact('menuitems','customer','sale'));
        }
        else
        {
            return view('services.services',compact('menuitems','customer'));
        }
    }

    public function listMemberships(Customer $customer)
    {
        $membership_type = ($customer->is_member) ? 3 : 2;
        $memberships = MenuItem::where('product_type',$membership_type)->get();

        return view('services.membership',compact('customer','memberships'));
    }

    public function listPromotions()
    {
        return view('services.promotion');
    }

    public function listUnclaimed()
    {
        return view('services.unclaimed');
    }

    public function giftCredits()
    {
        return view('services.giftcredits');
    }
}
