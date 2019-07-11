@extends('layouts.dashboard')
@section('content')
<?php 
$url  = base_path().'/public/json/adminmodules.json';
$data = file_get_contents($url);
$data = json_decode($data,true);
$size = sizeof($data);
?>
    <div class="row">
    <br />
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"> <span style="font-size:15px;">Add Admin Role &nbsp; &nbsp; </span><a class="btn btn-success search_btn-add" href="<?php echo url('/rolemanagement')?>">View List</a></div>
                <div class="panel-body" >
                  
                {!! Form::model($edit,['method' => 'PATCH','route'=>['rolemanagement.update',$edit->id], 'class'=> 'form-horizontal', 'name'=> 'staffmang_create', 'id'=>'staffmang_create']) !!}
                        {!! csrf_field() !!}
                        
                <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label">Role Name </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="role_name" value="<?php echo $edit->role_name;?>">

                                @if ($errors->has('role_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                </div>

                    <?php $list = $edit->module_list;  
                          $listvalue = explode(',', $list);
                     ?>    

                    <div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Module List</label>
                        <?php foreach ($data as $key => $value){ ?>
                            <div class="col-md-3">
                                <input type="checkbox" name="module[]" value="<?php echo $key?>" <?php if (in_array($key,$listvalue)){?>checked <?php }?>> <?php echo $value['name']?>
                            </div>
                        <?php }?>                            
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
