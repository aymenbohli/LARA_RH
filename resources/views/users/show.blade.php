@extends('layouts.app')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">User info</h3>
    </div>
    <div class="box-body">

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            {{ $user->name }}
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">E-mail</label>
            {{ $user->email }}
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Roles</label>
            @if(!empty($user->roles))
            @foreach($user->roles as $role)
            <label class="label label-success">{{ $role->display_name }}</label>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
