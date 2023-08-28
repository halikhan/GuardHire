<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cms extends Model
{
    use HasFactory;
    public function getPageName(){
        return $this->belongsTo(Page::class,'page');
    }
}
