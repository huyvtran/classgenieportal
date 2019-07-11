@extends('layouts.dashboard')
{!!Html::style('editor/editor_gecko.css')!!}
{!!Html::script('editor/ckeditor.js')!!}
@section('content')    
     <div class="row">
     <br />
        <div class="col-md-10 col-lg-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">Email Content&nbsp;&nbsp;<a class="btn btn-success search_btn-add" href="<?php echo url('/emaillist')?>">View Content List</a></div> <div class="panel-body">
              <?php 
               if(isset($item))
               { ?>     
            <form id="ckformforemailupdate" action="{{ url('emailcontent/save') }}" method="POST">
               {!! csrf_field() !!}    
            <div class="form-group">
              <label class="form-horizontal control-label">Type</label><input type="text" class="form-control"  name="type12" value="<?php echo $item['type'];?>" placeholder="" id="type12"></input>          
            <label class="form-horizontal control-label">From Email</label><input type="text" class="form-control"  name="from_email" placeholder="" value="<?php echo $item['from_email'];?>" id="from_email"></input>          
            <label class="form-horizontal control-label">Subject</label><input type="text" class="form-control"  value="<?php echo $item['subject'];?>" name="subject" placeholder="" id="subject"></input>
            </div>
              <label class="form-horizontal control-label">Body</label>
           
            <textarea name="editor1" id="editor1" rows="10" cols="80" value="">
              {{$item['body']}} 
            </textarea><br>

             <label class="form-horizontal control-label">Feature</label>
           
             <textarea name="editor2" id="editor2" rows="10" cols="80" value="">
             <?php echo $item['feature'];?>
            </textarea><br><br>

              <label class="form-horizontal control-label">Status</label>&nbsp;&nbsp;
              <input type="radio" name="status" value="1" checked>Active&nbsp;
              <input type="radio" name="status" value="0">In Active<br>                
              <input type="hidden"  id="cont_id" name="id"  value="<?php echo $item['id'];?>"></input>

            <script>
                CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor2' );               
            </script>
           <button type="submit" class="btn btn-primary">Submit</button><br><br>     
        </form>
     <?php }else{ ?>
         <form class="conten" id="ckformforemailsave" action="{{ url('emailcontent/save') }}" method="POST">
        {!! csrf_field() !!}
    
        <div class="form-group">
          <label class="form-horizontal control-label">Type</label><input type="text" class="form-control"  name="type12" value=""placeholder="" id="type12"></input>
          
             <br><label class="form-horizontal control-label">From Email</label><input type="text" class="form-control"  name="from_email" placeholder="" value="" id="from_email"></input>
          
             <br><label class="form-horizontal control-label">Subject</label><input type="text" class="form-control"  value="" name="subject" placeholder="" id="subject"></input>
        
              </div>
              <label class="form-horizontal control-label">Body</label>
           
            <textarea name="editor1" id="editor1" rows="10" cols="80">
             
            </textarea><br>
             <label class="form-horizontal control-label">Feature</label>
           
             <textarea name="editor2" id="editor2" rows="10" cols="80">
             
            </textarea><br><br>
              <input type="hidden" value="1" name="status" id="status"></input>
              <input type="hidden" value="" id="cont_id" name="id"></input>
            <script>
                CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor2' );               
            </script>

           <button type="submit" class="btn btn-primary">Submit</button><br><br>
     
      </form>
    </div>
   </div>
</div>
<?php } ?>
@endsection      
@section('footer')
{!!Html::script('editor/styles.js')!!}
{!!Html::script('js/email-content.js')!!}
{!!Html::script('editor/config.js')!!}
@endsection