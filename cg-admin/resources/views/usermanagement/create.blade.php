@extends('layouts.dashboard')
@section('content')
    <div class="row">
    <br />
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><span style="font-size:15px;">Add Admin User &nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/usermanagement')?>">View List</a></div>
                <div class="panel-body">
                    <form class="form-horizontal" name="user_create" id="user_create" role="form" method="POST" action="{{ url('/usermanagement') }}">
                        {!! csrf_field() !!}
                        
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label">User Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                       <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">

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
                                <input type="text" class="form-control" name="fname" value="{{ old('fname') }}">

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
                                <input type="text" class="form-control" name="lname" value="{{ old('lname') }}">

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
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">

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
                                  <option value="<?php echo $value->id;?>"><?php echo $value->role_name?></option>
                                 <?php }?>
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
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
