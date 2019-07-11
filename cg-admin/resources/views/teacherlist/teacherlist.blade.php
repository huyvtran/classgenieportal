@extends('layouts.dashboard')
@section('header')
{!!Html::style('css/pagination.css') !!}
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">     
      <div class="col-md-12">        
        <div class="col-md-5">
           <input type="text" id="school_name" placeholder="Search By School Name" class="myText form-control">
        </div>
         <div class="col-xs-4">
        <button id="btnSearchSchool" class="btn btn-success search_btn search_btn-add" type="button"><b><strong>Search</strong></b></button>
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
         <div class="row" style="margin-top:20px;">
            <div id="loading" style="text-align:center;width:200px;"></div>
              <div id="Datatable" class="col-md-12" ></div>
              <div id="Pagination" style="text-align:center;" ></div>
                <input type="hidden" value="<?php echo PAGE_SIZE; ?>" name="items_per_page" id="items_per_page">
                <input type="hidden" value="<?php echo NUM_DISPLAY_ENTRIES; ?>" name="num_display_entries" id="num_display_entries">
                <input type="hidden" value="Prev" name="prev_text" id="prev_text">
                <input type="hidden" value="Next" name="next_text" id="next_text">   
                <input type="hidden" id="sort" value="D" >
                {!! csrf_field() !!}
         </div>

      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
{!!Html::script('/public/js/teacherlist.js')!!}
{!!Html::script('/public/js/jquery.pagination.js')!!}
@endsection
