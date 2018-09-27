@extends('layouts.app')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Role Info</h3>
    </div>
    <div class="box-body">

        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Name</label>
            {{ $role->display_name }}
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Description</label>
            {{ $role->description }}
        </div>
        <div class="form-group">
            <label for="name" class="col-md-4 control-label">Permissions</label>
            @if(!empty($permissions))
            <div class="col-md-8 control-label">
                @foreach($permissions as $permission)
                <label class="label label-success" style="float: left; margin-right: 5px">{{ $permission->display_name }}</label>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection