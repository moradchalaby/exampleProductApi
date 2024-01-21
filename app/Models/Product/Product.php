<?php

namespace App\Models\Product;

use App\Models\User;
use App\Observers\Product\ProductActionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

   protected $fillable = [
        'name',
        'price',
        'type',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function boot()
    {
        parent::boot();
        Product::observe(new ProductActionObserver());
    }
    public function actions()
    {
        return $this->hasMany(ProductAction::class, 'product_id');
    }



    protected $dispatchesEvents = [
        'created' => \App\Events\Product\ProductCreated::class,
    ];
}
