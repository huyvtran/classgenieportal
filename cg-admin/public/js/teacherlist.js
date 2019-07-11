var items_per_page,num_display_entries,items_per_page,num_entries,start=0;
//  $(document).ready(function(){
// var school_name = '';
// 	loaddata(school_name);
// $('#btnSearch').on('click',function(){
// var school_name = $('#school_name').val();
// loaddata(school_name);
// });
// $('#school_name').blur(function(){
// var school_name = $('#school_name').val();
//    loaddata(school_name);
// });
// });

$(document).ready(function(){
     items_per_page = $('#items_per_page').val();
	 num_display_entries = $('#num_display_entries').val();   
	 loaddata(0,items_per_page,'ready');

	 $('#btnSearchSchool').on('click',function(){

	  var school_name = $('#school_name').val();
	  	loaddata(0,items_per_page,'ready',school_name);  
       //loadSearchdata(school_name);
       });
       
       	 
    });

function loaddata(start,per_page,event_type,school_name){

	   ajaxloader.type = "POST";       
	   ajaxloader.load("teacherlist/list", function(msg, cparams){
	        
              var resp_data = msg.split('~');
              num_entries = resp_data[0];
              $("#Datatable").html(resp_data[1]);
		      if(event_type == 'ready'){
		      	   	  initPagination();
      				}		       	    
		       },null,{'start':start,'school_name':school_name, 'per_page':per_page, 'sort_by':$('#sort').val()});
			} 

function pageselectCallback(page_index, jq, event_type){
      	start = page_index*items_per_page
      	if(typeof event_type == 'undefined')
       		loaddata(start,items_per_page,event_type)
    	return false;
  }

  function initPagination() {

  	$("#Pagination").pagination(num_entries, {
		num_display_entries: num_display_entries,
		items_per_page:items_per_page,
		callback: pageselectCallback
	});
 }


function update_teacher_status(email,id){
		ajaxloader.type = "POST";       
	    ajaxloader.load("update_teacher_status/"+id, function(msg, cparams){	   	
      		 $('#ttt').fadeOut(10);
	 		 $('#ttt').removeClass('blur-in');
	 		 $('#ttt').addClass('blur-out');   
       	 },null,{'id':id});
         	 $('div').remove('.modal-backdrop');
         	 location.reload(); 
         	 setTimeout(function() { sendmail(email); }, 300);

    }
function close_div(){
				$('#ttt').fadeOut(10);
	 		 	$('#ttt').removeClass('blur-in');
	 		 	$('#ttt').addClass('blur-out');   
	 		 	$('div').remove('.modal-backdrop');

	 		 	loaddata(0,items_per_page,'ready');
}
function sendmail(email){
	   	ajaxloader.type = "POST";       
	   	ajaxloader.load("sendmail/"+email, function(msg, cparams){
				 loaddata(0,items_per_page,'ready');
   		  		 }
     ,null,{'email':email});  	   
	}
function getApproved(id){ 
	
	 	ajaxloader.type = "POST";       
	   	ajaxloader.load("update_status/"+id, function(msg, cparams){
	   		email = JSON.stringify(msg);
       		$(".modal-content").html("Are you sure you want to approve this teacher?"+'   &nbsp;&nbsp;    '+'<button class="btn btn-primary" onclick=update_teacher_status('+email+','+id+');>Yes</button>'+'   &nbsp;      '+'<button class="btn btn-danger" onclick=close_div();>No</button>');      		
   			 }
     ,null,{'id':id});       
 		$('#ttt').removeClass("modal fade");	
 		$('#ttt').addClass("modal fade bs-example-modal-lg"+' ' + id);
 		$('.modal-content').attr('id', id);
  	}

  	function getDelete(id){
      
  		ajaxloader.type = "POST";       
	   	ajaxloader.load("delete_status/"+id, function(msg, cparams){
	   		email = JSON.stringify(msg);

	   		$(".modal-content").html("Are you sure you want to delete the teacher?"+'   &nbsp;&nbsp;    '+'<button class="btn btn-primary" onclick=delete_teacher_status('+email+','+id+');>Yes</button>'+'   &nbsp;      '+'<button class="btn btn-danger" onclick=close_div();>No</button>');      		
   			 }
     ,null,{'id':id});       
 		$('#ttt').removeClass("modal fade");	
 		$('#ttt').addClass("modal fade bs-example-modal-lg"+' ' + id);
 		$('.modal-content').attr('id', id);
  	}

  	function delete_teacher_status(email,id){
        ajaxloader.type = "POST";       
	    ajaxloader.load("delete_teacher_status/"+id, function(msg, cparams){	 
	       	 $('#ttt').fadeOut(10);
	 		 $('#ttt').removeClass('blur-in');
	 		 $('#ttt').addClass('blur-out');   
       	 },null,{'id':id});
         	 $('div').remove('.modal-backdrop');
         	 
         	loaddata(0,items_per_page,'ready');    

         	setTimeout(function() { sendmaildelete(email); }, 300);

}

function sendmaildelete(email){

		ajaxloader.type = "POST";       
	   	ajaxloader.load("sendmaildelete/"+email, function(msg, cparams){
				 loaddata(0,items_per_page,'ready');
   		  		
   			 }
     ,null,{'email':email});  	   
	}

	
