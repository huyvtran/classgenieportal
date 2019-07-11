@extends('layouts.app')
@section('content') 
<div>
<div class="container">
    <div class="row wrapper">
        <div class="col-md-6 col-md-offset-3">
        <div class="logo_image"><img src="<?php echo url('/').'/public/images/logo-new.png'?>" alt="logo"></div>
            <div class="panel panel-default">
              <div class="panel-heading login_header">Classgenie Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" name="loginForm" id="loginForm" method="POST" action="">
                        {!! csrf_field() !!}
                        <div class="col-md-12">
                          @if(Session::has('message'))
                           <div class="alert alert-danger" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ Session::get('message') }}</strong>
                          </div>
                          @endif
                        </div>  
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">     
                            <div class="col-md-12 login-input">
                            <span class="glyphicon glyphicon-user glyphiconLinkColor"></span>
                           
                                <input type="text" class="form-control new_form" name="email" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                            <div class="col-md-12 login-input">
                            <span class="glyphicon glyphicon-lock glyphiconLinkColor"></span>
                                <input type="password" class="form-control new_form" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; } ?>">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn col-md-12 col-xs-12 login_submit">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>       
    </div>
</div>
</div>

@endsection
