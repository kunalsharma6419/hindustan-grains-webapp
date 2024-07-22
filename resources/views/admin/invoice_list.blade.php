@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Invoice List</h4>
            <a href="{{route('admin.addinvoice')}}" class="btn btn-primary mb-2">Add Invoice</a>
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
                <table id="invoiceTable" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Invoice id</th>
                            <th>Promoter Name</th>
                            <th>Customer Name</th>
                            <th>Customer Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($customer_data) > 0)
                            @foreach ($customer_data as $customer)
                                @php
                                    $prom_name = \App\Models\User::where('id', $customer->promoter_id)->first();
                                @endphp
                                <tr>
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>{{ $customer->invoice_id }}</td>
                                    <td>{{ $prom_name->name }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->customer_type }}</td>
                                    <td><a href="{{ route('invoice_show', $customer->invoice_id) }}" target="_blank"
                                            class="btn btn-outline-primary btn-sm">Invoice</a>
                                        <a href="{{ route('admin.payment_status', $customer->invoice_id) }}" class="btn btn-outline-success btn-sm">Pyament Status</a>
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

@section('custom-script')
<script>
    $('#invoiceTable').dataTable({
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    });
</script>
@endsection