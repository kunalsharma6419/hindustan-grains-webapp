@extends('admin.layouts.app')

<style>
    .invoice-status {
        min-width: 120px; /* Adjust the width as needed */
        min-height: 50px;
    }
</style>


@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Invoice List</h4>
            <a href="{{ route('admin.addinvoice') }}" class="btn btn-primary mb-2">Add Invoice</a>
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
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Invoice id</th>
                            <th>Promoter Name</th>
                            <th>Customer Name</th>
                            <th>Customer Type</th>
                            <th>Supply Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($customer_data) > 0)
                            @foreach ($customer_data as $customer)
                                @php
                                    $prom_name = \App\Models\User::where('id', $customer->promoter_id)->first();
                                @endphp
                                <tr data-invoice-id="{{ $customer->invoice_id }}" data-supply-date="{{ $customer->supply_date }}" data-status="{{ $customer->status }}">
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>{{ $customer->invoice_id }}</td>
                                    <td>{{ $prom_name->name }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->customer_type }}</td>
                                    <td>{{ $customer->supply_date ?? '' }}</td>
                                    <td>
                                        <select class="form-control invoice-status" data-invoice-id="{{ $customer->invoice_id }}">
                                            <option value="supplied" {{ $customer->status == 'supplied' ? 'selected' : '' }}>Supplied</option>
                                            <option value="inprogress" {{ $customer->status == 'inprogress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="overdue" {{ $customer->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                            <option value="rejected" {{ $customer->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="{{ route('invoice_show', $customer->invoice_id) }}" target="_blank" class="btn btn-outline-primary btn-sm">Invoice</a>
                                        <a href="{{ route('admin.payment_status', $customer->invoice_id) }}" class="btn btn-outline-success btn-sm">Payment Status</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to update the status via AJAX
            function updateStatus(invoiceId, status, showAlert = true) {
                $.ajax({
                    url: '{{ route("invoice_status_update") }}',
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        invoice_id: invoiceId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Status updated successfully');
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        if (showAlert) {
                            alert('An error occurred while updating the status');
                        }       
                    }
                });
            }

            // Check for overdue statuses on page load
            // $('tr[data-invoice-id]').each(function() {
            //     var supplyDate = $(this).data('supply-date');
            //     var status = $(this).data('status');
            //     var invoiceId = $(this).data('invoice-id');

            //     if (supplyDate && new Date(supplyDate) < new Date() && status === 'inprogress') {
            //         updateStatus(invoiceId, 'overdue', false);
            //     }
            // });

            // Change event handler for the status dropdown
            $('.invoice-status').change(function() {
                var invoiceId = $(this).data('invoice-id');
                var status = $(this).val();
                updateStatus(invoiceId, status);
                updateDropdownColor($(this));
            });

            // Function to update the dropdown color based on status
            function updateDropdownColor(element) {
                var status = element.val();
                console.log(status);
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

            // Initialize dropdown colors on page load
            $('.invoice-status').each(function() {
                updateDropdownColor($(this));
            });
        });
    </script>
@endsection
