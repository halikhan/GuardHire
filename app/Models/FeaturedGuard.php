<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedGuard extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function guard_job_details()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function fet_guardtype(){
        return $this->hasOne(GuardType::class,'id','job_type');
    }
    public function fet_guardlocation(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function fet_guardservice(){
        return $this->belongsTo(service::class,'services');
    }
}
