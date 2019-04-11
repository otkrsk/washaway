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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_general()
    {
        return view('menus.creategeneral');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->menu_name);
        $branch = Branch::find($request->branch_id);

        $menu_details = [
            'name' => $request->menu_name,
            'branch_id' => $request->branch_id
        ];

        $menu = Menu::create($menu_details);

        $sedan = $request->sedan_service;
        $mpv = $request->mpv_service;

        foreach($sedan as $s_menu)
        {
            $menu_item = MenuItem::create([
                'menu_id' => $menu->id,
                'name' => $s_menu['name']
            ]);

            $menu_item->menu()->attach($menu);

            $price = Price::create([
                'menu_item_id' => $menu_item->id,
                'car_type' => $sedan['car_type'],
                'normal_price' => $s_menu['normal_price'],
                'member_price' => $s_menu['member_price']
            ]);

            $price->menuitems()->attach($menu_item);
        }

        foreach($mpv as $m_menu)
        {
            $menu_item = MenuItem::create([
                'menu_id' => $menu->id,
                'name' => $m_menu['name']
            ]);

            $menu_item->menu()->attach($menu);

            $price = Price::create([
                'menu_item_id' => $menu_item->id,
                'car_type' => $mpv['car_type'],
                'normal_price' => $m_menu['normal_price'],
                'member_price' => $m_menu['member_price']
            ]);

            $price->menuitems()->attach($menu_item);
        }

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
        // dd($menu);
        $menuitems = $menu->menuitems;
        return view('menus.show',compact('menu','menuitems'));
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
