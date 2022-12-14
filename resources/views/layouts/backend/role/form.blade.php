@extends('layouts.backend.master')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">{{isset($role) ? "Edit " : "Create "}}Roles</h2>
                <a href="{{route('app.role.index')}}" class="btn btn-outline-danger float-right btn-sm">Back</a>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{isset($role) ? route('app.role.update',$role->id) : route('app.role.store')}}">
                    @csrf
                    @isset($role)
                        @method('PUT')
                    @endisset
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Manage Roles</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-12">
                                <label for="name">Input role name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{$role->name ?? old('name')}}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <spna></spna>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="border-bottom border-success">Manage Permission for role</strong>
                            <p class="pt-2 text-danger">
                                @error('permissions')
                                {{$message}}
                                @enderror
                            </p>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input id = "select_all" type="checkbox" class="custom-control-input" >
                                        <label for="select_all" class="custom-control-label">Select All</label>
                                    </div>
                                    @forelse($modules->chunk(3) as $key => $chunks)
                                        <div class="form-row">
                                            @foreach($chunks as $key => $module)
                                                <div class="col">
                                                    <h5>Module:{{$module->name}}</h5>
                                                    @foreach($module->permissions as $key => $permission)
                                                        <div class="md-3 ml-4">
                                                            <div class="custom-control custom-checkbox mb-2">
                                                                <input type="checkbox" class="custom-control-input" id="permission-{{$permission->id}}" name="permissions[]"
                                                                       value="{{$permission->id}}"
                                                                @isset($role)
                                                                    @foreach($role->permissions as $rPermission )
                                                                        {{$permission->id == $rPermission->id                                                                      ? 'checked' : ''}}
                                                                        @endforeach
                                                                    @endisset
                                                                >
                                                                <label for="permission-{{$permission->id}}" class="custom-control-label">{{$permission->name}}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    @empty
                                        <div class="row">
                                            <div class="cal text-center">No Roles Found</div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md-4 float-right">
                                <button class="btn btn-outline-success btn-block">

                                    @isset($role)
                                        <i class="fa fa-arrow-circle-up"></i>
                                        <span>Update</span>
                                    @else
                                        <i class="fa fa-plus"></i>
                                        <span>Create</span>
                                    @endisset
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
        $('#select_all').click(function (event){
            if (this.checked){
                $(':checkbox').each(function (){
                    this.checked = true;
                });
            }else {
                $(':checkbox').each(function (){
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
