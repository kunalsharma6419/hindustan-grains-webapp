@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <h4 class="card-title">User Update</h4>
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
            <form action="{{route('user.update',$users->id)}}" method="post">
            	@csrf
            	@method('put')
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Name</label>
            				<input type="text" name="name" class="form-control" value="{{$users->name}}" readonly>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Email</label>
            				<input type="text" name="email" class="form-control" value="{{$users->email}}" readonly>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Phone</label>
            				<input type="number" name="phone" class="form-control" value="{{$users->phone}}" readonly>
            			</div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
            				<label>Address</label>
            				<input type="text" name="address" class="form-control" value="{{$users->address}}" readonly>
            			</div>
            		</div>
            		<div class="col-md-12">
            			<div class="form-group">
            				<label>Role</label>
            				<select class="form-select" name="usertype">
							    <option value="0" {{ $users->usertype == 0 ? 'selected' : '' }}>User</option>
							    <option value="1" {{ $users->usertype == 1 ? 'selected' : '' }}>Admin</option>
							    <option value="2" {{ $users->usertype == 2 ? 'selected' : '' }}>Promoter</option>
							    <option value="3" {{ $users->usertype == 3 ? 'selected' : '' }}>Manager</option>
							    <option value="4" {{ $users->usertype == 4 ? 'selected' : '' }}>ShopKeeper</option>
							</select>

            			</div>
            		</div>
            		<div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            	</div>
            </form>

        </div>
    </div>
@endsection
