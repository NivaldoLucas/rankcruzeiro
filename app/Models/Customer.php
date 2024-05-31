<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_name',
        'store_owner',
        'logo_url',
        'dobrou_mes1',
        'dobrou_mes2',
        'recommendations',
    ];
}