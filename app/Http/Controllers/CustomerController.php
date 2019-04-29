<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Brand;
use App\Customer;
use App\Carbrand;
use App\Carcolor;
use App\Carmodel;
use App\Customercar;
use App\Sale;

use Illuminate\Http\Request;

class CustomerController extends Controller
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
        // dd("I am creating!");

        $plate_no = $_GET['plate_no'];
        $brands = Carbrand::get();
        $models = Carmodel::get();
        $colors = Carcolor::get();

        $route = 'customers.create';
        return view('customers.create',compact('route','brands','colors','models','plate_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = Branch::find(\Auth::user()->branches()->first()->id);
        $car_model = Carmodel::find($request->model_id);

        $customer = Customer::create([
            'plate_no' => strtoupper($request->plate_no),
            'branch_id' => \Auth::user()->branches()->first()->id
        ]);

        $customer->branches()->attach($branch);

        $customer_car = Customercar::create([
            'customer_id' => $customer->id,
            'plate_no' => strtoupper($request->plate_no),
            'brand' => $request->brand_id,
            'model' => $request->model_id,
            'color' => $request->color_id,
            'type' => $car_model->type
        ]);

        return redirect()->action('CustomerController@show', ['id' => $customer->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer_car = $customer->cars->first();
        return view('customers.show',compact('customer','customer_car'));
    }

    public function addservice_stub(Customer $customer)
    {
        $sale = Sale::where('customer_id', $customer->id)
            ->where('status', 0)
            ->where('is_cancel', false)
            ->first();

        if($sale)
        {
            $sum = 0;
            $menuitems = $sale->menuitems;

            if(count($menuitems) > 0)
            {
                foreach($menuitems as $menuitem) $sales_total[] = ($customer->is_member) ? $menuitem->prices()->first()->member_price : $menuitem->prices()->first()->normal_price;
                foreach($sales_total as $st) $sum += $st;
                Sale::update_sales_total($customer, $sale);
            }

            return view('customers.addservices',compact('customer','menuitems','sale','sum'));
        }
        else
        {
            return view('customers.addnewservices',compact('customer'));
        }

    }

    public function addservicelist_stub(Customer $customer, Sale $sale = null)
    {
        if($sale)
        {
            return view('customers.addservicelist',compact('customer','sale'));
        }
        else
        {
            return view('customers.addservicelist',compact('customer'));
        }
    }

    public function search_stub(Request $request)
    {
        // dd($request->request);
        $customer_car = Customercar::where('plate_no','like',$request->plate_no)->first();

        if(count($customer_car) > 0)
        {
            $customer = $customer_car->customers;
            return redirect()->action('CustomerController@show', ['id' => $customer->id]);
        }
        else
        {
            return redirect()->action('CustomerController@create', ['plate_no' => $request->plate_no]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}