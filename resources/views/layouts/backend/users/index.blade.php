@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Users</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
                <a href="{{route('app.user.create')}}" class="btn btn-outline-success float-right btn-sm">Add User</a>
            </div>
        </div>

        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover text-center" id="roleTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>User Role</th>
                            <th>Email</th>
                            <th>Joined At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if($user->status==true)
                                        <img src="{{$user->getFirstMediaUrl('avater') != null ? $user->getFirstMediaUrl('avater') :config('app.placeholder').'50.png'}}" style="width: 50px; border: 3px solid green; height: 50px;border-radius: 50%;" />
                                    @else
                                        <img src="{{$user->getFirstMediaUrl('avater') != null ? $user->getFirstMediaUrl('avater') :config('app.placeholder').'50.png'}}" style="width: 50px; border: 3px solid red; height: 50px;border-radius: 50%;" alt="">
                                    @endif
                                </td>
                                <td>
                                    @if($user->role)
                                        <span class="badge badge-warning">{{$user->role->name}}</span>
                                    @else
                                        <span class="badge badge-danger">Rols not found</span>
                                    @endif
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('app.user.show',$user->id)}}" class="btn btn-outline-info btn-sm">Show</a>
                                    <a href="{{route('app.user.edit',$user->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                                    <a href="{{route('app.user.delete',$user->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @include('layouts.backend.includes.footer')
    </div>
@endsection

@push('js')

@endpush
