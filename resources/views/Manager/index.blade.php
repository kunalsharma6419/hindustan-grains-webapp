@extends('Manager.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Promoter</h2>
        <h5 class="text-center">{{$user ?? 0}}</h5>
      </div>
      <a href="{{route('manager.promoter.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Product</h2>
        <h5 class="text-center">{{$product ?? 0}}</h5>
      </div>
      <a href="{{route('manager.product.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Customers</h2>
        <h5 class="text-center">{{$customer ?? 0}}</h5>
      </div>
      <a href="{{route('manager.user.index')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-3 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <h2>Customer Invoice</h2>
        <h5 class="text-center">{{$ProductInvoice ?? 0}}</h5>
      </div>
      <a href="{{route('manager.invoice_list')}}" class="stretched-link"></a>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card text-center">
      <div class="card-body">
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
</div>
@endsection

@section('custom-script')
<script>
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