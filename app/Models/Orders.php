<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $primaryKey = 'id';

    protected $fillable = [
        "user_id",
        "data_order",
        "total_price",
        "status",
    ];
}
