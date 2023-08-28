<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHiredCompany extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'company_id', 'status'];


    public function guard_job_details()
    {
        return $this->belongsTo(User::class,'company_id');
    }
}
