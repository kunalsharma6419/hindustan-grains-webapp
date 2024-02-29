<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductInvoice;
class CustomerInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productInvoice()
    {
        return $this->belongsTo(ProductInvoice::class, 'invoice_id', 'invoice_id');
    }

}
