<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'store_name',
        'store_owner',
        'logo_url',
        'dobrou_mes1',
        'dobrou_mes2',
        'referral_1',
        'referral_2',
        'referral_3',
        'navigator_id',
    ];

    public function navigator()
    {
        return $this->belongsTo(Navigator::class);
    }
}