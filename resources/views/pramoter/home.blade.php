@extends('pramoter.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      <div>
        <p class="statistics-title">Target</p>
        <h3 class="rate-percentage">Rs.{{$target->target_amount}}</h3>
      </div>
      <div>
        <p class="statistics-title">Monthly Salary</p>
        <h3 class="rate-percentage">Rs.{{$target->monthly_salary }}</h3>
      </div>
      <div>
        <p class="statistics-title">Amount Received</p>
        <h3 class="rate-percentage">Rs.{{$amountpaid}}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Target Amount Pending</p>
        <h3 class="rate-percentage">Rs.{{$target->target_amount-$amountpaid}}</h3>
      </div>
      <div class="d-none d-md-block">
       @php
                $targets=$target->target_amount;
                $salary=(int)$target->monthly_salary;
                $amountreceive=$amountpaid;
                $save=(($targets-$amountreceive)*100)/$targets;

                $monthsalary=($salary*(100-$save))/100;

            @endphp
        <p class="statistics-title">Salary Paid</p>
        <h3 class="rate-percentage">Rs.{{$monthsalary}}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Left Payment</p>
        <h3 class="rate-percentage">{{100-$save}}%</h3>
      </div>
    </div>
  </div>
</div>  
@endsection
