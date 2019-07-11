@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
       <div class="col-md-12">
         <div class="col-md-5">
           <input type="text" id="school_name" placeholder="Search By School Name" class="myText form-control">
         </div>
        <div class= "col-md-3">
           <button id="btnSearch" class="btn btn-success search_btn search_btn-add" type="button"><b><strong>Search</strong></b></button>
        </div>
      </div>
          &nbsp; &nbsp; &nbsp;
      </div>
      <div class="panel-body">
        {!! csrf_field() !!}
        <div class="col-md-12">
          @if(Session::has('message'))
          <div class="alert alert-success" style="text-align:center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>
          </div>
          @endif
        </div>        
        <div class="row col-md-10  col-lg-offset-1" id ="res_data">       
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
{!!Html::script('/public/js/teacherstatus.js')!!}
@endsection
