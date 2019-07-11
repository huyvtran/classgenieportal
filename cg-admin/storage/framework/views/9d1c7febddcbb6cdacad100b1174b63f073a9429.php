<?php $__env->startSection('content'); ?>
       <div class="row">
        <div class="col-md-11 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Content Management&nbsp;&nbsp;<button type="button" class="btn btn-success"onclick="editContent(this.id)" id="new"><b><strong>Add New</strong></b></button></div>
                <div class="panel-body">
                <div class="col-md-12">
                          <?php if(Session::has('message')): ?>
                           <div class="alert alert-success" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?php echo e(Session::get('message')); ?></strong>
                           </div>
                          <?php endif; ?>
                      </div>
                      <div class="row">
   <?php 
       if(isset($data))
       {  $i = 1;?> 
    	 <table class="table table-striped"><thead><tr><th>Sr No.</th><th>Page Name</th><th>Page Title</th><th>Page Url</th><th>Edit</th><th>Delete</th></tr></thead>
    	 <?php
        foreach ($data as $key => $value) {
         
        ?>
        <tr id="<?php echo $value['id']?>"><td class="page" style="display:none"><?php echo $value['id']?></td>
        <td><?php echo $i; ?></td>
    	  <td><?php echo $value['page_name']?></td>
    	  <td><?php echo $value['title']?></td>
    	  <td><?php echo $value['url']?></td>
    	    <td id="<?php echo $value['id']?>" onclick="editContent(this.id)"><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
          <td id="<?php echo $value['id']?>" onclick="deleteContent(this.id)"><button><span class="glyphicon glyphicon-trash"></span></button></td>
          </tr>
          
          <?php $i++; }}else{ ?>
    <div class="alert alert-info" role="alert"><center><b>No Content Found</b></center></div>
       <?php } ?>
       </table>
       </div>
       </div></div></div></div></div>
       </div>
      </div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php echo Html::script('js/edit-content.js'); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>