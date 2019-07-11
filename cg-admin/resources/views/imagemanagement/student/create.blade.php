@extends('layouts.dashboard')
@section('content')
<div class="row">
<br />
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add Student Image &nbsp; &nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/student')?>">View List</a></div>
            <div class="panel-body">
                <form class="form-horizontal" name="classimg_create" id="classimg_create" role="form" method="POST" action="{{ url('/imagemanagement/student') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Image </label>
                        <div class="col-md-7">
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Title</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Order</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="order" value="{{ old('order') }}">
                            @if ($errors->has('order'))
                            <span class="help-block">
                                <strong>{{ $errors->first('order') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-refresh"></i>save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
