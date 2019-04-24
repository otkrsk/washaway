<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Customercar;
use App\MenuItem;
use App\Payment;
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
     * Display Sales Summary.
     *
     * @return \Illuminate\Http\Response
     */
    public function summary()
    {
        $sales = Sale::where('created_at','>',date('Y-m-d') . ' 00:00:00')
            ->where('is_cancel',false)
            ->get();

        $total_sales = count($sales);
        $total_pending = count(Sale::where('created_at','>',date('Y-m-d') . ' 00:00:00')->where('is_cancel',false)->where('status',1)->get());
        $total_paid = count(Sale::where('created_at','>',date('Y-m-d') . ' 00:00:00')->where('is_cancel',false)->where('status',2)->get());

        // $total_sales = Sale::where('is_cancel',false)->where('status',2)->get();

        $sum = 0;
        
        foreach($sales as $sale)
        {
            $sum += $sale->sales_total;
        }

        return view('sales.summary',compact(
            'total_sales',
            'total_pending',
            'total_paid',
            'sum'
        ));
    }

    /**
     * Display List of Transactions for the Day.
     *
     * @return \Illuminate\Http\Response
     */
    public function transactions()
    {
        $sales = Sale::where('is_cancel',false)
            ->where('created_at','>',date('Y-m-d') . ' 00:00:00')
            ->orderBy('status','desc')->get();
        $sum = 0;
        
        foreach($sales as $sale)
        {
            $sum += $sale->sales_total;
        }

        return view('sales.transactions',compact('sales','sum'));
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
    public function new(Customer $customer, $id, $flag = null)
    {
        $menuItem = MenuItem::findOrFail($id);

        if($flag)
        {
            $sale = Sale::where('user_id',\Auth::user()->branches()->first()->id)
                ->where('customer_id',$customer->id)
                ->where('status',1)
                ->where('is_cancel',false)
                ->first();
        }
        else
        {
            $sale = Sale::where('user_id',\Auth::user()->branches()->first()->id)
                ->where('customer_id',$customer->id)
                ->where('status',0)
                ->where('is_cancel',false)
                ->first();
        }

        if(count($sale) > 0) {
            $check_relationship = Sale::whereHas('menuitems', function($q) use ($menuItem) {
                $q->where('id',$menuItem->id);
            })->where('id',$sale->id)->get();

            if(count($check_relationship) > 0) {
                return back()->with('error', $menuItem->name . ' Has Already Been Added');
            }

            $menuItem->sales()->attach($sale);
            $sale->update_sales_total($customer, $sale);

            if($flag)
            {
                return redirect()->action('SaleController@edit', ['sale' => $sale]);
            }
            else
            {
                return redirect()->action('CustomerController@addservice_stub', ['customer' => $customer]);
            }
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
    public function remove_service(Customer $customer, Sale $sale, $id, $flag = null)
    {
        $menuitems = $sale->menuitems;
        $menuItem = MenuItem::findOrFail($id);

        $menuItem->sales()->detach($sale);
        $freshSale = $sale->fresh();

        Sale::update_sales_total($customer,$freshSale);

        if($flag)
        {
            return redirect()->action('SaleController@edit', ['sale' => $freshSale]);
        }
        else
        {
            return redirect()->action('CustomerController@addservice_stub', ['customer' => $customer]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $customer = $sale->customers->first();
        $member_status = ($customer->is_member) ? "Member" : "Walk-In";
        $car = Customercar::where('plate_no','like',$customer->plate_no)->first();

        $payment = Payment::where('sale_id',$sale->id)->first();
        // dd($payment);


        $paid_time = ($payment) ? date('H:i:s',strtotime($payment->paid_time)) : "N/A";
        // $payment_method = ($payment) ? $payment->paid_time : "N/A";
        $payment_method = "N/A";
        $receipt_no = ($payment) ? $payment->receipt_no : "N/A";

        return view('sales.show',compact(
            'paid_time',
            'payment_method',
            'receipt_no',
            'customer',
            'member_status',
            'sale',
            'car'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        // dd($sale->menuitems);
        return view('sales.edit',compact('sale'));
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
