<?php

namespace App\Http\Controllers;

use App\Carbrand;
use App\Carcolor;
use App\Carmodel;
use App\Customer;
use App\Membership;
use App\MenuItem;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('wassup');
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
    public function new()
    {
        $customer = Customer::find($_GET['customer']);
        $membership = MenuItem::find($_GET['membership']);

        return view('members.new',compact('membership','customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::find($request->customer);

        if(is_null($request->name) || is_null($request->contact_no))
        {
            return back()->with('error', 'Name and/or Contact No cannot be blank.');
        }

        $contact_exists = $customer->where('contact_no', 'like', '%' . $request->contact_no . '%')->first();

        if(count($contact_exists) > 0)
        {
            return back()->with('error', 'The phone number already exists. Please key in a different phone number.');
        }

        $customer->name = $request->name;
        $customer->contact_no = $request->contact_no;

        $customer->save();

        return redirect()->action('SaleController@new', ['customer' => $customer, 'id' => $request->membership]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $member = Customer::find($customer);
        // dd($member);
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function add_subcar(Customer $customer)
    {
        $customercars = $customer->cars;

        if(count($customercars) < 3)
        {
            $plate_no = null;
            $brands = Carbrand::get();
            $models = Carmodel::get();
            $colors = Carcolor::get();

            $route = 'customercars.createsubcar';

            return view('customers.create',compact(
                'customer',
                'route',
                'plate_no',
                'brands',
                'models',
                'colors'
            ));
        }
        else
        {
            return back()->with('error', 'Member already has maximum number of Sub Cars');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
