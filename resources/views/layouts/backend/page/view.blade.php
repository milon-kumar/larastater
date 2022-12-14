@extends('layouts.backend.master')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">View Page</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
            </div>
        </div>

        <section class="no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card mb-3">
                            <div class="card-body">
                                <img class="img-fluid" src="{{$page->getFirstMediaUrl('image')?$page->getFirstMediaUrl('image'):config('app.placeholder').'300.png'}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card mb-3">
                            <div class="card-body p-0">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{$page->title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Excerpt</th>
                                        <td>{{$page->excerpt}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">body</th>
                                        <td>{{$page->body}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Activities Status</th>
                                        <td>
                                            @if($page->status==true)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Not Active</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Meta Description</th>
                                        <td>{{$page->meta_description}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Meta Keywords</th>
                                        <td>{{$page->meta_keywords}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Last Modified At: </th>
                                        <td>{{$page->updated_at->diffForHumans()}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Joined At: </th>
                                        <td>{{$page->created_at->diffForHumans()}}</td>
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

