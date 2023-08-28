<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['user_id', 'guard_id', 'job_id'];
    public function guard_job()
    {
        return $this->belongsTo(GuardJob::class,'job_id');
    }
    public function guard_job_details()
    {
        return $this->belongsTo(User::class,'guard_id');
    }
}
