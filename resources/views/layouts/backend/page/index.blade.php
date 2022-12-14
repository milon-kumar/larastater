@extends('layouts.backend.master')
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Role</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
                <a href="{{route('app.Page.create')}}" class="btn btn-outline-success float-right btn-sm">Add Page</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover text-center display" id="roleTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Last Modification</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $key => $page)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$page->title}}</td>
                                <td>
                                    <a href="{{route('page',$page->slug)}}">{{$page->slug}}</a>
                                </td>
                                <td>
                                    @if($page->status==true)
                                        <span class="badge badge-info">Active</span>
                                    @else
                                        <span class="badge badge-danger">In Active</span>
                                    @endif
                                </td>
                                <td>{{$page->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('app.Page.edit',$page->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                                    <a href="{{route('app.page.destroy',$page->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                </div>
            </div>
        </section>
        @include('layouts.backend.includes.footer')
    </div>
@endsection

@push('js')
    <script href="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script href="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
@endpush
