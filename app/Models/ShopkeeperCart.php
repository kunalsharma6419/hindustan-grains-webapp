<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopkeeperCart extends Model
{
    use HasFactory;
    protected $table    = 'shopkeeper_carts';
    protected $fillable = ['total_price','product_quantity','product_price','product_id','user_id'];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
