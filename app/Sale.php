<?php

namespace App;

use App\Customer;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'customer_id',
        'customercar_id',
        'status',
        'sales_total',
        'is_cancel'
    ];

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function customercar()
    {
        return $this->belongsTo(Customercar::class);
    }

    public function menuitems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function unclaimed()
    {
        return $this->belongsToMany(Unclaimed::class);
    }

    public static function update_sales_total(Customer $customer, Sale $sale)
    {
        $sum = 0;

        $menuitems = $sale->menuitems;

        if(count($menuitems) > 0)
        {
            foreach($menuitems as $menuitem)
            {
                $sales_total[] = ($customer->is_member) ? $menuitem->prices()->first()->member_price : $menuitem->prices()->first()->normal_price;
            }

            foreach($sales_total as $st)
            {
                $sum += $st;
            }
        }

        $sale->sales_total = $sum;
        $sale->save();
    }
}
