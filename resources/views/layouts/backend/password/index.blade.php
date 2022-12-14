@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Change Password</h2>
                <a href="{{route('app.profile.view')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{route('app.profile.updatePassword')}}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-uppercase">Input a your new password</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label for="name">Old Password</label>
                                    <input type="password" id="name" class="form-control" name="old_password">
                                    @error('old_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">New Password</label>
                                    <input type="password" id="email" class="form-control" name="new_password">
                                    @error('new_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email">Conform Password</label>
                                    <input type="password" id="email" class="form-control" name="con_password">
                                    @error('con_password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-outline-success btn-block" name="btn" value="Update Password">
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
