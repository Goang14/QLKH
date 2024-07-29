<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pawns extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "content",
        "money_pawn",
        "status",
        "start_guarantee",
        "end_guarantee"
    ];
}
