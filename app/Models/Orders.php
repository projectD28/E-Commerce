<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        "user_id",
        "name",
        "email",
        "address",
        "phone",
        "payment_method",
        "date_order",
        "total_price",
        "status",
    ];
}
