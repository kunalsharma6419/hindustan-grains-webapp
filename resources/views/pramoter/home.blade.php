@extends('pramoter.layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="statistics-details d-flex align-items-center justify-content-between">
      @php
        $targetAmount = $target->target_amount ?? 0;
        $monthlySalary = $target->monthly_salary ?? 0;
        $amountReceived = $amountpaid ?? 0;
        $previousTarget = $target->pending_target ?? 0;
        $previousMonthlySalaryToPaid = $target->previous_monthly_salary_to_paid ?? 0;

        $targetPending = $targetAmount - $amountReceived;
        $savePercentage = $targetAmount != 0 ? (($targetAmount - $amountReceived) * 100) / $targetAmount : 0;
        $salaryPaid = $targetAmount != 0 ? ($monthlySalary * (100 - $savePercentage)) / 100 : 0;
        $leftPaymentPercentage = 100 - $savePercentage;
      @endphp

      <div>
        <p class="statistics-title">Target</p>
        <h3 class="rate-percentage">Rs.{{ $targetAmount }}</h3>
      </div>
      <div>
        <p class="statistics-title">Monthly Salary</p>
        <h3 class="rate-percentage">Rs.{{ $monthlySalary }}</h3>
      </div>
      <div>
        <p class="statistics-title">Amount Received</p>
        <h3 class="rate-percentage">Rs.{{ $amountReceived }}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Target Amount Pending</p>
        <h3 class="rate-percentage">Rs.{{ $targetPending }}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Salary Paid</p>
        <h3 class="rate-percentage">Rs.{{ $salaryPaid }}</h3>
      </div>
      <div class="d-none d-md-block">
        <p class="statistics-title">Left Payment</p>
        <h3 class="rate-percentage">{{ $leftPaymentPercentage }}%</h3>
      </div>
    </div>
    
    <div class="statistics-details d-flex align-items-center justify-content-between mt-2">
      <div>
        <p class="statistics-title">Previous Month Target</p>
        <h3 class="rate-percentage">Rs.{{ $previousTarget }}</h3>
      </div>
      <div>
        <p class="statistics-title">Previous Monthly Salary to be Paid</p>
        <h3 class="rate-percentage">Rs.{{ $previousMonthlySalaryToPaid }}</h3>
      </div>
    </div>
  </div>
</div>  
@endsection
