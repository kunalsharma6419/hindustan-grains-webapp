<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable =  [
                            'discounted_price','selling_price ',
                            'original_price','product_quality',
                            'long_description','short_description',
                            'product_rating','product_image_path',
                            'product_name','category_id','quality_image_path'
                           ];

    protected $table    = "website_products"; 

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    // public function webOrders():HasMany
    // {
    //     return $this->hasMany(WebOrders::class,'product_id');
    // }
}
