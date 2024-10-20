@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="card-title">Category Lists</h4>
                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm">Add Category</a>
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
                            <th>Description</th>
                            <th>Category Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($categories) > 0)
                            @foreach ($categories as $item)
                                <tr>
                                    <th>{{ $loop->index + 1 }}.</th>
                                    <td>{{ $item->category_name  }}</td>
                                    <td>{{ $item->short_description  }}</td>
                                    <td>
                                        @php
                                            $categoryImages = json_decode($item->category_image_path, true);
                                            $imagePaths = is_array($categoryImages) && !empty($categoryImages) ? $categoryImages : ['assets/noImage (2).png'];
                                        @endphp
                                        @foreach($imagePaths as $path)
                                            <img src="{{ asset($path) }}" width="10%" class="img-fluid">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $item->id) }}"
                                            class="btn btn-outline-success btn-sm">Edit</a>
                                        {{-- <a href="{{ route('category.show', $item->id) }}"
                                            class="btn btn-outline-primary btn-sm">View</a> --}}
                                        <a href="{{ route('category.delete', $item->id) }}"
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
