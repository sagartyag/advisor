<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinpaymentTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'buyer_name', 
    ];
}
