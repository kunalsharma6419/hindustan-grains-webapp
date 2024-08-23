@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="card-title">Monthly Profit Loss</h4>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-3">
                        <input class="form-control" type="text" name="daterange" value="{{date('m/d/Y', strtotime($startDate))}} - {{date('m/d/Y', strtotime($endDate))}}" />
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
            </form>
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
                            <th>Total Paid Price</th>
                            <th>Total Invoice Price</th>
                            <th>Total Promoter Salary</th>
                            <th>Total Delivery</th>
                            <th>Profit/Loss</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$getGrossDetails->productInvoiceAmountPaid}}</td>
                            <td>{{$getGrossDetails->totalCustomerInvoice}}</td>
                            <td>{{$getGrossDetails->totalPromoterSalary}}</td>
                            <td>{{$getGrossDetails->totalDeliveryCost}}</td>
                            <td>{{$getGrossDetails->profitOrLoss}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

@section('custom-script')
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function(start, end, label) {
            // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
@endsection