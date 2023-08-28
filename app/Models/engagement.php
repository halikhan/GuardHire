<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class engagement extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setFilenamesAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }
    public function get_user_rating()
    {
        return $this->hasMany(service::class,'user_id');
    }
}
