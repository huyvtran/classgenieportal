@extends('layouts.dashboard')
@section('content')
 <div class="row">
 <br /><br />
        <div class="col-md-8 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Change password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" id="change_password" name="change_password" action="{{ url('/change_password') }}">
                        {!! csrf_field() !!}
                        <div class="col-md-12">
                          @if(Session::has('message'))
                           <div class="alert alert-success" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ Session::get('message') }}</strong>
                          </div>
                          @endif
                        </div>
                        <div class="form-group{{ $errors->has('Password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password
                            </label>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="Password" value="{{ old('Password') }}">
                                @if ($errors->has('Password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('New_password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">New Password
                            </label>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="New_password">
                                @if ($errors->has('New_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('New_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Conf_password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="Conf_password">

                                @if ($errors->has('Conf_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Conf_password') }}</strong>
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
@section('footer')
{!!Html::script('/js/changepassword.js')!!}
@endsection