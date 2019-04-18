<?php

namespace App\Http\Controllers;

use DB;
use App\Branch;
use App\Carbrand;
use App\Carmodel;
use App\GeneralMenu;
use App\GeneralMenuItem;
use App\Menu;
use App\MenuItem;
use App\Payment;
use App\PaymentType;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
     * show the admin dashboard.
     *
     * @return \illuminate\contracts\support\renderable
     */
    public function showMenuItems()
    {
        return view('admin.menuitems');
    }

    /**
     * Return the list of menu items that can be enabled/disabled
     *
     * @return view
     */
    public function editMenuInfo()
    {
        // $menuItems = DB::table('menu_items')->get();
        $menu_items = MenuItem::get();
        $menus = Menu::get();

        $general_menu_items = GeneralMenuItem::get();
        $general_menus = GeneralMenu::get();
        // dd($menus->first()->branches);
        return view('admin.editmenuinfo', compact('menus','menu_items','general_menus','general_menu_items'));
    }

    public function updateMenuInfo(Request $request)
    {
        $keys = array_keys($request->cb);

        DB::table('menu_items')->whereIn('id', $keys)
            ->update(['status' => true]);

        DB::table('menu_items')->whereNotIn('id', $keys)
            ->update(['status' => false]);

        return redirect()->route('admin.editmenu');
    }

    public function editCarInfo()
    {
        $carArray = Carbrand::get();
        // dd($carArray);

        return view('admin.editcarinfo', compact('carArray'));
    }

    public function editPaymentType()
    {
        $paymentTypes = PaymentType::get();
        // dd($paymentTypes);

        return view('admin.editpaymenttype', compact('paymentTypes'));
    }

    public function editUnclaimed()
    {
        $unclaimedServices = [
            'Wash & Vacuum',
            'Premium Wash',
            '12 Step Meguair',
            '16 Step Meguair',
            'Nano Carnauba Wash',
            'Nano Crystal Coat'
        ];

        return view('admin.editunclaimed', compact('unclaimedServices'));
    }

    public function editFreeUnclaimed()
    {
        $unclaimedServices = [
            'Wash & Vacuum',
            'Premium Wash',
            '12 Step Meguair',
            '16 Step Meguair',
            'Nano Carnauba Wash',
            'Nano Crystal Coat'
        ];

        return view('admin.editfreeunclaimed', compact('unclaimedServices'));
    }

    public function editMembers()
    {
        $admin = User::whereHas('roles', function($query) {
            $query->where('id',1);
        })->get();

        $staff = User::whereHas('roles', function($query) {
            $query->where('id',2);
        })->get();

        return view('admin.editmembers', compact('admin','staff'));
    }

    public function editBranches()
    {
        $branches = Branch::get();
        return view('admin.editbranches', compact('branches'));
    }

    public function searchTransaction()
    {
        return view('admin.searchtransaction');
    }

}
