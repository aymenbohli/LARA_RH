@extends('layouts.app')

@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Role</h3>
    </div>
    <div class="box-body">
        <!-- Display Validation Errors -->
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form class="form-horizontal" role="form" method="POST"
              action="{{ url('admin/Permissions/'.$Permissions->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Display Name</label>

                <div class="col-md-6">
                    <input id="display_name" type="text" class="form-control" name="display_name"
                           value="{{$Permissions->display_name}}"
                           required autofocus>

                    @if ($errors->has('display_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('display_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    <textarea rows="4" cols="50" name="description" id="description"
                              class="form-control">{{$Permissions->description}}</textarea>

                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                    <a class="btn btn-link" href="{{ url('admin/Permissions') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
