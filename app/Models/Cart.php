<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $primaryKey = 'id';

    protected $fillable = [
        "user_id",
        "product_id",
        "qty",
    ];

    public function product()
    {
        return $this->hasOne(Products::class, "id", "product_id");
    }
}
