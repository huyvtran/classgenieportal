<?php $__env->startSection('content'); ?>

<div class="row">
<br />
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style=" font-size:15px;">Add Customize Skills &nbsp; &nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/imagemanagement/customizeskill')?>">View List</a></div>
            <div class="panel-body" >

                <?php echo Form::model($edit,['method' => 'PATCH','route'=>['imagemanagement.customizeskill.update',$edit->id], 'class'=> 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'customizeskill_create', 'id'=>'customizeskill_create']); ?>

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
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="name" value="<?php echo $edit->name;?>">
                        <?php if($errors->has('name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('pointweight') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Pointweight</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="pointweight" value="<?php echo $edit->pointweight;?>">
                        <?php if($errors->has('pointweight')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('pointweight')); ?></strong>
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