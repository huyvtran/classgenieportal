<?php $__env->startSection('content'); ?>
<div class="row"></br>
    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><span style="font-size:15px;">Add Schools &nbsp;&nbsp;</span><a class="btn btn-success search_btn-add" href="<?php echo url('/schools')?>">View List</a></div>
            <div class="panel-body" >

                <?php echo Form::model($edit,['method' => 'PATCH','route'=>['schools.update',$edit->school_id], 'class'=> 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=> 'schools_create', 'id'=>'schools_create']); ?>

                <?php echo csrf_field(); ?>


                <div class="form-group<?php echo e($errors->has('school_name') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">School Name</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="school_name" value="<?php echo $edit->school_name;?>">
                        <?php if($errors->has('school_name')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('school_name')); ?></strong>
                        </span>
                         <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Address</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="address" value="<?php echo $edit->address;?>">
                        <?php if($errors->has('address')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('address')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">City</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="city" value="<?php echo $edit->city;?>">
                        <?php if($errors->has('city')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('city')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">State</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="state" value="<?php echo $edit->state;?>">
                        <?php if($errors->has('state')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('state')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Country</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="country" value="<?php echo $edit->country;?>">
                        <?php if($errors->has('country')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('country')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Pin Code</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="pincode" value="<?php echo $edit->pincode;?>">
                        <?php if($errors->has('pincode')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('pincode')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('web_url') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label-new">Web URL</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="web_url" value="<?php echo $edit->web_url;?>">
                        <?php if($errors->has('web_url')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('web_url')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('email_id') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Email Id</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="email_id" value="<?php echo $edit->email_id;?>">
                        <?php if($errors->has('email_id')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('email_id')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Phone</label>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="phone" value="<?php echo $edit->phone;?>">
                        <?php if($errors->has('phone')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('phone')); ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row form-group">
                   <label class="col-md-3 control-label">Status:</label>
                           <div class="col-md-7">
                                <select name="status" id="status" class="form-control">
                                   <option value="">Select</option>
                                     <option value='-1' <?php if($edit->status == '-1'){?> selected <?php }?> >Disable</option>
                                       <option value='1' <?php if($edit->status == '1'){?> selected <?php }?>>Approved</option>
                                </select>
                            </div> 
                               <?php if($errors->has('Status')): ?>
                                 <span class="help-block">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                 </span>
                               <?php endif; ?>
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