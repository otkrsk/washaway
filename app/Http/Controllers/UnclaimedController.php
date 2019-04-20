<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Unclaimed;
use Illuminate\Http\Request;

class UnclaimedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $customer = isset($request->contact_no) ? Customer::where('contact_no','like',$request->contact_no)->where('is_member',true)->first() : Customer::where('plate_no','like',$request->plate_no)->where('is_member',true)->first(); 

        if(!$customer)
        {
            return back()->with('error', 'No Membership Found');
        }

        $unclaimed = Unclaimed::where('customer_id',$customer->id)->get();

        if($request->search_type == "member")
        {
            return redirect()->action('MembershipController@show',['customer' => $customer]);
        }
        else
        {
            // TODO: redirect to unclaimed services search result page
            return view('sales.create');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('UnclaimedController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('UnclaimedController@create');
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
     * display the specified resource.
     *
     * @param  \app\unclaimed  $unclaimed
     * @return \illuminate\http\response
     */
    public function list(Customer $customer)
    {
        // dd($customer->unclaimed->first()->menuitems);
        return view('unclaimed.list',compact('customer'));
    }

    /**
     * display the specified resource.
     *
     * @param  \app\unclaimed  $unclaimed
     * @return \illuminate\http\response
     */
    public function show(unclaimed $unclaimed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unclaimed  $unclaimed
     * @return \Illuminate\Http\Response
     */
    public function edit(Unclaimed $unclaimed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unclaimed  $unclaimed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unclaimed $unclaimed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unclaimed  $unclaimed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unclaimed $unclaimed)
    {
        //
    }
}
