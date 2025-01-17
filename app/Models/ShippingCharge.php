<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;
    protected $table = 'shipping_charge';
    protected $fillable = [
        'name',
        'country',
        'rate',
        'status',
    ];
}
