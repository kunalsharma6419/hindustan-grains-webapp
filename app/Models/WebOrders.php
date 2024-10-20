<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebOrders extends Model
{
    use HasFactory;

    protected $table = 'website_orders';
    protected $fillable = [
        'payment_mode','total_price','order_time','order_date',
        'tracking_no','status','city','state','pincode','email',
        'address','phone','name','user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
   
}
