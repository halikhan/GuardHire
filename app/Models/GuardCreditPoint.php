<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardCreditPoint extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function guard_payment_details()
    {
        return $this->hasMany(PaymentDetail::class,'user_id','guard_id');
    }
    public function client_postjob_details()
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function ClientJobs()
    {
        return $this->belongsTo(ClientPostJob::class,'client_id','user_id');
    }

}
