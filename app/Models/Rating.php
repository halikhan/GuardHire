<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ratings()
    {
        return $this->belongsTo(GuardJob::class,'guard_job_id');
    }

    public function get_rated_client_name()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
