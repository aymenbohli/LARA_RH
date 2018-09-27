@extends('layouts.app')

@section('content')
<div class="panel-body">
    <div class="panel-body">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">User Management</h3>
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
                            <th>Email</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $key => $user)

                        <tr class="list-users">
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->roles))
                                @foreach($user->roles as $role)
                                <label class="label label-success">{{ $role->display_name }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                <form action="{{ url('admin/users/'.$user->id) }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('users.create') }}" class="btn btn-success">New User</a>
            </div>
        </div>
    </div>
</div>
@endsection