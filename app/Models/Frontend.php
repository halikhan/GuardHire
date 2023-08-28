<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    use HasFactory;
    public function pages()
    {
        return $this->belongsTo(Page::class, 'id');
    }
}
