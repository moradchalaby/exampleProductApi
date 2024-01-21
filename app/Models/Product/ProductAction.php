<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'action',
        'data'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
