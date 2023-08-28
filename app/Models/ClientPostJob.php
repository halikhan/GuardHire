<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClientPostJob extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function client_location(){
        return $this->belongsTo(location::class,'location');
    }
    public function client_postjob_details()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function get_guardtype(){
        return $this->belongsTo(GuardType::class,'job_type');
    }

    public function client_service(){
        return $this->belongsTo(service::class,'services');
    }
    public function get_client_tags()
    {
        return $this->hasMany(UserTag::class,'client_job_id');
    }
    public function get_user_languages()
    {
        return $this->hasMany(UserLanguage::class,'client_job_id');
    }
 
    public function guard_credit_pts()
    {
        return $this->hasMany(GuardCreditPoint::class,'client_job_id','id');
    }

    public function get_user_images()
    {
        return $this->hasMany(ImageGallery::class,'client_job_id');
    }


}
