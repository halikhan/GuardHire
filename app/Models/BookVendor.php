<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookVendor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function get_book_vendors()
    {
        return $this->belongsTo(User::class,'vendor_id');
    }
}
