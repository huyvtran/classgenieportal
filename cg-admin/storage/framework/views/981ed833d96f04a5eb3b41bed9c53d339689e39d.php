<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Student Image &nbsp;<a class="btn btn-success" href="<?php echo url('/imagemanagement/student')?>">View List</a></div>
                <div class="panel-body">
                    <form class="form-horizontal" name="classimg_create" id="classimg_create" role="form" method="POST" action="<?php echo e(url('/imagemanagement/student')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        
                <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">Image </label>
                            <div class="col-md-7">
                                <input type="file" class="form-control" name="image" value="<?php echo e(old('image')); ?>">
                                <?php if($errors->has('image')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                    <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Title</label>
                              
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>">
                                 <?php if($errors->has('title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('order') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Order</label>
                              
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="order" value="<?php echo e(old('order')); ?>">
                                 <?php if($errors->has('order')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('order')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>
                  
                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i>save
                                </button>

                            </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>