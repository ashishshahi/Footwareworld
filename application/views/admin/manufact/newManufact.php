<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manufacturer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Manufacturer</li>
      </ol>
    </section>
<div class="content-wrapper">
	<div class="row padtop">
		<div class="col-sm-6 col-sm-offset-2">
			<?php if($this->session->flashdata('class')):?>
			<div class="alert <?php  echo $this->session->flashdata('class');?> alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">x</span></button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-md-6 col-md-offset-2">
			<?php echo form_open_multipart('Manufact/addManufact','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Name</p>
				<?php echo form_input('manufactName','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Email</p>
				<?php echo form_input('manufactEmail','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Password</p>
				<?php echo form_input('manufactPassword','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Phone</p>
				<?php echo form_input('manufactPhone','',array('class'=>'form-control','type'=>'phone'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Address</p>
				<?php echo form_input('manufactAddress','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer City</p>
				<?php echo form_input('manufactCity','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer State</p>
				<?php echo form_input('manufactState','','class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Pincode</p>
				<?php echo form_input('manufactPin','','class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Manufacturer Product</p>
				<?php //var_dump($Brands->result());
					$ProductOption = array();
					foreach ($Product->result() as $product) {
						$ProductOption[$product->p_id] = $product->p_name;
					}
					echo form_dropdown('manufactProduct',$ProductOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Product Quantity</p>
				<?php echo form_input('MproductQuant','',array('class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Logo</p>
				<?php echo form_upload('manfactDp','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add Manufacturer','Add Manufacturer','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>