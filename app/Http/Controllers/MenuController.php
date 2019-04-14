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
        $id = 1;
        // dd($menuitems->first()->prices);
        return view('menus.show',compact('menu','menuitems','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function add_menuitem(Menu $menu)
    {
        // dd('youaddme');

        return view('menus.addmenuitem',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        dd('iedityou');
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
        // dd($menu);
        // dd(count($request->sedan_service));
        // dd($request->sedan_service);
        $sedan_service = $request->sedan_service;
        $mpv_service = $request->mpv_service;

        foreach($sedan_service as $ss)
        {
            // dd(!empty($ss['name']));
            // dd($ss['name']);
            // dd(!is_null($ss['name']));
            // if(!is_null($ss['name']) && !is_null($ss['normal_price']) && !is_null($ss['normal_price']))

            // if( is_null( $ss['name'] ) )
            // {
            //     dd('wakka');
            // }
            // else
            // {
            //     dd('dakka');
            // }

            if( !empty($ss['name']) && !empty($ss['normal_price']) && !empty($ss['member_price']) )
            {
                $menu_item = MenuItem::create([
                    'menu_id' => $menu->id,
                    'name' => $ss['name']
                ]);

                $menu_item->menu()->attach($menu);

                $price = Price::create([
                    'menu_item_id' => $menu_item->id,
                    'car_type' => $sedan_service['car_type'],
                    'normal_price' => $ss['normal_price'],
                    'member_price' => $ss['member_price']
                ]);

                $price->menuitems()->attach($menu_item);
            }
        }

        foreach($mpv_service as $ms)
        {
            if( !empty($ms['name']) && !empty($ms['normal_price']) && !empty($ms['member_price']) )
            {
                $menu_item = MenuItem::create([
                    'menu_id' => $menu->id,
                    'name' => $ms['name']
                ]);

                $menu_item->menu()->attach($menu);

                $price = Price::create([
                    'menu_item_id' => $menu_item->id,
                    'car_type' => $mpv_service['car_type'],
                    'normal_price' => $ms['normal_price'],
                    'member_price' => $ms['member_price']
                ]);

                $price->menuitems()->attach($menu_item);
            }
        }

        $menuitems = $menu->menuitems;
        $id = 1;

        return view('menus.show',compact('menu','menuitems','id'));
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
