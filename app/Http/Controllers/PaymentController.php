<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Membership;
use App\MenuItem;
use App\Payment;
use App\PaymentType;
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
        // return view('payments.create');
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

        $payment_types = PaymentType::pluck('name','id')->toArray();

        return view('payments.confirm',compact('sale','menuitems','customer_is_member','payment_types'));
    }

    /**
     * Make Payment.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, Sale $sale)
    {
        if($request->payment_type[1] == null && $request->payment_type[2] == null)
        {
            return back()->with('error', 'Please Choose a Payment Type');
        }

        /**
         * 1. Create Payment Object
         * 2. Generate Receipt No.
         * 3. Insert Paid Time
         * 4. Update Sale Status = 2
         */

        $receipt_no = "receipt_" . rand(10000,99999);

        $payment = Payment::create([
            'sale_id' => $sale->id,
            'total' => $sale->sales_total,
            'receipt_no' => $receipt_no,
            'paid_time' => date('Y-m-d H:i:s'),
            'payment_method' => json_encode($request->payment_type),
            'status' => 1
        ]);

        $sale->status = 2;
        $sale->save();

        /**
         * 1. Check if Member Subscription is present
         */

        foreach($sale->menuitems as $menuitem)
        {
            if($menuitem->product_type == 2 || $menuitem->product_type == 3)
            {
                /**
                 * 2. Create the Membership object
                 */

                $customer = Customer::find($sale->customers->first()->id);
                $membership = Membership::create([                                                                                                                                                                                                           
                    'customer_id' => $customer->id,
                    'membership_type'=> $menuitem->membertype->first()->id,
                    'membership_expires'=> MenuItem::get_membership_duration($menuitem),
                    'is_expired' => false
                ]);

                /**
                 * 3. Convert the Customer to Member
                 */
                $customer->is_member = true;
                $customer->save();
            }
        }


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
        dd($payment);
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
