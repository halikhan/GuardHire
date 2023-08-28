<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedClient extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function client_job_details()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function fet_clienttype(){
        return $this->hasOne(GuardType::class,'id','job_type');
    }
    public function fet_clientlocation(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function fet_clientservice(){
        return $this->belongsTo(service::class,'services');
    }
}
