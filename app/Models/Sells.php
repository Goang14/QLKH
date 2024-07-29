<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sells extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "product_id",
        "content",
        "status",
        "start_guarantee",
        "end_guarantee"
    ];
}
