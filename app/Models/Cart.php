<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function products()
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }

    public function getBy($userId)
    {
        return Cart::whereUserId($userId)->first();
    }

    public function firstOrCreateBy($userId)
    {
        $cart = $this->getBy($userId);

        if (!$cart) {
            // $cart = $this->cart->create(['user_id' => $userId]);
            $cart = $this->create(['user_id' => $userId]);
        }
        return $cart;
    }

    //Lấy productcount
    public function getProductCountAttribute()
    {
        return auth()->check() ? $this->products->count() : 0;
    }

    public function getTotalPriceAttribute()
    {
        return auth()->check() ? $this->products->reduce(function ($carry, $item) {
            $item->load('product');
            $price = $item->product_quantity * ($item->product->sale ? $item->product->sale_price: $item->product->price);
            return $carry + $price;
        }, 0) : 0;
    }
}
