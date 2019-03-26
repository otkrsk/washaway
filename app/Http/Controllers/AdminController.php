<?php

namespace App\Http\Controllers;

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
        $menuItems = [
            'Sales',
            'Member',
            'Report',
            'Appointment',
            'Administration'
        ];

        return view('admin.editmenuinfo', compact('menuItems'));
    }

    public function editCarInfo()
    {
        $carArray = [
            [
                'brand' => 'Honda',
                'model' => 'Civic',
                'color' => 'Black',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Prius',
                'color' => 'Silver',
            ],
            [
                'brand' => 'Nissan',
                'model' => 'Almera',
                'color' => 'Red',
            ],
            [
                'brand' => 'Proton',
                'model' => 'Exora',
                'color' => 'Red',
            ],
            [
                'brand' => 'Ford',
                'model' => 'Focus',
                'color' => 'Blue',
            ]
        ];

        $carInfo = (object) $carArray;

        return view('admin.editcarinfo', compact('carInfo'));
    }

    public function editPaymentType()
    {
        $paymentTypes = [
            'Cash',
            'Credit Card',
            'Boost',
            'TNG',
            'Washaway Credit'
        ];

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

    public function searchTransaction()
    {
        return view('admin.searchtransaction');
    }

}
