<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class service extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function get_businesscategory()
    {
        return $this->hasMany(User::class, 'bussinessCategory');
    }
}
