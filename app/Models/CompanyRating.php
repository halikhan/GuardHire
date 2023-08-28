<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRating extends Model
{
    use HasFactory;
    public function get_rated_client_name()
    {
        return $this->belongsTo(User::class,'client_id');
    }
    public function get_guard_name()
    {
        return $this->belongsTo(User::class,'guard_id');
    }
}
