@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Edit Profile</h2>
                <a href="{{route('app.profile.view')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('app.profile.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-uppercase">Profile Information's</h5>
                            </div>
                            <div class="card-body">

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
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" class="dropify form-control" data-default-file="{{$user->getFirstMediaUrl('avater')}}" id="avatar">
                                    @error('avatar')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-outline-success btn-block" name="btn" value="Update Profile">
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
