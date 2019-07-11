<?php $__env->startSection('content'); ?>
 <div class="row">
 <br /><br />
        <div class="col-md-8 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Change password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" id="change_password" name="change_password" action="<?php echo e(url('/change_password')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="col-md-12">
                          <?php if(Session::has('message')): ?>
                           <div class="alert alert-success" style="text-align:center;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong> <?php echo e(Session::get('message')); ?></strong>
                          </div>
                          <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('Password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Password
                            </label>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="Password" value="<?php echo e(old('Password')); ?>">
                                <?php if($errors->has('Password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('New_password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">New Password
                            </label>
                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="New_password">
                                <?php if($errors->has('New_password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('New_password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('Conf_password') ? ' has-error' : ''); ?>">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="Password" class="form-control" name="Conf_password">

                                <?php if($errors->has('Conf_password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('Conf_password')); ?></strong>
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
<?php $__env->startSection('footer'); ?>
<?php echo Html::script('/js/changepassword.js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>