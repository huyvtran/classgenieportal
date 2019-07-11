@extends('layouts.dashboard')
@section('content')
<?php 
$url  = base_path().'/public/json/language.json';
$data = file_get_contents($url);
$data = json_decode($data,true);
$size = sizeof($data);
?> 
<div class="row">
<br /><br />
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading">MENU</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" name="Language_form" id="Language_form" action="{{ url('/language') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                          @if(Session::has('message'))
                           <div class="alert alert-danger" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> {{ Session::get('message') }}</strong>
                           </div>
                          @endif
                        </div>
                        <div class="row form-group">
                          <div class="col-md-3">
                            <label class="control-label">Language:</label>
                          </div>
                              <div class="col-md-5">
                                <select name="Language" id="Language" class="form-control">
                                   <option value="">Select</option>
                                     <option value="english" selected="">English</option>
                                       <option value="malay">Malay</option>
                                </select>
                              </div> 
                                   @if ($errors->has('Language'))
                                     <span class="help-block">
                                        <strong>{{ $errors->first('Language') }}</strong>
                                     </span>
                                   @endif
                        </div>
                        <div id="LangDiv" class="row form-group"></div>
                           <?php foreach($data as $key => $value)
                                 { 
                                  if($key == "english")
                                    {
                                     foreach($value as $key1 =>$value1){
                           ?>
                          <div class="row form-group engdiv">
                            <div class="col-md-3">
                               <label class="control-label"><?php echo $key1?>:</label>    
                            </div>
                              <div class="col-md-5">
                                 <input class="form-control" type="text" name="language[]" value="<?php
                                 echo $value1;?>">
                              </div>
                          </div>
                          <?php }} }?> 
                          <a href="#collapse1" class="nav-toggle">Add Menu</a>
                          <div class="row form-group" id="collapse1" style="display: none;">
                             <label  class="control-label">
                              <input  type="text" name="menu_label" id="menu_label" value="" placeholder="please enter menu Label" >&nbsp;&nbsp;&nbsp;<input type="text" name="menu_key" id="menu_key" value="" placeholder="please enter menu name"></label>
                              @if ($errors->has('menu_label'))
                              <span class="help-block">
                                    <strong>{{ $errors->first('menu_label') }}</strong>
                              </span>
                              @endif
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i>update
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
{!!Html::script('/public/js/languagechange.js')!!}
@endsection

    