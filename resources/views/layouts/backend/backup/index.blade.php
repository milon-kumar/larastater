@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Backups</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
                <button type="button" class="btn btn-outline-success float-right btn-sm" onclick="event.preventDefault();
                                                document.getElementById('new-backup-form').submit();
">Create A New Backup</button>
                <form id="new-backup-form" method="post" style="display: none" action="{{route('app.backups.store')}}">
                    @csrf
                </form>
            </div>
        </div>

        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-hover text-center" id="roleTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>File Name</th>
                            <th>Size</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($backups as $key => $backup)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <code>{{$backup['file_name']}}</code>
                                </td>
                                <td>{{$backup['file_size']}}</td>
                                <td>{{$backup['created_at']}}</td>
                                <td>
                                    <a  href="#" class="btn btn-outline-success btn-sm">Download</a>

                                    <a href="{{route('app.backups.delete',$backup['file_name'])}}" class="btn btn-outline-danger btn-sm">Delete</a>
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
