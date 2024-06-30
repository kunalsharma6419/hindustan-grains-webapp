@extends('pramoter.layouts.app')

<style>
    .invoice-status {
        min-width: 120px; /* Adjust the width as needed */
        min-height: 50px;
    }
</style>

@section('content')
    <div class="row card">
        <div class="card-body">
            <h4 class="card-title">Invoice List</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Invoice id</th>
                            <th>Customer Name</th>
                            <th>Customer Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($customer_data) > 0)
                            @foreach ($customer_data as $customer)
                                <tr>
                                    <th>{{ $loop->iteration }}.</th>
                                    <td>{{ $customer->invoice_id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->customer_type }}</td>
                                    <td class="invoice-status" data-status="{{ $customer->status }}">
                                        {{ ucfirst($customer->status) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('product_invoice_view', $customer->invoice_id) }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm">Invoice</a>
                                        <a href="{{ route('payment_status', $customer->invoice_id) }}"
                                            class="btn btn-outline-success btn-sm">Payment Status</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to update the cell color based on status
        function updateStatusColor(element) {
            var status = element.data('status');
            switch (status) {
                case 'inprogress':
                    element.css('background-color', 'yellow').css('color', 'black');
                    break;
                case 'supplied':
                    element.css('background-color', 'green').css('color', 'black');
                    break;
                case 'rejected':
                    element.css('background-color', 'red').css('color', 'black');
                    break;
                case 'overdue':
                    element.css('background-color', 'orange').css('color', 'black');
                    break;
                default:
                    element.css('background-color', '').css('color', 'black');
                    break;
            }
        }

        // Initialize status colors on page load
        $('.invoice-status').each(function() {
            updateStatusColor($(this));
        });
    });
</script>
@endsection
