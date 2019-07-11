<?php $__env->startSection('content'); ?>

<div class="row">
<br />
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add skill image &nbsp; &nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/skill')?>">View List</a></div>
            <div class="panel-body" >

                <?php echo Form::model($edit,['method' => 'PATCH','route'=>['imagemanagement.skill.update',$edit->id], 'class'=> 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'classimg_create', 'id'=>'classimg_create']); ?>

                <?php echo csrf_field(); ?>


                <div class="form-group<?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Image</label>
                    <div class="col-md-7">
                        <input type="file" class="form-control" name="image1" value="<?php echo e(old('image')); ?>">
                        <input type="hidden" class="form-control" name="image" value="<?php echo $edit->image;?>">
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
                        <input type="text" class="form-control" name="title" value="<?php echo $edit->title;?>">
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
                        <input type="text" class="form-control" name="order" value="<?php echo $edit->order;?>">
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

                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>