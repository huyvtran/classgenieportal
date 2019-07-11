<?php echo Html::style('editor/editor_gecko.css'); ?>

<?php echo Html::script('editor/ckeditor.js'); ?>

     <div class="row">
        <div class="col-md-4 col-lg-offset-3">
            <div class="panel panel-default">
            <div class="panel-heading">Email Content&nbsp;&nbsp;</div></div></div>
    <form class="conten" id="ckform" action="<?php echo e(url('EmailContent/save')); ?>" method="POST">
        <?php echo csrf_field(); ?>

    
        <div class="form-group"><br><br><br>
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
              <input type="hidden" value="1" name"status" id="status"></input>
              <input type="hidden" value="" id="cont_id" name="id"></input>
            <script>
                CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor2' );
               
            </script><br><br>

           <button type="submit" class="btn btn-primary">Submit</button>
     
    </form>
<?php $__env->startSection('footer'); ?>
<?php echo Html::script('editor/styles.js'); ?>

<?php echo Html::script('js/edit-content.js'); ?>

<?php echo Html::script('editor/config.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>