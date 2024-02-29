@extends('pramoter.layouts.app')

@section('content')
<div class="row card">
	<div class="col-md-12 card-body">
		<form accept="{{route('payment_invoice_status',$invoice_id)}}" method="post" enctype="multipart/form-data" multiple>
			@csrf
			<input type="hidden" name="customer_id" value="{{$customer_get->id}}">
			@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Invoice No.</label>
                    <input type="text" class="form-control" value="{{$invoice_id}}" name="invoive_id" placeholder="Enter full name..." readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Name of the shopkeeper</label>
                    <input type="text" class="form-control" value="{{$customer_get->name}}" placeholder="Enter full name..." readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Promoter name</label>
                    <input type="text" class="form-control" value="{{Auth::user()->name}}" placeholder="Enter full name..." readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Grand Total Amount of invoice</label>
                    <input type="text" class="form-control" value="{{$orderTotal}}" id="grantTotal" name="grant_total" placeholder="Enter full name..." readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Payment Mode</label>
					<select name="payment_mode" class="form-select">
						<option value="PhonePe">PhonePe</option>
						<option value="GoogelPay">GoogelPay</option>
						<option value="PayTm">PayTm</option>
						<option value="BhimPe">BhimPe</option>
						<option value="Credit">Credit</option>
						<option value="Debit">Debit</option>
						<option value="Cash">Cash</option>
					</select>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Amount Paid</label>
                    <input type="text" class="form-control" onkeyup="amount(this)" placeholder="Enter Amount..." name="amount_paid">
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Amount Due</label>
                    <input type="text" class="form-control" id="amountDue" placeholder="" name="amount_due" readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Payment Percentage</label>
                    <input type="text" class="form-control" id="Percentage" placeholder="" name="payment_percentage" readonly>
                </div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Payment Status</label>
                    <select name="payment_status" class="form-select">
						<option value="Pending">Pending</option>
						<option value="Iniated">Iniated</option>
						<option value="Half paid">Half paid</option>
						<option value="Fully paid">Fully paid</option>
					</select>
                </div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Payment Proff</label>
                    <input type="file" class="form-control" name="payment_prof" multiple>
                </div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		</form>
	</div>
</div> 
<script type="text/javascript">
	function amount(amount) {
	    var granttotal = parseFloat($('#grantTotal').val());
	    var minus = granttotal - parseFloat(amount.value);
	    $('#amountDue').attr('value', minus.toFixed(2));
	    var percent = (minus * 100) / granttotal;
	    var percentage = parseFloat(percent.toFixed(2));
	    $('#Percentage').attr('value', percentage.toFixed(2));
	}

</script> 
@endsection
