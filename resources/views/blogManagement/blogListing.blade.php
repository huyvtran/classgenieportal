@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"><span style="font-size:15px;">Blog Management&nbsp;&nbsp;</span> <a class="btn btn-success search_btn-add" href="<?php echo url('/blog/create')?>">Add Blog</a></div>
      <div class="panel-body">
        {!! csrf_field() !!}
        <div class="col-md-12">
          @if(Session::has('message'))
          <div class="alert alert-success" style="text-align:center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> {{ Session::get('message') }}</strong>
          </div>
          @endif
        </div>        
         <div class="row col-md-16  col-lg-offset" id ="res_data"> 
         </div>      
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
{!!Html::script('/public/js/bloglist.js')!!}
@endsection
