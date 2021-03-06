@extends('layouts.app')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">New permession</h3>
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

        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/permissions') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                           required autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                <label for="display_name" class="col-md-4 control-label">Display Name:</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}"
                           required autofocus>

                    @if ($errors->has('display_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('display_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    <textarea rows="4" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>

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
                        Save
                    </button>

                    <a class="btn btn-link" href="{{ url('permissions/index') }}">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection