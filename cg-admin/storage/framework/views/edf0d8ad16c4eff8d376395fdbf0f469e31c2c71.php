<?php $__env->startSection('content'); ?>
<?php 
$url  = base_path().'/public/json/rolemang.json';
$data = file_get_contents($url);
$data = json_decode($data,true);
$size = sizeof($data);
?>
    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Admin User &nbsp;<a class="btn btn-success" href="<?php echo url('/usermanagement')?>">View List</a></div>
                <div class="panel-body" >
                  
                <?php echo Form::model($edit,['method' => 'PATCH','route'=>['usermanagement.update',$edit->id], 'class'=> 'form-horizontal', 'name'=> 'user_create', 'id'=>'user_create']); ?>

                        <?php echo csrf_field(); ?>

                        
                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">User Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" value="<?php echo $edit->username?>">

                                <?php if($errors->has('username')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password" value="<?php echo $edit->password?>">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('fname') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">First Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="fname" value="<?php echo $edit->fname?>">

                                <?php if($errors->has('fname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('lname') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="lname" value="<?php echo $edit->lname?>">

                                <?php if($errors->has('lname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                       <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" value="<?php echo $edit->email ?>">

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Role</label>
                              
                            <div class="col-md-7">
                              <select class="form-control col-md-3" name="role">
                              <option  value="">Select User Role</option>
                                 <?php foreach ($rolemang as $value){?>
                                  <option value="<?php echo $value->id;?>" <?php if($value->id ==$edit->role_id ){ ?> selected <?php } ?>><?php echo $value->role_name?></option>
                                 <?php }?>
                              </select>
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