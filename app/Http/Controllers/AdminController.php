<?php

namespace App\Http\Controllers;

use DB;
use App\Car;
use App\Payment;
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
        $menuItems = DB::table('menu_items')->get();
        return view('admin.editmenuinfo', compact('menuItems'));
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
        $carArray = Car::get();

        return view('admin.editcarinfo', compact('carArray'));
    }

    public function editPaymentType()
    {
        $paymentTypes = Payment::get();

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

        $members = User::whereHas('roles', function($query) {
            $query->where('id',2);
        })->get();

        // dd($admin);
        // dd($members);

        return view('admin.editmembers', compact('admin','members'));
    }

    public function editBranches()
    {
        $branches = [
            'Puchong',
            'Sunway Mentari',
            'Cheras'
        ];
        return view('admin.editbranches', compact('branches'));
    }

    public function searchTransaction()
    {
        return view('admin.searchtransaction');
    }

}
