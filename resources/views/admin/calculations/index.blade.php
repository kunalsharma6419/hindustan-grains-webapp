@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <h4 class="card-title">Inventory Packaging Calculator</h4>
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
            <form action="{{ route('calculation.calculate') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="product">Select Product:</label>
                    <select class="form-control" id="product" name="product" required>
                        <option value="">Select Products</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="raw_spice_quantity">Raw Spice Quantity (kg):</label>
                    <input type="text" class="form-control" id="raw_spice_quantity" name="raw_spice_quantity" required>
                </div>
                <div class="form-group">
                    <label for="packet_size">Packet Size:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="packet_size" name="packet_size" required>
                        <select class="form-control" id="packet_unit" name="packet_unit" required>
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
            </form>
            <br>
            @if(isset($calculated_packets))
                <div class="alert alert-info">
                    <strong>Packets of {{ $packet_size }} {{ $packet_unit }} {{ $product_name }} will be:</strong> {{ $calculated_packets }} packets
                </div>
                <div class="alert alert-info">
                    @if(($remaining_amount)>=1000)
                        <strong>Remaining Amount will be:{{$remaining_amount/1000}} kilos</strong> 
                    @else
                        <strong>Remaining Amount will be:{{$remaining_amount}} grams</strong>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection
