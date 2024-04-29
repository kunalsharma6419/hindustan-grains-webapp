@extends('Manager.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="card-title">Products List</h4>
            </div>
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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity<br><span style="font-size:10px;color:red;">(Packs No.)</span></th>
                            <th>Ingredient quantity<br><span style="font-size:10px;color:red;">(In grams.)</span></th>
                            <th>Original Price</th>
                            <th>Retailer Price</th>
                            <th>Distributor Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>
                                        <img src="{{ asset($product->image) }}" width="10%" class="img-fluid">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->packs_quantity }}</td>
                                    <td>{{ $product->pack_ingredient_quantity }}</td>
                                    <td>{{ $product->original_price }}</td>
                                    <td>{{ $product->retailer_price }}</td>
                                    <td>{{ $product->distributer_price }}</td>
                                    <td>
                                        <a href="{{ route('manager.product.show', $product->id) }}"
                                            class="btn btn-outline-primary btn-sm">View</a>
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
