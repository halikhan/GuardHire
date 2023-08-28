<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wedding extends Model
{
    use HasFactory;
    protected $fillable = [
        'image'
    ];
    public function setFilenamesAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }
    public function get_user_rating()
    {
        return $this->hasMany(service::class,'user_id');
    }

    public function get_user_services()
    {
        return $this->belongsTo(service::class,'user_id');
    }
    public function get_vednor_list()
    {
        return $this->belongsTo(BookVendor::class,'user_id');
    }
}
