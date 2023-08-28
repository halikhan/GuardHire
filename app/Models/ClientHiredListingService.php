<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHiredListingService extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'guard_id', 'listing_id', 'status'];
}
