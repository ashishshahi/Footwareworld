<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Retailer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Retailer</li>
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
			<?php echo form_open_multipart('Retailer/addRetailer','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Name</p>
				<?php echo form_input('retailerName','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Email</p>
				<?php echo form_input('retailerEmail','',array('class'=>'form-control','type'=>'Email'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Password</p>
				<?php echo form_input('retailerPassword','',array('class'=>'form-control','type'=>'Password'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Phone</p>
				<?php echo form_input('retailerPhone','',array('class'=>'form-control','type'=>'phone'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Address</p>
				<?php echo form_input('retailerAddress','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer City</p>
				<?php echo form_input('retailerCity','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer State</p>
				<?php echo form_input('retailerState','','class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Pincode</p>
				<?php echo form_input('retailerPin','','class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Retailer Product</p>
				<?php 
					$ProductOption = array();
					foreach ($Product->result() as $product) {
						$ProductOption[$product->p_id] = $product->p_name;
					}
					echo form_dropdown('retailerProduct',$ProductOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Product Quantity</p>
				<?php echo form_input('retailerPQuant','',array('class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Manufacturer</p>
				<?php 
					$ManufactOption = array();
					foreach ($Manufacturer->result() as $manufacturer) {
						$ManufactOption[$manufacturer->m_id] = $manufacturer->m_name;
					}
					echo form_dropdown('retailerManufact',$ManufactOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Logo</p>
				<?php echo form_upload('retailerDp','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add Retailer','Add Retailer','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>