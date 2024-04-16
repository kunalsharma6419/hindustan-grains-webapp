@extends('manager.layouts.app')

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
            <div class="table-responsive">
                <h4 class="card-title">Product Show</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <h3><strong>Product Name</strong></h3>
                            </td>
                            <td>
                                <h3>{{ $products->name }}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Quantity <span style="font-size:10px;color:red;">(Packs No.)</span:< /strong>
                            </td>
                            <td>{{ $products->packs_quantity }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ingredient Quantity<span style="font-size:10px;color:red;">(In grams.) :</strong>
                            </td>
                            <td>{{ $products->pack_ingredient_quantity }}</td>
                        </tr>
                        <tr>
                            <td><strong>Origin Price :</strong></td>
                            <td>{{ $products->original_price }}</td>
                        </tr>
                        <tr>
                            <td><strong>Retailer Price :</strong></td>
                            <td>{{ $products->retailer_price }}</td>
                        </tr>
                        <tr>
                            <td><strong>Distributor Price :</strong></td>
                            <td>{{ $products->distributer_price }}</td>
                        </tr>
                        <tr>
                            <td><strong>Short Description :</strong></td>
                            <td>{{ $products->short_description }}</td>
                        </tr>
                        <tr>
                            <td><strong>Long Description :</strong></td>
                            <td>{{ $products->long_description }}</td>
                        </tr>
                        <tr>
                            <td><strong>Image :</strong></td>
                            <td>
                                <img src="{{ asset($products->image) }}" class="img-fluid" width="20%">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
