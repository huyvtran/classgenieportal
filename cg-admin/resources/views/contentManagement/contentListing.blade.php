@extends('layouts.dashboard')
@section('content')
       <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">            
                <div class="panel-heading">  <span style="font-size:15px;">Content Management&nbsp;&nbsp;</span><button type="button" class="btn btn-success search_btn-add"onclick="editContent(this.id)" id="new"><b><strong>Add New</strong></b></button></div>
                <div class="panel-body">
                <div class="col-md-12">
                    @if(Session::has('message'))
                     <div class="alert alert-success" style="text-align:center;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong> {{ Session::get('message') }}</strong>
                     </div>
                    @endif
                </div>
                <div class="row">
                  <div id="datatable" class="col-md-12"></div>
                </div>
                </div>
            </div>
        </div>
      </div>
      <br style="clear:both;" />
  
@endsection
@section('footer')
@endsection
<script type="text/javascript">
 window.onload = function(e) {   
   getdata();
  }
  function editContent(id)
 {
    if(id == 'new')
       {
          window.location.href= "contentlist/"+id;
       }
   else
      {      
        var t = $('#'+id).children('td:first').text();
        window.location.href ="contentlist/"+id;
      }
 }

function deleteContent(id)
{
  var name = $('#'+id).find('td:eq(2)').text();
  var r = confirm(name+' '+"content will we deleted!");
  if (r == true)
  {
      window.location =Siteurl+"/deleteContent/"+id;
  }
}
</script>




