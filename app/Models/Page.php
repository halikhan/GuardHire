<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;



    public function pagedetails()
    {
        return $this->hasMany(Frontend::class, 'page_id');
    }

}
