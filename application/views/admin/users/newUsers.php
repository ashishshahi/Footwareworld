<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Products</li>
      </ol>
    </section>
<div class="content-wrapper">
	<div class="row padtop">
		<div class="col-sm-6 col-sm-offset-3">
			<?php if($this->session->flashdata('class')):?>
			<div class="alert <?php  echo $this->session->flashdata('class');?> alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">x</span></button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-md-6 col-md-offset-3">
			<?php echo form_open_multipart('Users/addUsers','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter User First Name</p>
				<?php echo form_input('uFname','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter User Last Name</p>
				<?php echo form_input('uLName','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Email Id </p>
				<?php echo form_input('uEmail','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Password </p>
				<?php echo form_input('uPasswrod','','class="form-control"');?>
			</div>
			
			<div class="form-group">
				<p class="label label-default">Enter User Link</p>
				<?php echo form_input('uLink','',array('class'=>'form-control','type'=>'web'));?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add User','Add User','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		</div>

</div>
