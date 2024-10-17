<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebOrderItem extends Model
{
    use HasFactory;
    protected $table = 'website_order_items';
    protected $fillable = [
        'total_price','product_price','product_quantity','product_id','order_id'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class,'product_id');
    }

    public function order():BelongsTo
    {
        return $this->belongsTo(WebOrders::class,'order_id');
    }

}
