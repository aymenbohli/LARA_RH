@extends('layouts.app')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">permissions Management</h3>
    </div>
    <div class="box-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Permissions as $key => $Permissions)

                <tr class="list-users">
                    <td>{{ ++$i }}</td>
                    <td>{{ $Permissions->display_name }}</td>
                    <td>{{ $Permissions->description }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('permissions.show',$Permissions->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('permissions.edit',$Permissions->id) }}">Edit</a>

                        <form action="{{ url('admin/Permissions/'.$Permissions->id) }}" method="POST" style="display: inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $Permissions->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('permissions.create') }}" class="btn btn-success">New Permissions</a>
    </div>
</div>
@endsection