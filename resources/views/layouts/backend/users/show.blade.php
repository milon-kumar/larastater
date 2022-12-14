@extends('layouts.backend.master')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Show Users</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
                    <a href="{{route('app.user.create')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>&nbsp;&nbsp;&nbsp;
                    <a href="{{route('app.user.edit',$user->id)}}" class="btn btn-outline-success float-right btn-sm">Edit</a>
            </div>
        </div>

        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card mb-3">
                            <div class="card-body">
                                <img class="img-fluid" src="{{$user->getFirstMediaUrl('avater')?$user->getFirstMediaUrl('avater'):config('app.placeholder').'300.png'}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card mb-3">
                            <div class="card-body p-0">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Role</th>
                                            <td>
                                                @if($user->role)
                                                    <span class="badge badge-warning">{{$user->role->name}}</span>
                                                @else
                                                    <span class="badge badge-warning">Role Not Found</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Activities Status</th>
                                            <td>
                                                @if($user->status==true)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Not Active</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Last Modified At: </th>
                                            <td>{{$user->updated_at->diffForHumans()}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Joined At: </th>
                                            <td>{{$user->created_at->diffForHumans()}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.backend.includes.footer')
    </div>
@endsection

