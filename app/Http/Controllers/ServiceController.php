<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Menu;
use App\MenuItem;
use App\Price;
use App\Sale;
use App\Service;

use App\Imports\ServiceImport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function listCategories(Customer $customer, Sale $sale = null)
    {
        $services = Menu::where('branch_id', $customer->branch_id)->first();
        $menuitems = $services->menuitems;

        if($sale)
        {
            return view('services.categories',compact('menuitems','customer','sale'));
        }
        else
        {
            return view('services.categories',compact('menuitems','customer'));
        }
    }

    public function listServices(Customer $customer, $product_type, Sale $sale = null)
    {
        $services = Menu::where('branch_id', $customer->branch_id)->first();
        $menuitems = $services->menuitems->where('product_type',$product_type);
        // dd($menuitems);

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
    
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
        return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {

        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        $import = Excel::toArray(new ServiceImport,request()->file('file'));

        // $import = Excel::download(new ServiceImport, 'services.xlsx');
        // dd($import);

        foreach($import as $value)
        {
            foreach($value as $v)
            {
                // dd($v);
                // dd((int)$v['type']);
                $menu = Menu::find(5);

                // 1. Create the MenuItem
                $menuitem = MenuItem::create([
                    'menu_id' => $menu->id,
                    'name' => $v['name'],
                    'product_type' => (int)$v['type']
                ]);

                // 2. Create the Sedan Price for the MenuItem
                // 2a. Create Normal Price for the MenuItem
                // 2b. Create Member Price for the MenuItem

                $sedanPrice = explode(" ",$v['sedan']);
                $sedanPrice = $sedanPrice[1];

                $mSedanPrice = explode(" ",$v['msedan']);
                $mSedanPrice = $mSedanPrice[1];

                $priceSedan = Price::create([
                    'menu_item_id' => $menuitem->id,
                    'car_type' => 1,
                    'normal_price' => $sedanPrice,
                    'member_price' => $mSedanPrice
                ]);

                // 3. Create the MPV Price for the MenuItem
                // 3a. Create Normal Price for the MenuItem
                // 3b. Create Member Price for the MenuItem

                $mpvPrice = explode(" ",$v['mpv']);
                $mpvPrice = $mpvPrice[1];

                $mMpvPrice = explode(" ",$v['mmpv']);
                $mMpvPrice = $mMpvPrice[1];

                $priceMpv = Price::create([
                    'menu_item_id' => $menuitem->id,
                    'car_type' => 2,
                    'normal_price' => $mpvPrice,
                    'member_price' => $mMpvPrice
                ]);

                $priceMpv->menuitems()->attach($menuitem);
                $priceSedan->menuitems()->attach($menuitem);
                $menuitem->menu()->attach($menu);

            }
        }

           
        return back();
    }
}
