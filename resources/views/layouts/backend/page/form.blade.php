@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">{{isset($pages) ? 'Edit' : 'Create'}} Page</h2>
                <a href="{{route('app.Page.index')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="post" action="{{isset($pages) ? route('app.Page.update',$pages->id) : route('app.Page.store')}}" enctype="multipart/form-data">
                        @csrf
                        @isset($pages)
                            @method('PUT')
                        @endisset
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-uppercase">Page Information's</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Bashic Info</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-2">
                                                    <label for="title">Title</label>
                                                    <input type="text" id="title" class="form-control" name="title" value="{{$pages->title ?? old('title')}}">
                                                    @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="excerpt">Excerpt</label>
                                                    <textarea type="text" id="excerpt" class="form-control" name="excerpt">{{isset($pages)?$pages->excerpt:''}}</textarea>
                                                    @error('meta_description')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="body">Body</label>
                                                    <textarea type="text" id="body" rows="5" class="form-control" name="body">{{isset($pages)?$pages->body:''}}</textarea>
                                                    @error('body')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Page Image And Status</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="image">Page Image</label>
                                                    <input type="file" name="image" class="dropify form-control" data-default-file="{{isset($pages) ? $pages->getFirstMediaUrl('image') : ''}}" id="image">
                                                    @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="switch1"  name="status" @isset($pages) {{$pages->status == true ? 'checked' : ''}} @endisset>
                                                        <label class="custom-control-label" for="switch1">Status</label>
                                                    </div>
                                                    @error('status')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>Meta Info</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-2">
                                                    <label for="meta_description">Meta Description</label>
                                                    <textarea type="text" id="meta_description" class="form-control" name="meta_description">{{isset($pages)?$pages->meta_description:''}}</textarea>
                                                    @error('meta_description')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="meta_keywords">Meta Keywords</label>
                                                    <textarea type="text" id="meta_keywords" class="form-control" name="meta_keywords">{{isset($pages)?$pages->meta_keywords:''}}</textarea>
                                                    @error('meta_keywords')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-6 offset-2">
                                    <button type="submit" class="btn btn-outline-success btn-block">
                                        @if(isset($pages))
                                            Update
                                        @else
                                            Create
                                        @endif
                                    </button>
                                </div>
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

