<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairs extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "repair_content",
        "status",
        "start_guarantee",
        "end_guarantee"
    ];
}
