@extends('layouts.dashboard')
{!!Html::script('/public/editor/ckeditor.js')!!}
{!!Html::style('/public/editor/editor_gecko.css')!!}
@section('content')
<div class="row"></br>
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add Blog &nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/bloglist')?>">View List</a></div>
            <div class="panel-body" >

                {!! Form::model($edit,['method' => 'PATCH','route'=>['bloglist.update',$edit->id], 'class'=> 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'blog_create', 'id'=>'blog_create']) !!}
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Blog </label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="title" value="<?php echo $edit->title;?>">
                        @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-7">
                        <textarea name="description" id="description" rows="10" cols="80">
                            {{$edit->description}}   
                        </textarea>
                    <script>
                    CKEDITOR.replace( 'description' );
                    </script>
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
