<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Membership;
use App\MenuItem;
use App\Sale;
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
        $members = Membership::get();
        return view('unclaimed.index',compact('members'));
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
     * @param  \App\Customer  $customer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Customer $customer)
    {
        if(is_null($request->menu_item))
        {
            return back()->with('error', 'No Service Was Selected');
        }

        $menuItems = $request->menu_item;
        $akeys = array_keys($menuItems);

        $menuItem = MenuItem::whereIn('id',$akeys)->get();

        $authUser = \Auth::user();
        $hasSale = Customer::hasSale($customer,$authUser);

        if(!$hasSale)
        {
            $sale = Sale::create([
                'user_id' => \Auth::user()->branches()->first()->id,
                'customer_id' => $customer->id,
                'customercar_id' => $customer->cars->first()->id,
                'status' => 0,
                'sales_total' => 0,
                'is_cancel' => false
            ]);

            $sale->customers()->attach($customer);
        }

        $sale = $hasSale['sale'][0];
        foreach($menuItem as $mi)
        {
            $check_relationship = Sale::whereHas('menuitems', function($q) use ($mi) {
                $q->where('id',$mi->id);
            })->where('id',$sale->id)->get();

            if(count($check_relationship) > 0) {
                $error_msg[] = $mi->name;
            }
            else
            {
                $mi->sales()->attach($sale);
            }
        }

        if(count($error_msg) > 0)
        {
            $message = "";
            $last = end($error_msg);
            foreach($error_msg as $em)
            {
                $message .= ($em == $last) ? $em . " " : $em . ", ";
            }
            return back()->with('error', "The Service(s) " . $message . " Has Already Been Added");
        }

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
    // public function edit(Unclaimed $unclaimed)
    public function edit($id)
    {
        $customer = Customer::find($id);
        $customer_unclaimed = $customer->unclaimed;
        // dd($customer_unclaimed);

        foreach($customer_unclaimed as $unclaimed)
        {
            $customer_unclaimed_ids[] = $unclaimed->menu_item_id;
        }

        // dd($customer_unclaimed_ids);

        $services = MenuItem::where('product_type',1)
            ->whereNotIn('id',$customer_unclaimed_ids)->get();

        $service_plucked = $services->pluck('name','id')->toArray();
        // dd($service_plucked);

        return view('unclaimed.edit',compact('customer','services','service_plucked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        dd($customer);
        dd($request->request);
    }

    /**
     * Update the Unclaimed Quantity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update_quantity(Request $request, Customer $customer)
    {
        // dd($customer);
        // dd($request->menuitem);

        foreach($request->menuitem as $key => $value)
        {
            $unclaimed = Unclaimed::where('menu_item_id',$key)->where('customer_id',$customer->id)->first();
            $unclaimed->quantity = (int)$value;
            $unclaimed->save();
        }
        
        return back()->with('success', 'Quantity Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function add_unclaimed(Request $request, Customer $customer)
    {
        $error_msg = [];

        foreach($request->menuitem as $key => $value)
        {
            $id = $value['id'];
            $quantity = $value['quantity'];

            if(is_null($id) || is_null($quantity))
                continue;

            // Check for Relationship
            $menuitem = MenuItem::find($id);

            $check_relationship = Unclaimed::whereHas('menuitems', function($q) use ($menuitem) {
                $q->where('id',$menuitem->id);
            })->where('customer_id',$customer->id)->get();

            if(count($check_relationship) > 0) {
                $error_msg[] = $menuitem->name;
            }
            else
            {
                $unclaimed = Unclaimed::create([
                    'customer_id' => $customer->id,
                    'menu_item_id' => $menuitem->id,
                    'quantity' => $quantity,
                    'is_unclaimed' => true
                ]);

                $unclaimed->menuitems()->attach($menuitem);
                $unclaimed->customers()->attach($customer);
            }
        }

        if(count($error_msg) > 0)
        {
            $message = "";
            $last = end($error_msg);
            foreach($error_msg as $em)
            {
                $message .= ($em == $last) ? $em . " " : $em . ", ";
            }
            return back()->with('error', "The Service(s) " . $message . " Has Already Been Added");
        }

        return back()->with('success', 'Unclaimed Service Added Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Unclaimed  $unclaimed
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function remove_unclaimed(Unclaimed $unclaimed, Customer $customer)
    {
        // dd($unclaimed);

        $menuitem = $unclaimed->menuitems->first();
        $unclaimed->menuitems()->detach($menuitem);
        $unclaimed->delete();

        return back()->with('success', 'Unclaimed Service Removed Successfully');
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
