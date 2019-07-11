<?php echo Html::script('/public/js/jquery-2.2.3.min.js'); ?>

<?php echo Html::script('bootstrap/js/bootstrap.min.js'); ?>

<?php echo Html::script('/public/js/jquery.validate.min.js'); ?>

<?php echo Html::script('/public/js/validation.js'); ?>

<?php echo Html::script('/public/js/loader.js'); ?>

<?php echo Html::script('/public/js/ajaxloader.js'); ?>

<?php echo Html::script('/public/js/edit-content.js'); ?>

<?php echo Html::script('dist/js/app.min.js'); ?>


<!-- Side bar -->

	<script type="text/javascript">
    sidemenu = function(id)
        { 
          try{            
           $( "li" ).each(function() {
             $( this ).removeClass( "active" );
             });              
              var url = window.location.pathname;
              var pathArray = url.split( '/' );
              var env = $('#env').val()
              if(env != 'local')
              {
               var lastSegment = pathArray[1];
               if($('#'+'id_'+lastSegment+'\\/'+pathArray[2]).length>0)
               {
                 var lastSegment = lastSegment+'\\/'+pathArray[2];
               }else{
                var lastSegment = pathArray[1];
               }
              }else{
               var lastSegment = pathArray[3];
               if($('#'+'id_'+lastSegment+'\\/'+pathArray[4]).length>0)
               {
                 var lastSegment = lastSegment+'\\/'+pathArray[4];
               }else{
                var lastSegment = pathArray[3];
              }
            }               
            $('#' +'id_' +lastSegment).addClass("active"); 
            if($('#'+'id_'+lastSegment).parent().parent().attr('Class') == 'treeview parent')
            {
              $('#'+'id_'+lastSegment).parent().css({'display':'block'});
              $('#'+'id_'+lastSegment).parent().parent().addClass("active");
              $('#'+'id_'+lastSegment).child().css({"color":"#fff !important" });
              $('#'+'id_'+lastSegment).parent().addClass('treeview');
            }
            if(lastSegment == 'home')
            {
               $('#home').addClass("active");
            }
          }
         catch(ex){}
        }

  $(document).ready(function(){
     sidemenu();  
  });
  </script> 