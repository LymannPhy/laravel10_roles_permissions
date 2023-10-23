@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper" style="min-height: 1604.44px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles Page</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                    
                        <div class="pull-right">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <section class="content mx-2">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </table>
                
                
                    {!! $roles->render() !!}
                </div>

                <div class="card-footer">
                    Footer
                </div>

            </div>

        </section>

    </div>

    


   


 


@endsection
