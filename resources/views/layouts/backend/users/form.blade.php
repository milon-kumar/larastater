@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">{{isset($user) ? 'Edit' : 'Create'}} User</h2>
                <a href="{{route('app.user.index')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{isset($user) ? route('app.user.update',$user->id) : route('app.user.store')}}" enctype="multipart/form-data">
                        @csrf
                        @isset($user)
                            @method('PUT')
                        @endisset
                        <div class="row">
                            <div class="card-body col-md-8">
                                <h5 class="text-uppercase">User Information's</h5>
                                <div class="form-group mb-2">
                                    <label for="name">User Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{$user->name ?? old('name')}}">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">User Email</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{$user->email ?? old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="con_password">Conform Password</label>
                                    <input type="password" id="con_password" class="form-control" name="password_confirmation">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-body col-md-4">
                                <h5 class="text-uppercase">Select role and status</h5>
                                <div class="form-group">
                                    <label for="select_role">Select Role</label>
                                    <select name="role" class="js-example-basic-single form-control" id="">
                                        @foreach($roles as $key=>$role)
                                            <option value="{{$role->id}}"@isset($user){{$user->role->id == $role->id ? 'selected' : ''}} @endisset>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="avater">Avater</label>
                                    <input type="file" name="avater" class="dropify form-control" data-default-file="{{isset($user) ? $user->getFirstMediaUrl('avater') : ''}}" id="avater">
                                    @error('avater')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch1"  name="status" @isset($user) {{$user->status == true ? 'checked' : ''}} @endisset>
                                        <label class="custom-control-label" for="switch1">Toggle me</label>
                                    </div>
                                    @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-success">

                                    @isset($user)
                                        <i class="fa fa-arrow-circle-up"></i>
                                        <span>Update</span>
                                    @else
                                        <i class="fa fa-plus"></i>
                                        <span>Create</span>
                                    @endisset
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.backend.includes.footer')
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
            $('.js-example-basic-single').select2();
        });
    </script>
@endpush
