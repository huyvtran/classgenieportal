@extends('layouts.dashboard')
@section('content')
<?php 
$url  = base_path().'/public/json/rolemang.json';
$data = file_get_contents($url);
$data = json_decode($data,true);
$size = sizeof($data);
?>
    <div class="row">
    <br />
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><span style="font-size:15px;">Add Admin User &nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/usermanagement')?>">View List</a></div>
                <div class="panel-body" >
                  
                {!! Form::model($edit,['method' => 'PATCH','route'=>['usermanagement.update',$edit->id], 'class'=> 'form-horizontal', 'name'=> 'user_edit', 'id'=>'user_edit']) !!}
                {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <label class="col-md-3 control-label">User Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="username" value="<?php echo $edit->username?>">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label-new">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password" value="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label">First Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="fname" value="<?php echo $edit->fname?>">

                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label-new">Last Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="lname" value="<?php echo $edit->lname?>">

                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" value="<?php echo $edit->email ?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Role</label>
                              
                            <div class="col-md-7">
                              <select class="form-control col-md-3" name="role">
                              <option  value="">Select User Role</option>
                                 <?php foreach ($rolemang as $value){?>
                                  <option value="<?php echo $value->id;?>" <?php if($value->id == $edit->role_id ){ ?> selected <?php } ?>><?php echo $value->role_name?></option>
                                <?php } ?>
                              </select>
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
