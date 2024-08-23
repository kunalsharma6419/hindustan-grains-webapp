@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Promoter</h2>
        <h5 class="text-center">{{$user ?? 0}}</h5>
      </div>
      <a href="{{route('promoter.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Product</h2>
        <h5 class="text-center">{{$product ?? 0}}</h5>
      </div>
      <a href="{{route('product.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Customers</h2>
        <h5 class="text-center">{{$customer ?? 0}}</h5>
      </div>
      <a href="{{route('user.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Customer Invoice</h2>
        <h5 class="text-center">{{$ProductInvoice ?? 0}}</h5>
      </div>
      <a href="{{route('invoice_list')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <canvas id="productsProfitLossChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning">Top Selling Products</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="profitLossTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Total Invoice Price</th>
                </tr>
            </thead>
            <tbody>
                @if (count($topProducts) > 0)
                    @foreach ($topProducts as $product)
                        <tr>
                            <th>{{ $loop->index + 1 }}.</th>
                            <td>
                                <img src="{{ asset($product->productImage) }}" width="10%" class="img-fluid">
                            </td>
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->totalInvoicePrice??0 }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-4">
    <div class="card">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning">Promoters Details</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="promoterTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Salary</th>
                    <th>Total Sales</th>
                    <th>Total Delivery</th>
                </tr>
            </thead>
            <tbody>
                @if (count($promoterWiseSalary) > 0)
                    @foreach ($promoterWiseSalary as $promoter)
                        <tr>
                            <th>{{ $loop->index + 1 }}.</th>
                            <td>{{ $promoter->name }}</td>
                            <td>{{ $promoter->totalSalary??0 }}</td>
                            <td>{{ $promoter->totalSales??0 }}</td>
                            <td>{{ $promoter->totalDelivery??0 }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-script')
<script>

$('#promoterTable').dataTable({});

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Total Invoice Amount', 'Total Receive Amount'],
        datasets: [{
            label: 'Profit & Loss',
            data: ['{{(($totalInvoicePrice+$promoterSalaries)-$paymentstatus) ?? 0}}', '{{($paymentstatus-$promoterSalaries) ?? 0}}'],
            backgroundColor: [
                'rgba(255, 99, 132)',
                'rgba(54, 162, 235)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctxProd = document.getElementById('productsProfitLossChart').getContext('2d');
var prodLabels = [];
var prodPrices = [];
var priceBorderColors = [];
var priceBackgroundColors = [];
var productData = [];
@foreach($productWisePrices as $pkey => $productDetails)
  @php
    $netPrice = $productDetails->productInvoiceAmountPaid-$productDetails->deliveryCostPerProduct-$productDetails->productInvoicePrice-$productDetails->promoterSalary;
  @endphp
  prodLabels.push('{{$productDetails->productName}}');
  prodPrices.push({{$netPrice}});

  productData.push(
    {
      name: '{{$productDetails->productName}}',
      value: {{$netPrice}},
      bulletSettings: { src: '{{asset($productDetails->productImage)}}' }
    }
  );
  @if($netPrice > 0)
    priceBorderColors.push('rgba(76, 175, 80)');
    priceBackgroundColors.push('rgba(76, 175, 80, 0.3)');
  @else
    priceBorderColors.push('rgba(255, 99, 132)');
    priceBackgroundColors.push('rgba(255, 99, 132, 0.3)');
  @endif
@endforeach
  console.log('prodLabels----->>>>', prodLabels);
  console.log('prodPrices----->>>>', prodPrices);
  var dataPrices = {
    labels: prodLabels,
    datasets: [
      {
        label: 'Price',
        data: prodPrices,
        borderColor: priceBorderColors,
        backgroundColor: priceBackgroundColors,
        pointStyle: 'circle',
        pointRadius: 10,
        pointHoverRadius: 15
      }
    ]
  };

  var config = {
    type: 'bar',
    data: dataPrices,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Profit Loss',
        }
      }
    }
  };
  var productsProfitLossChart = new Chart(ctxProd, config);
</script>
@endsection