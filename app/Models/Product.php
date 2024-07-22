<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $guarded = [];

    public static function calculateTotalStockValue()
    {
        return self::sum(\DB::raw('original_price * packs_quantity'));
    }

    public static function getProductWisePrices()
    {
        $products = self::leftJoin('product_invoices', 'product_invoices.product_id', '=', 'products.id')
        ->leftJoin('payment_statuses', 'payment_statuses.invoice_id', '=', 'product_invoices.invoice_id')
        ->whereNotNull('product_invoices.invoice_id')
        ->groupBy(
            'products.id',
            'products.image',
            'products.name',
            'products.original_price',
            'product_invoices.invoice_id'
        )
        ->select(
            'products.id AS productId',
            'products.image AS productImage',
            'products.name AS productName',
            'products.original_price AS productOriginalPrice',
            'product_invoices.invoice_id AS invoiceId',
            \DB::raw('SUM(products.pack_ingredient_quantity) AS productRawQty'),
            \DB::raw('SUM(products.raw_price) AS productRawPrice'),
            \DB::raw('SUM(products.packaging_price) AS ExpensePrice'),
            \DB::raw('SUM(products.original_price) AS OriginalPrice'),
            \DB::raw('SUM(products.packs_quantity) AS totalPackQuantity'),
            \DB::raw('SUM(product_invoices.quantity) AS totalInvoiceQuantity'),
            \DB::raw('SUM(products.original_price*product_invoices.quantity) as totalInvoicePrice'),
            \DB::raw('SUM(payment_statuses.amount_paid) as totalPaidPrice')
        )
        ->get();

        foreach ($products as $key => $value) {
            $products[$key]->productDetails = self::find($value->productId);
            $products[$key]->productCount = $productCount = ProductInvoice::where('invoice_id', $value->invoiceId)->get()->count();
            $productInvoiceDetails = ProductInvoice::where('product_id', $value->productId)->first();
            $products[$key]->productInvoicePrice = $value->productOriginalPrice*$productInvoiceDetails->quantity;
            $products[$key]->productInvoiceQuantity = $productInvoiceDetails->quantity;
            $productInvoiceAmountPaid = PaymentStatus::where('invoice_id', $value->invoiceId)
                ->where('payment_status', '!=', 'pending')
                ->select(
                    \DB::raw('SUM(amount_paid) as amountPaid')
                )
                ->groupBy('invoice_id')
                ->first();
            $products[$key]->productInvoiceAmountPaid = (!empty($productInvoiceAmountPaid))?$productInvoiceAmountPaid->amountPaid/$productCount:0;
            $products[$key]->customerInvoice = $customerInvoice = CustomerInvoice::where('invoice_id', $value->invoiceId)->first();
            $totalPromoterProducts = ProductInvoice::where('promoter_id', $customerInvoice->promoter_id)->distinct('product_id')->count();
            $products[$key]->promoterSalaryDetails = PromoterSalaryTarget::where('promoter_id', $customerInvoice->promoter_id)->orderBy('id', 'desc')->first();
            $products[$key]->promoterSalary = round(isset($products[$key]->promoterSalaryDetails->monthly_salary)?$products[$key]->promoterSalaryDetails->monthly_salary/$totalPromoterProducts:0, 2);
            $products[$key]->deliveryCostPerProduct = $products[$key]->customerInvoice->delivery_charge/$productCount;
        }
        return $products;
    }

    public static function getTopSellingProducts()
    {
        $products = self::leftJoin('product_invoices', 'product_invoices.product_id', '=', 'products.id')
        ->whereNotNull('product_invoices.invoice_id')
        ->groupBy(
            'products.id',
            'products.image',
            'products.name'
        )
        ->select(
            'products.id AS productId',
            'products.image AS productImage',
            'products.name AS productName',
            \DB::raw('SUM(product_invoices.total_price) as totalInvoicePrice'),
            \DB::raw('SUM(product_invoices.selling_price) as totalSellingPrice'),
            \DB::raw('SUM(product_invoices.quantity) as totalQty')
        )
        ->orderBy('totalInvoicePrice', 'desc')
        ->limit(5)
        ->get();

        // dd($products);

        return $products;
    }

    public static function getTotalInvoiceAmount()
    {
        return CustomerInvoice::select(
            \DB::raw('SUM(customer_invoices.total_invoice_amount) as totalInvoicePrice')
        )
        ->first();
    }
}
