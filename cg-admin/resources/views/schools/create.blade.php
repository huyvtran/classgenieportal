@extends('layouts.dashboard')
@section('content')
<div class="row">
</br>
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add Schools &nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/schools')?>">View List</a></div>
            <div class="panel-body">
                <form class="form-horizontal" name="schools_create" id="schools_create" role="form" method="POST" action="{{ url('/schools') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('school_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">School Name</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="school_name" value="{{ old('school_name') }}">
                            @if ($errors->has('school_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('school_name') }}</strong>
                            </span>
                             @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">State</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="state" value="{{ old('state') }}">
                            @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Country</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="country" value="{{ old('country') }}">
                            @if ($errors->has('country'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Pin Code</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="pincode" value="{{ old('pincode') }}">
                            @if ($errors->has('pincode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pincode') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('web_url') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label-new">Web URL</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="web_url" value="{{ old('web_url') }}">
                            @if ($errors->has('web_url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('web_url') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Email Id</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="email_id" value="{{ old('email_id') }}">
                            @if ($errors->has('email_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
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
