@extends('admin.layouts.app')

@section('content')
<div class="row card">
    <div class="col-md-12 card-body">
        <form action="{{route('promoter.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($target!==Null)
            @php
                $targets=$target->target_amount;
                $salary=(int)$target->monthly_salary;
                $amountreceive=$promoters_invoice;
                $save=(($targets-$amountreceive)*100)/$targets;
                $monthsalary=($salary*(100-$save))/100;

            @endphp
            @endif
            <input type="hidden" name="promoter_id" value="{{$promoters->id??Null}}">
            <input type="hidden" name="targetdiff" value="{{$target->targetdiff??Null}}" id="targetdiff">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Promoter Name</label>
                        <input type="text" class="form-control" value="{{$promoters->name}}" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Monthly Target Amount Received</label>
                        <input type="text" class="form-control" id="amountTotal" value="{{$promoters_invoice??Null}}" name="target_amount_received" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Monthly Target Amount</label>
                        <input type="text" class="form-control"  value="{{$target->target_amount??Null}}" id="targetAmount" name="target_amount">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Monthly Salary</label>
                        <input type="text" class="form-control" id="salary"  value="{{$target->monthly_salary??Null}}" name="monthly_salary">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Montly Salary Amount to be Paid</label>
                        <input type="text" class="form-control" id="salaryAmount"  value="{{$monthsalary??Null}}" name="monthly_salary_amount_to_paid" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Received percent</label>
                        <input type="text" class="form-control" id="savepercent" value="{{$target->pending_percent??Null}}" name="pending_percent" readonly>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#targetAmount, #salary').on('keyup', function(){
            var targetAmount = parseFloat($('#targetAmount').val());
            var salary = parseFloat($('#salary').val());
            var amountTotal = parseFloat($('#amountTotal').val());
            if(amountTotal<targetAmount)
            {	var targetdiff=targetAmount-amountTotal;
                var save = ((targetAmount-amountTotal)*100)/targetAmount;
                var receive_percent = 100-save;
                var salaryAmount=(salary*(100-save))/100;
                $('#salaryAmount').val(salaryAmount.toFixed(2));
                $('#targetdiff').val(targetdiff.toFixed(2));
                $('#savepercent').val(receive_percent.toFixed(2));
            }
            else{
                var salaryAmount = salary;
                $('#salaryAmount').val(salaryAmount.toFixed(2));
            }
        });
    });
</script>
@endsection
