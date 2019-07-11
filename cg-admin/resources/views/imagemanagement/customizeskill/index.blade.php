@extends('layouts.dashboard')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"><span style="font-size:15px;">Admin CustomizeSkill Magement &nbsp; &nbsp;</span> <a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/customizeskill/create')?>">Add Customize Skills</a></div>
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
        <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <?php   if(count($imagemang) > 0){?>
              <tr>
                <th>S.NO</th>
                <th>Skill Name</th>
                <th>Image</th>
                <th>Pointweight</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $i = 1; 
              foreach($imagemang as $row)
              {
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->name?></td>
                  <td><img src="<?php echo url('/').'/public/assets/skill/'.$row->image;?>" width="100px" height="100px"></td>
                  <td><?php echo $row->pointweight?></td>
                  
                  <td>
                    <span class="col-md-1">
                      <a href="<?php echo url('/imagemanagement/customizeskill/'.$row->id.'/edit') ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                    </span><span class="col-md-1">
                   {{ Form::open(array('route' => array('imagemanagement.customizeskill.destroy', $row->id), 'method' => 'delete')) }}
                    <button type="submit" ><i class="glyphicon glyphicon-trash"></i></button>
                    {{ Form::close() }}
                  </span>
                </tr>
                <?php $i++;} ?>
                <?php }else{ ?>
                <tr><td style="background-color: #ddd; text-align: center; font-weight: bold;">Record Not Found</td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div></div>
        </div>
      </div>
    </div>
  </div>
@endsection
