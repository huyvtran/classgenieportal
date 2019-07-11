<?php $__env->startSection('content'); ?>
<?php 
$url  = base_path().'/public/json/rolemang.json';
$data = file_get_contents($url);
$data = json_decode($data,true);
?>
    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Role Magement <a class="btn btn-success" href="<?php echo url('/rolemanagement/create')?>">Add Admin Role</a></div>
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
                      <table class="table table-striped">
                        <thead>
                        <?php   if(count($staffmang) > 0){?>
                          <tr>
                            <th>S.NO</th>
                            <th>Role Name</th>
                            <th>Module Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      <tbody>
                      <?php  
                        $i = 1; 
                        foreach($staffmang as $row)
                            {
                               $arr_module = array();
                               $modulearr = explode(',', $row->module_list);
                               foreach($modulearr as $value)
                               {
                                  $arr_module[] = $data[$value];
                               }
                        ?>
                          <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row->role_name?></td>
                            <td><?php echo implode(', ', $arr_module)?></td>
                            <td>
                            <span class="col-md-1">
                            <a href="<?php echo url('/rolemanagement/'.$row->id.'/edit') ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                            </span><span class="col-md-1">
                            <?php echo e(Form::open(array('route' => array('rolemanagement.destroy', $row->id), 'method' => 'delete'))); ?>

                              <button type="submit" ><i class="glyphicon glyphicon-trash"></i></button>
                            <?php echo e(Form::close()); ?>

                            </span>
                          </tr>
                        <?php $i++;} ?>
                        <?php }else{ ?>
                        <tr><td style="background-color: #ddd; text-align: center; font-weight: bold;">Record Not Found</td></tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>