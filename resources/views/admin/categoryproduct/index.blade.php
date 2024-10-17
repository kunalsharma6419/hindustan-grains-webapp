@extends('admin.layouts.app')

@section('content')

    <div class="row card">
        <div class="col-md-12 card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="card-title">Product Lists</h4>
                <a href="{{route('category-product.create')}}" class="btn btn-primary btn-sm">Add Product</a>
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
                <table id="categoryTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#S.No</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Rating</th>
                            <th>Quality Image</th>
                            <th>Short Description</th>
                            {{-- <th>Long Description</th> --}}
                            <th>Product Quality</th>
                            <th>Original Price</th>
                            <th>Selling Price</th>
                            <th>Discounted Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($products) > 0)
                            @foreach ($products as $item)
                                <tr>
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>{{ $item->category->category_name}}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td >
                                        @php
                                            $categoryImages = json_decode($item->product_image_path , true);
                                            $imagePaths = is_array($categoryImages) && !empty($categoryImages) ? $categoryImages : ['assets/noImage (2).png'];
                                        @endphp
                                        @foreach($imagePaths as $path)
                                            <img src="{{ asset($path) }}" width="10%" class="img-fluid">
                                        @endforeach
                                    </td>
                                    <td>{{ $item->product_rating ?? "NA" }}</td>
                                    <td >
                                        @php
                                            $categoryImages = json_decode($item->quality_image_path  , true);
                                            $imagePaths = is_array($categoryImages) && !empty($categoryImages) ? $categoryImages : ['assets/noImage (2).png'];
                                        @endphp
                                        @foreach($imagePaths as $path)
                                            <img src="{{ asset($path) }}" width="10%" class="img-fluid">
                                        @endforeach
                                    </td>
                                    <td>{{ $item->short_description }}</td>
                                    {{-- <td>{!! $item->long_description !!}</td> --}}
                                    <td>{{ $item->product_quality}}</td>
                                    <td>{{ $item->original_price}}</td>
                                    <td>{{ $item->selling_price}}</td>
                                    <td>{{ $item->discounted_price }}</td>
                                    <td>
                                        <a href="{{ route('category-product.edit', $item->id) }}"
                                            class="btn btn-outline-success btn-sm">Edit</a>
                                        {{-- <a href="{{ route('category-product.show', $item->id) }}"
                                            class="btn btn-outline-primary btn-sm">View</a> --}}
                                        <a href="{{ route('category-product.delete', $item->id) }}"
                                            class="btn btn-outline-danger btn-sm">Delete</a>
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
    $('#categoryTable').dataTable({
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    });
</script>
@endsection
