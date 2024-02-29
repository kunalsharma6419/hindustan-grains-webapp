<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerInvoice;
class ProductInvoice extends Model
{
    use HasFactory;
    protected $guarded = [];
     public function customerInvoices()
    {
        return $this->hasMany(CustomerInvoice::class, 'invoice_id', 'invoice_id');
    }
}
