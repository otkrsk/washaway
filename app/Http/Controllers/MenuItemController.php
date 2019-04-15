<?php

namespace App\Http\Controllers;

use App\Menu;
use App\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
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
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        // dd($item);
        // dd($menuItem);
        return view('menuitems.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menu = Menu::findOrFail($menuItem->menu->first()->id);

        $menuItem->name = $request->item_name;
        $menuItem->save();

        $menuItemPrices = $menuItem->prices->first();
        $menuItemPrices->normal_price = $request->normal_price;
        $menuItemPrices->member_price = $request->member_price;

        $menuItemPrices->save();

        return redirect()->action('MenuController@show',['menu' => $menu]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menu = Menu::findOrFail($menuItem->menu->first()->id);
        // dd($menuItem);

        MenuItem::destroy($id);

        return redirect()->action('MenuController@show',['menu' => $menu]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem)
    {
        //
    }
}
