<?php

namespace App\Http\Controllers;

use App\Sale;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * show the application dashboard.
     *
     * @return \illuminate\contracts\support\renderable
     */
    public function index()
    {
        // dd(\Auth::user()->branches()->first()->name);
        $sales = Sale::where('status',1)
            ->where('is_cancel', false)
            ->get();

        return view('home',compact('sales'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function member()
    {
        return view('member');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
    {
        return view('report');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function appointment()
    {
        return view('appointment');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function administration()
    {
        return view('administration');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function newsales_stub(Request $request)
    {
        // dd($request->request);
        return view('sales.create');
    }

    public function carsearch_stub(Request $request)
    {
        dd($request->request);
        // return view('sales.create');
    }
}
