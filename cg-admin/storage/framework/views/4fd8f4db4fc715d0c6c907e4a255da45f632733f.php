
<?php echo Html::script('/js/jquery-1.11.1.min.js'); ?>

<?php echo Html::script('/js/bootstrap.min.js'); ?>

<?php echo Html::script('/js/lumino.glyphs.js'); ?>

<?php echo Html::script('/js/jquery.validate.min.js'); ?>

<?php echo Html::script('/js/validation.js'); ?>

<?php echo Html::script('/js/loader.js'); ?>

<?php echo Html::script('/js/ajaxloader.js'); ?>

<?php echo Html::script('/js/global.js'); ?>


<!-- Side bar -->
	<script type="text/javascript">
	$(document).ready(function(){
		
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		});
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
        try{       
        	  
    			 $( "li" ).each(function() {
             $( this ).removeClass( "active" );
             });
              
              var url = window.location.pathname;
              var pathArray = url.split( '/' );
              var env = $('#env').val()
              if(env != 'local')
              {
               var lastSegment = pathArray[2];
              }
              else
              {
               var lastSegment = pathArray[3];
              }
                
                 $('#' +'id_' +lastSegment).addClass("active"); 
              if($('#'+'id_'+lastSegment).parent().parent().attr('Class') == 'parent')
              {
                 $('#'+'id_'+lastSegment).find('a').addClass('mennew');
                     
                 $('#'+'id_'+lastSegment).parent().addClass('in');
          }
              if(lastSegment == 'home')
          {
                 $('#home').addClass("active");

        }
                
        	
        	
         }
         catch(ex){}
	});
	</script>	