@extends('Manager.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
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
            <h4 class="card-title">Payment Status List</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Invoice id</th>
                            <th>Customer Name</th>
                            <th>Customer Type</th>
                            <th>Promoter Name</th>
                            <th width="10%">Grant Total</th>
                            <th>Amount Paid</th>
                            <th>Amount Due</th>
                            <th>Payment Percentage</th>
                            <th>Payment Mode</th>
                            <th>Status</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($payment_status) > 0)
                            @foreach ($payment_status as $payment)
                                @php
                                    $customer = \App\Models\CustomerInvoice::where(
                                        'id',
                                        $payment->customer_id,
                                    )->first();
                                    $promoter = \App\Models\User::where('id', $customer->promoter_id)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $payment->invoice_id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->customer_type }}</td>
                                    <td>{{ $promoter->name }}</td>
                                    <td>{{ $payment->grant_total }}</td>
                                    <td>{{ $payment->amount_paid }}</td>
                                    <td>{{ $payment->amount_due }}</td>
                                    <td>{{ $payment->payment_percentage }}</td>
                                    <td>{{ $payment->payment_mode }}</td>
                                    <td>
                                        @if ($payment->payment_status == 'pending')
                                            <button class="btn btn-primary btn-sm">Pending</button>
                                        @elseif($payment->payment_status == 'initiated')
                                            <button class="btn btn-success btn-sm">Initited</button>
                                        @elseif($payment->payment_status == 'half paid')
                                            <button class="btn btn-info btn-sm">Half Paid</button>
                                        @else
                                            <button class="btn btn-danger btn-sm">Fully Paid</button>
                                        @endif
                                    </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
