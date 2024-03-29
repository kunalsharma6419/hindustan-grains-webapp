@extends('pramoter.layouts.app')

@section('content')
<div class="row card">
	<div class="col-md-12 card-body">
		@if(session('error'))
		    <div class="alert alert-danger">
		        {{ session('error') }}
		    </div>
		@endif
		@if(session('success'))
		    <div class="alert alert-success">
		        {{ session('success') }}
		    </div>
		@endif
	    <table class="table">
	        <tbody>
	            <tr>
	                <td><h3><strong>Invoice No :</strong></h3></td>
	                <td><h3>{{$payment_status->invoice_id}}</h3></td>
	            </tr>
	            <tr>
	                <td><strong>Customer Name :</strong></td>
	                <td>{{$customer->name}}</td>
	            </tr>
                 <tr>
	                <td><strong>Customer Type :</strong></td>
	                <td>{{$customer->customer_type}}</td>
	            </tr>
	            <tr>
	                <td><strong>Customer Type :</strong></td>
	                <td>{{$customer->customer_type}}</td>
	            </tr>
	            <tr>
	                <td><strong>Promoter Name :</strong></td>
	                <td>{{Auth::user()->name}}</td>
	            </tr>
	            <tr>
	                <td><strong>Grant total :</strong></td>
	                <td>Rs.{{$payment_status->grant_total}}</td>
	            </tr>
	            <tr>
	                <td><strong>Amount Paid :</strong></td>
	                <td>Rs.{{$payment_status->amount_paid}}</td>
	            </tr>
	            <tr>
	                <td><strong>Amount Due :</strong></td>
	                <td>Rs.{{$payment_status->amount_due}}</td>
	            </tr>
	            <tr>
	                <td><strong>Due Payment Percentage :</strong></td>
	                <td>{{$payment_status->payment_percentage}}%</td>
	            </tr>
	            <tr>
	                <td><strong>Payment Mode :</strong></td>
	                <td>{{$payment_status->payment_mode}}</td>
	            </tr>
	            <tr>
	                <td><strong>Payment Status :</strong></td>
	                <td>
	                    @if($payment_status->payment_status=='pending')
	                        <button class="btn btn-primary btn-sm">Pending</button>
	                    @elseif($payment_status->payment_status=='initiated')
	                        <button class="btn btn-success btn-sm">Initiated</button>
	                    @elseif($payment_status->payment_status=='half paid')
	                        <button class="btn btn-info btn-sm">Half Paid</button>
	                    @else
	                        <button class="btn btn-danger btn-sm">Fully Paid</button>
	                    @endif
	                </td>
	            </tr>
	        </tbody>
	    </table>
	</div>
</div>
@endsection
