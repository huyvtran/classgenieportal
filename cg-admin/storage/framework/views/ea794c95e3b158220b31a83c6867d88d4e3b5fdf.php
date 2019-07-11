<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading"><span style="font-size:15px;">Admin Image Magement &nbsp; &nbsp;</span> <a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/class/create')?>">Add Class Image</a></div>
      <div class="panel-body">
        <?php echo csrf_field(); ?>

        <div class="col-md-12">
          <?php if(Session::has('message')): ?>
          <div class="alert alert-success" style="text-align:center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong> <?php echo e(Session::get('message')); ?></strong>
          </div>
          <?php endif; ?>
        </div>
        <div class="row">
        <div class="col-md-12">
          <table class="table table-striped">
            <thead>
              <?php   if(count($imagemang) > 0){?>
              <tr>
                <th>S.NO</th>
                <th>Title</th>
                <th>Image</th>
                <th>Order</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php  
              $i = 1; 
              foreach($imagemang as $row)
              {
                ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $row->title?></td>
                  <td><?php if($row->status == 1){?><img src="<?php echo url('/').'/public/assets/class/'.$row->image;?>" width="100px" height="100px"><?php }else{ ?><img src="<?php echo url('/').'/public/assets/image/'.'no_image.jpg'?>" width="100px" height="100px"><?php } ?></td>
                  <td><?php echo $row->order?></td>
                  <td><?php if($row->status == 1){?><img src="<?php echo url('/').'/images/activepage.gif';?>"><?php }else{ ?><img src="<?php echo url('/').'/images/inactivepage.gif'?>"><?php } ?></td>
                  <td>
                    <span class="col-md-1">
                      <a href="<?php echo url('/imagemanagement/class/'.$row->id.'/edit') ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                    </span><span class="col-md-1">
                    <?php if($row->status == 1){?>
                    <?php echo e(Form::open(array('route' => array('imagemanagement.class.destroy', $row->id), 'method' => 'delete'))); ?>

                    <button type="submit" ><i class="glyphicon glyphicon-trash"></i></button>
                    <?php echo e(Form::close()); ?>

                    <?php }else{ ?> <button type="submit" disabled><i class="glyphicon glyphicon-trash"></i></button><?php } ?>
                    <?php echo e(Form::close()); ?>

                  </span>
                </tr>
                <?php $i++;} ?>
                <?php }else{ ?>
                <tr><td style="background-color: #ddd; text-align: center; font-weight: bold;">Record Not Found</td></tr>
                <?php } ?>
              </tbody>
            </table></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>