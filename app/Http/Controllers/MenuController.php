<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Menu;
use App\MenuItem;
use App\Price;

use Illuminate\Http\Request;

class MenuController extends Controller
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
        $branches = Branch::get();
        // dd($branches);

        return view('menus.create',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->request);

        $branch = Branch::find($request->branch_id);

        $menu = Menu::create([
            'name' => $request->menu_name,
            'branch_id' => $request->branch_id,
        ]);

        $menu_item = MenuItem::create([
            'menu_id' => $menu->id,
            'name' => $request->menu_item_name
        ]);

        switch($request->service) {
            case 1:
                $normal_price = $request->price;
                $member_price = 0;
                break;
            case 2:
                break;
                $normal_price = $request->price;
                $member_price = 0;
            case 3:
                break;
                $normal_price = 0;
                $member_price = $request->price;
            case 4:
                break;
                $normal_price = 0;
                $member_price = $request->price;
            default:
                $normal_price = 0;
                $member_price = 0;
                break;
        }

        $price = Price::create([
            'menu_items_id' => $menu_item->id,
            'car_type' => $request->car_type,
            'normal_price' => $normal_price,
            'member_price' => $member_price
        ]);

        $price->menuitems()->attach($menu_item);
        $menu_item->menu()->attach($menu);
        $menu->branches()->attach($branches);

        return redirect()->route('admin.editmenu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        dd('yougadit too');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
