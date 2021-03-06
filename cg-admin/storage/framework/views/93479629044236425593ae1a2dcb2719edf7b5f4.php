<?php $__env->startSection('header'); ?>
<?php echo Html::style('css/pagination.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading col-md-12" style="margin:0 0 20px 0;">
                <form class="form-horizontal form_eelect" role="form" method="POST" action="<?php echo e(url('/emaillist/export')); ?>" target="_blank" id="form_export">
                         
                <div class="col-md-6">  
                   <span style="font-size:15px;">Email Management&nbsp;&nbsp;</span>
                    <button type="button" class="btn btn-success search_btn-add"onclick="editEmailContent(this.id)" id="new">
                    <b><strong>Add New</strong></b>
                    </button>
                </div>
                <div class= "col-md-6" style="float: left">
                <div class="col-md-2 margin_top"> Export:</div>
                <div class="col-md-7">                   
                    <select name="typeExp" id="typeExp" class="select-pdf form-control">
                       <option value="csv">CSV</option>
                       <option value="pdf">PDF</option>
                    </select>
                </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary" name="btnExport" id="btnExport" onClick="return executeExport()">
                    <i class="fa fa-btn fa-refresh"></i>Export
                </button>
                </div>                    
                </div>
                <div class="col-md-3"></div>
                  <input type="hidden"  name="hid_export_id" id="hid_export_id">
                  <input type="hidden" name="hid_export_type" id="hid_export_type">
                  <input type="hidden" name="hid_export_subject" id="hid_export_subject">
                  <?php echo csrf_field(); ?>

              </form>
              </div>                              

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
                <div class="col-md-12 feild_sec">
                  <div class="col-md-3 form_sec">
                    <input type="text" id="id" placeholder="Search By ID" class="myText form-control col-md-2">
                  </div>
                  <div class="col-md-3 form_sec">
                    <input type="text" id="type" placeholder="Search By Type" class="myText form-control col-md-2">
                  </div>
                  <div class="col-md-3 form_sec">
                    <input type="text" id="subject" placeholder="Search By Subject" class="myText form-control col-md-2">
                  </div>
                  <div class="col-md-3">
                    <button id="btnSearch" class="btn btn-success search_btn search_btn-add" type="button"><b><strong>Search</strong></b></button>
                  </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div id="loading" style="text-align:center;width:200px;"></div>
                  <div id="Datatable" class="col-md-12" ></div>
                  <div id="Pagination" style="text-align:center;" ></div>
                    <input type="hidden" value="<?php echo PAGE_SIZE; ?>" name="items_per_page" id="items_per_page">
                    <input type="hidden" value="<?php echo NUM_DISPLAY_ENTRIES; ?>" name="num_display_entries" id="num_display_entries">
                    <input type="hidden" value="Prev" name="prev_text" id="prev_text">
                    <input type="hidden" value="Next" name="next_text" id="next_text">   
                    <input type="hidden" id="sort" value="D" >
                    <?php echo csrf_field(); ?>

                </div>
           </div>
     </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php echo Html::script('/public/js/jquery.pagination.js'); ?>

<?php echo Html::script('/public/js/email-content.js'); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>