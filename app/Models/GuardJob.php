<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardJob extends Model
{
    use HasFactory;
    protected $guarded = [];

    // ->withDefault()
    public function guard_ratings()
    {
        return $this->belongsTo(Rating::class,'id','guard_job_id');
    }

    public function get_guardtype(){
        return $this->belongsTo(GuardType::class,'job_type');
    }
    public function guard_location(){
        return $this->belongsTo(location::class,'location_id');
    }
    public function guard_service(){
        return $this->belongsTo(service::class,'services');
    }
    public function get_guard_tags()
    {
        return $this->hasMany(UserTag::class,'tag_id','id');
    }

    public function brwose_listing_tags()
    {
        return $this->hasMany(UserTag::class,'guard_job_id');
    }
    public function get_user_languages()
    {
        return $this->hasMany(UserLanguage::class,'guard_job_id');
    }
    public function guard_job_details()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function guard_credit_pts()
    {
        return $this->hasMany(GuardCreditPoint::class,'client_job_id','id');
    }
    public function hired_Listing_Service()
    {
        return $this->hasMany(ClientHiredListingService::class,'listing_id','id');
    }

}
