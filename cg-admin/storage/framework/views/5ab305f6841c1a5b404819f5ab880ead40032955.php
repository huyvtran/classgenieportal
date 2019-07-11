<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-8 col-lg-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Testing Ajax</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="frm_testing" name="frm_testing">
				    <?php echo csrf_field(); ?>

					<input type="text" id="txtInput" name="txtInput" />&nbsp;<input type="button" value="TestAjaxloadurl" id="btnSubmit" name="btnSubmit">&nbsp;
					<input type="button" value="TestAjaxload" id="btnSubmit1" name="btnSubmit1">
					<br />
					<span id="respMsg"></span>
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