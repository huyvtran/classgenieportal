<?php echo Html::script('/public/editor/ckeditor.js'); ?>

<?php echo Html::style('/public/editor/editor_gecko.css'); ?>

<?php $__env->startSection('content'); ?>
     <div class="row"><br>
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
            <div class="panel-heading my_pannel"><span style="font-size:15px;">Edit Content&nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/contentlist')?>">View Content List</a></div>
            <div class="panel-body">
    <form class="conten" id="ckform" action="<?php echo e(url('contentlist/save')); ?>" method="POST">
        <?php echo csrf_field(); ?>

    
        <div class="form-group">
            <label class="form-horizontal control-label">Page Name</label><input type="text" class="form-control"  name="page_name" value="<?php echo e($data['page_name']); ?>"placeholder="Name" id="pg_name">
          
             <br><label class="form-horizontal control-label">Page Url</label><input type="text" class="form-control"  name="page_url" placeholder="Http://www.example.com" value="<?php echo e($data['url']); ?>" id="pg_url">
          
             <br><label class="form-horizontal control-label">Page Title</label><input type="text" class="form-control"  value="<?php echo e($data['title']); ?>" name="page_title" placeholder="title" id="pg_title">
        
        </div>              
            <label class="form-horizontal control-label">Description</label>             
            <textarea name="editor1" id="editor1" rows="10" cols="80">
             <?php echo e($data['description']); ?>   
            </textarea>          
            <div class="textarea_new">
              <div class="col-md-6 col-xs-12 textarea-box">
                 <label class="form-horizontal">Meta Keywords</label> 
                 <textarea name = "text1" id="key" rows="6" cols="60" class="textarea-text">
                     <?php echo e($data['metakey']); ?>

                 </textarea>
              </div>          
            <div class="col-md-6 col-xs-12 textarea-box">
                <label class="form-horizontal">Meta Description</label> 
              <textarea name = "text2" id="desc" rows="6" cols="60" class="textarea-text">
                <?php echo e($data['metadesc']); ?>

              </textarea>
            </div>
            </div>
                 <input type="hidden" value="<?php echo e($data['id']); ?>" id="cont_id" name="id"></input>
            <script>
                CKEDITOR.replace( 'editor1' );               
            </script><br />
            <center>
               <button type="submit" class="btn btn-primary submit-new">Submit</button>
            </center>     
      </form>
    </div>
<?php $__env->stopSection(); ?>        
<?php $__env->startSection('footer'); ?>
<?php echo Html::script('/public/editor/styles.js'); ?>

<?php echo Html::script('/public/editor/config.js'); ?>

<?php $__env->stopSection(); ?>
<script type="text/javascript">
  window.onload = function(e) {               
    document.getElementById('key').innerHTML = document.getElementById('key').innerHTML.trim();
    document.getElementById('desc').innerHTML = document.getElementById('desc').innerHTML.trim(); };
</script>
  
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>