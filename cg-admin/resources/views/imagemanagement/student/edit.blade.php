@extends('layouts.dashboard')
@section('content')
<div class="row">
<BR />
    <div class="col-md-10 col-lg-offset-1">
    
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add Student image &nbsp; &nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/student')?>">View List</a></div>
            <div class="panel-body" >

                {!! Form::model($edit,['method' => 'PATCH','route'=>['imagemanagement.student.update',$edit->id], 'class'=> 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'classimg_create', 'id'=>'classimg_create']) !!}
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Image</label>
                    <div class="col-md-7">
                        <input type="file" class="form-control" name="image1" value="{{ old('image') }}">
                        <input type="hidden" class="form-control" name="image" value="<?php echo $edit->image;?>">
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
                        <input type="text" class="form-control" name="title" value="<?php echo $edit->title;?>">
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
                        <input type="text" class="form-control" name="order" value="<?php echo $edit->order;?>">
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

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
