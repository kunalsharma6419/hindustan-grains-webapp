@extends('manager.layouts.app')

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
            <form action="{{ route('manager.calculation.calculate') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="product">Select Product:</label>
                    <select class="form-control" id="product" name="product" required>
                        <option value="">Select Products</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="raw_spice_quantity">Raw Spice Quantity (kg):</label>
                    <input type="text" class="form-control" id="raw_spice_quantity" name="raw_spice_quantity" required value="{{ old('raw_spice_quantity') }}">
                </div>
                <div class="form-group">
                    <label for="packet_size">Packet Size:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="packet_size" name="packet_size" required value="{{ old('packet_size') }}">
                        <select class="form-control" id="packet_unit" name="packet_unit" required>
                            <option value="kg" {{ old('packet_unit') == 'kg' ? 'selected' : '' }}>kg</option>
                            <option value="g" {{ old('packet_unit') == 'g' ? 'selected' : '' }}>g</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Calculate</button>
            </form>
            
            <br>
            @if(isset($calculated_packets))
            <div id="packetsMessage">
                <div class="alert alert-info">
                    <strong>Packets of {{ $packet_size }} {{ $packet_unit }} {{ $product_name }} will be:</strong> 
                    <span class="badge badge-primary" id="cal_value">{{ $calculated_packets }} packets</span>
                </div>
                <div class="alert alert-info">
                    @if(($remaining_amount)>=1000)
                        <strong>Remaining Amount will be:</strong> 
                        <span class="badge badge-primary" id="rem_value">{{ $remaining_amount/1000 }} kilos</span>
                    @else
                        <strong>Remaining Amount will be:</strong> 
                        <span class="badge badge-primary" id="rem_val">{{ $remaining_amount }} grams</span>
                    @endif
                </div>

                <button type="button" class="btn btn-primary" id="addToStockBtn">Add to Stock</button>
            </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var productDropdown = document.getElementById('product');
            var rawSpiceQuantityInput = document.getElementById('raw_spice_quantity');
            var packetSizeInput = document.getElementById('packet_size');
            
            productDropdown.addEventListener('change', function () {
                rawSpiceQuantityInput.value = '';
                packetSizeInput.value = '';
            
                document.getElementById('addToStockBtn').style.display = 'none';
                document.getElementById('packetsMessage').style.display = 'none';
            });

            var addToStockBtn = document.getElementById('addToStockBtn');
            
            addToStockBtn.addEventListener('click', function () {
                var productId = document.getElementById('product').value;
                var calculatedPackets = document.getElementById('cal_value').textContent;

                axios.post("{{ route('manager.stock.add') }}", {
                    product_id: productId,
                    calculated_packets: calculatedPackets,
                })
                .then(function (response) {
                    var successMessage = document.createElement('div');
                    successMessage.classList.add('alert', 'alert-success');
                    successMessage.textContent = response.data.message;
                    
                    var parentElement = addToStockBtn.parentElement;
                    
                    parentElement.appendChild(successMessage);
                    
                    successMessage.scrollIntoView({ behavior: 'smooth' });
                })
                .catch(function (error) {
                    console.error(error);
                });
            });
        });
    </script>

@endsection
