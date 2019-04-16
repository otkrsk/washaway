<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Sale;

use Illuminate\Http\Request;

class PaymentController extends Controller
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
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create(['name' => $request->payment_name]);
        return redirect()->route('admin.editpayment');
    }

    /**
     * Display the Payment summary.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function summary(Sale $sale)
    {
        // dd($sale);

        /**
         * PAYMENT OBJECT
         * 
         * Need to add these columns to DB:
         * 1. Total
         * 2. Receipt No.
         * 3. Paid Time
         * 4. Payment Method
         */

        /**
         * 1. Create new Payment object
         * 2. Need to return Customer object
         * 3. Need to return Customer Car object
         */

        // 1. Customer
        $customer = $sale->customers->first();
        $member_status = ($customer->is_member) ? "Member" : "Walk-In";
        $contact_no = (!is_null($customer->contact_no)) ? $customer->contact_no : "-";

        // 2. Customer Car
        $cc_plate_no = strtoupper($customer->cars->first()->plate_no);
        $cc = $customer->cars->first()->brand()->first()->name . " " . $customer->cars->first()->model()->first()->name;
        $cc_color = $customer->cars->first()->color()->first()->name;
        $cc_car_type = $customer->cars->first()->model()->first()->carType->type;

        return view('payments.summary',compact(
            'sale',
            'customer',
            'member_status',
            'contact_no',
            'cc_plate_no',
            'cc',
            'cc_color',
            'cc_car_type'
        ));
    }

    /**
     * Confirm Payment.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function confirm(Sale $sale)
    {
        $customer = $sale->customers->first();
        $customer_is_member = $customer->is_member;

        $menuitems = $sale->menuitems;
        return view('payments.confirm',compact('sale','menuitems','customer_is_member'));
    }

    /**
     * Make Payment.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function pay(Sale $sale)
    {
        /**
         * 1. Create Payment Object
         * 2. Generate Receipt No.
         * 3. Insert Paid Time
         */

        $receipt_no = "receipt_" . rand(10000,99999);

        $payment = Payment::create([
            'sale_id' => $sale->id,
            'total' => $sale->sales_total,
            'receipt_no' => $receipt_no,
            'paid_time' => date('Y-m-d H:i:s'),
            'payment_method' => 1,
            'status' => 1
        ]);

        return redirect()->action('HomeController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    public function delete(Payment $payment)
    {
        // dd($car->id);
        // $car = Payment::find($car);
        Payment::destroy($payment->id);

        return redirect()->route('admin.editpayment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
