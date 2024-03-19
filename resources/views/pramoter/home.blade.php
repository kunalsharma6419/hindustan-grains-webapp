@extends('pramoter.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      <div>
        <p class="statistics-title">Target</p>
        <h3 class="rate-percentage">Rs.{{$target->target_amount??0}}</h3>
      </div>
      <div>
        <p class="statistics-title">Monthly Salary</p>
        <h3 class="rate-percentage">Rs.{{$target->monthly_salary??0 }}</h3>
      </div>
      <div>
        <p class="statistics-title">Amount Received</p>
        <h3 class="rate-percentage">Rs.{{$amountpaid}}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Target Amount Pending</p>
        <h3 class="rate-percentage">Rs.{{$target->target_amount??0-$amountpaid??0}}</h3>
      </div>
      <div class="d-none d-md-block">
       @php

         $targets = $target->target_amount ?? 0;
          $salary = $target->monthly_salary ?? 0;
          $amountreceive = $amountpaid ?? 0;
          $save = 0;
          if ($targets != 0) {
              $save = (($targets - $amountreceive) * 100) / $targets;
          }

          $monthsalary = 0;
          if ($targets != 0) {
              $monthsalary = ($salary * (100 - $save)) / 100;
          }

            @endphp
        <p class="statistics-title">Salary Paid</p>
        <h3 class="rate-percentage">Rs.{{$monthsalary??0}}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Left Payment</p>
        <h3 class="rate-percentage">{{100-$save??0}}%</h3>
      </div>
    </div>
  </div>
</div>  
@endsection
