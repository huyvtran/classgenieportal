$(document).ready(function (){
    $('#btnSubmit').click(function (){
        loader.block = '#frm_testing';
        ajaxloader.loadURL("testing",$('#frm_testing').serializeArray(),function (msg){
			  $('#respMsg').html(msg['txtInput']);
		});
    });
    $('#btnSubmit1').click(function (){
        ajaxloader.load("testing/1", function(msg, cparams){
	        $('#respMsg').html(msg);
	        //fclog(cparams);
	    },'123');
    });
});