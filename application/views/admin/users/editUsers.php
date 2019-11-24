<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Users</li>
      </ol>
    </section>
<div class="content-wrapper">
	<div class="row padtop">
		<div class="col-sm-6 col-sm-offset-1">
			<?php if($this->session->flashdata('class')):?>
			<div class="alert <?php  echo $this->session->flashdata('class');?> alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">x</span></button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<h3>Edit Product</h3>
			<?php echo form_open_multipart('Users/updateUsers','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $User[0]['uId'];?>">
			<div class="form-group">
				<p class="label label-default">Enter User First Name</p>
				<?php echo form_input('uFname',$User[0]['uFirstName'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter User Last Name</p>
				<?php echo form_input('uLName',$User[0]['uLastName'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Email Id </p>
				<?php echo form_input('uEmail',$User[0]['uEmail'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Password </p>
				<?php echo form_input('uPasswrod',$User[0]['uPassword'],'class="form-control"');?>
			</div>
			
			<div class="form-group">
				<p class="label label-default">Enter User Link</p>
				<?php echo form_input('uLink',$User[0]['uLink'],array('class'=>'form-control','type'=>'url'));?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update User','Update User','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>