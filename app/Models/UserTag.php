<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function guard_tags_details()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
    public function client_tags_details()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
