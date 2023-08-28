<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutVendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function get_about_vendordetails()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
