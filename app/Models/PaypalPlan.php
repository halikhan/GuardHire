<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'interval_count',
        'Currency',
        'type',
        'plan_price',
        'product_id',
        'plan_id',
        'billing_cycles_period',
        'plan_response',
    ];
    public function plandetails()
    {
        return $this->hasOne(PaypalPlan::class,'product_id','product_id');
    }
}
