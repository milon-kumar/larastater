@extends('layouts.backend.master')
@push('css')
    div.dataTables_wrapper {
    margin-bottom: 3em;
    }
@endpush
@section('content')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom d-inline-block">Role</h2>
                <span class="align-content-center text-success">{{session('message')}}</span>
                <a href="{{route('app.role.create')}}" class="btn btn-outline-success float-right btn-sm">Add roles</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover text-center display" id="roleTable">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                @if($role->permissions->count()>0)
                                    <td><span class="badge badge-success">{{$role->permissions->count()}}</span></td>
                                @else
                                    <td><span class="badge badge-danger">No Permission Found</span></td>
                                @endif
                                <td>{{$role->updated_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('app.role.edit',$role->id)}}" class="btn btn-outline-success btn-sm">Edit</a>
                                    @if($role->deletable==true)
                                        <a href="{{route('app.role.delete',$role->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                                        {{--
                                        <button id="deleteButton" onclick="myFung({{$role->id}})" class="btn btn-outline-danger btn-sm" type="button">Delete</button>--}}
                                        {{--                                        <form id="delete-form-{{$role->id}}" methoe="POST" action="{{route('app.role.delete',$role->id)}}" style="display: none;">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                        </form>--}}
                                    @endif
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
    <script>
        $(document).ready(function (){
            // $('table.display').DataTable();
            $('#deleteRole').on('click',function (res){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // console.log(res)
                        $('#delete-form-'+res).submit();
                    }
                });
            });
        })


    </script>
@endpush
