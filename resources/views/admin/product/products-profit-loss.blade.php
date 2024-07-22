@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="card-title">Profit Loss List</h4>
            </div>
            <div class="table-responsive">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table id="profitLossTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Raw Material Qty.</th>
                            <th>Raw Material Price</th>
                            <th>Expense Amount</th>
                            <!-- <th>Total Product Price</th> -->
                            <th>Total Invoice Quantity</th>
                            <th>Total Invoice Price</th>
                            <th>Total Paid Price</th>
                            <th>Profit/Loss</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalOriginalPrice = 0;
                            $totalInvoicePrice = 0;
                            $totalPaidPrice = 0;
                        @endphp
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                @php
                                    $totalOriginalPrice += $product->OriginalPrice*$product->totalPackQuantity;
                                    $totalInvoicePrice += $product->productInvoicePrice;
                                    $productTotalPrice = $product->OriginalPrice*$product->totalPackQuantity;
                                    $totalPaidPrice += $product->productInvoiceAmountPaid;
                                    // $netPrice = $product->totalPaidPrice-abs($productTotalPrice);
                                    // $netPrice = $product->totalPaidPrice-$product->totalInvoicePrice;
                                    $netPrice = $product->productInvoiceAmountPaid-$product->productInvoicePrice-$product->deliveryCostPerProduct-$product->promoterSalary;
                                @endphp
                                <tr>
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>
                                        <img src="{{ asset($product->productImage) }}" width="10%" class="img-fluid">
                                    </td>
                                    <td>{{ $product->productName }}</td>
                                    <td>{{ $product->productDetails->pack_ingredient_quantity }}</td>
                                    <td>{{ $product->productDetails->raw_price }}</td>
                                    <td>{{ $product->productDetails->packaging_price }}</td>
                                    <!-- <td>{{ $productTotalPrice??0 }}</td> -->
                                    <td>{{ $product->productInvoiceQuantity??0 }}</td>
                                    <td>{{ $product->productInvoicePrice??0 }}</td>
                                    <td>{{ $product->productInvoiceAmountPaid??0 }}</td>
                                    <td><span class="{{($netPrice < 0)?'text-danger':'text-success'}}">{{$netPrice}}</span></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th colspan="6">Total</th>
                            <!-- <th>{{$totalOriginalPrice}}</th> -->
                            <th>{{$totalInvoicePrice}}</th>
                            <th>{{$totalPaidPrice}}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('custom-script')
<script>
    $('#profitLossTable').dataTable({
        "pageLength": 50
    });
</script>
@endsection