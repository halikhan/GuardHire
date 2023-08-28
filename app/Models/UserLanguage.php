<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'guard_job_id',
        'language_id',
    ];

    public function user_Language_details()
    {
        return $this->belongsTo(Language::class,'language_id');
    }
}
