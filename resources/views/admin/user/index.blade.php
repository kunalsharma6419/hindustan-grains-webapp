@extends('admin.layouts.app')

@section('content')
    <div class="row card">
        <div class="col-md-12 card-body">
            <h4 class="card-title">User List</h4>
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
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @if(count($users)>0)
                    @foreach ($users as $user)
                      @if(Auth::user()->id != $user->id)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                              @if($user->usertype == 2)
                                <strong>Promoter</strong>  
                              @elseif($user->usertype == 1)
                                <strong>Admin</strong>  
                              @else
                                <strong>User</strong>  
                              @endif
                            </td>
                            <td>
                              @if(Auth::user()->usertype == 1)
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="btn btn-outline-primary btn-sm">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                              </form>
                              @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
