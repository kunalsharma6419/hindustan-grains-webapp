@extends('pramoter.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Invoice Create</h4>
            <div class="card">
                <form id="productForm" method="post" action="{{ route('productStore') }}">
                    @csrf
                    <div class="row card-body">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter full name...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name='phone_number'
                                    placeholder="Enter Phone number...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="gst_number" placeholder="Enter GST...">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="full_address" placeholder="Full Address..." style="height: 7%;"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select" onchange="customerType(this)" name="customer_type">
                                <option>select customer type</option>
                                <option value="distributer">Distributer</option>
                                <option value="retailer">Retailer</option>

                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <select class="js-example-basic-single w-100" onchange="productSearch(this)" name="state">
                                <option>Select Product</option>
                                @foreach ($product as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-3 ">
                            <table class="table table-bordered productcheck">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Original Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product details will be appended here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">
                                            <input type="number" class="form-control" id="deliveryCharge" name="delivery_charge" placeholder="Delivery Charge">
                                        </td>
                                        <td id="deliveryChargeText"></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="m-2">
                                <input type="button" value="Invoice" onclick="submitForm()" class="btn btn-primary">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
    <script type="text/javascript">
        function productSearch(id) {
            var customerType = $('select[name="customer_type"]').val();
            $.ajax({
                url: "product_Search/" + id.value,
                type: 'get',
                data: {
                    'customerType': customerType
                },
                success: function(result) {
                    var price = customerType == 'distributer' ? result.data.distributer_price : result.data
                        .retailer_price;
                    $('.productcheck tbody').append('<tr><td><input type="hidden" name="id[]" value="' + result
                        .data.id + '"><input type="hidden" name="selling_price[]" value="' + price + '">' +
                        result.data.name + '</td><td>' + price +
                        '</td><td><input type="number" name="quantity[]" class="form-control" onkeyup="calculateTotal(this)"></td><td class="totalPrice"></td><td><button onclick="removeRow(this)" class="btn btn-danger btn-sm">Remove</button></td></tr>'
                    );
                }
            });
        }


        function customerType(customerType) {
            var product_id = $('select[name="state"]').val();
            if (product_id != 'Select Product') {
                productSearch({
                    value: product_id
                });
            }
        }

        function removeRow(button) {
            $(button).closest('tr').remove();
        }

        function calculateTotal(input) {
            var row = $(input).closest('tr');
            var sellingPrice = parseFloat(row.find('td:eq(1)').text());
            var quantity = parseInt($(input).val());
            var totalPrice = sellingPrice * quantity;
            row.find('.totalPrice').html('<input type="hidden" name="totalprice[]" value="' + totalPrice.toFixed(2) + '">' +
                totalPrice.toFixed(2));
        }

        $(document).on('keyup', '#deliveryCharge', function() {
            var deliveryCharge = $(this).val();
            $('#deliveryChargeText').html(deliveryCharge);
        });

        function submitForm() {
            $('#productForm').submit();
            $('.productcheck tbody').empty(); // Remove table rows
        }
    </script>
@endsection
