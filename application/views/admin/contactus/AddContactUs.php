<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Us
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Contact Us</li>
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
			<h3>Add Contact Us</h3>
			<?php echo form_open_multipart('ContactUs/AddContactUs','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us Title</p>
				<?php echo form_input('ctitle','',array('placeholder'=>'Enter About Us Title','class'=>'form-control'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us Address</p>
				<?php echo form_input('caddress','',array('placeholder'=>'Enter Contact Us Address','class'=>'form-control'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us phone</p>
				<?php echo form_input('cphone','',array('placeholder'=>'Enter Contact Us Phone  ','class'=>'form-control','type' => 'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us Mobile No</p>
				<?php echo form_input('cmob','',array('placeholder'=>'Enter Contact Us Mobile No ','class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us Email Id</p>
				<?php echo form_input('cemail','',array('placeholder'=>'Enter Contact Us Email Id ','class'=>'form-control','type'=>'email'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Contact Us Web Address</p>
				<?php echo form_input('cweb','',array('placeholder'=>'Enter Contact Us Web Address ','class'=>'form-control','type'=>'url'));?>
			</div>
			<div class="form-group">
				<?php echo form_upload('poster','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add Contact Us','Add Contact Us','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>
