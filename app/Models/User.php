<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Subscription;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'contact',
        'message',
        'bussinessCategory',
        'company',
        'password',
        'show_password',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function compnay_tags_details()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
    public function get_vednorbusinesscategory()
    {
        return $this->belongsTo(service::class, 'bussinessCategory');
    }

    public function get_user_rating()
    {
        return $this->hasMany(Rating::class,'vendor_id');
    }

    public function get_user_languages()
    {
        return $this->hasMany(UserLanguage::class,'guard_job_id');
    }
    public function get_about_vendor()
    {
        return $this->hasMany(AboutVendor::class,'user_id');
    }

    public function get_user_ratingbyEvaluatoronprofile()
    {
        return $this->hasMany(ratinByEvaluator::class,'user_id');
    }


    function get_price(){
        return $this->belongsTo(Subscription::class,'price');
    }

    function get_guardjobs(){
        return $this->hasMany(GuardJob::class,'user_id');
    }
    public function guard_service(){
        return $this->belongsTo(service::class,'services');
    }
    function get_clientjobs(){
        return $this->hasMany(ClientPostJob::class,'user_id');
    }
    function featured_clientjobs(){
        return $this->hasOne(FeaturedClient::class,'user_id');
    }
    function featured_guardjobs(){
        return $this->hasOne(FeaturedGuard::class,'user_id');
    }
    public function get_guard_tags()
    {
        return $this->hasMany(UserTag::class,'guard_job_id');
    }
     public function guard_ratings()
    {
        return $this->hasMany(Rating::class, 'guard_id', 'id');
    }

    public function getAverageRating()
    {
        return $this->guard_ratings()->avg('rate');
    }

    public function guard_location(){
        return $this->belongsTo(location::class,'userlocation');
    }


}
