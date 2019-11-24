<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Retailer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Retailer</li>
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
			<h3>Edit Retailer</h3>
			<?php echo form_open_multipart('Retailer/updateRetailer','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $Retailer[0]['r_id'];?>">
			<input type="hidden" name="oldImg" value="<?php echo $Retailer[0]['r_img'];?>">
			<div class="form-group">
				<p class="label label-default">Enter Retailer Name</p>
				<?php echo form_input('retailerName',$Retailer[0]['r_name'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Email</p>
				<?php echo form_input('retailerEmail',$Retailer[0]['r_email'],array('class'=>'form-control','type'=>'Email'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Password</p>
				<?php echo form_input('retailerPassword',$Retailer[0]['r_password'],array('class'=>'form-control','type'=>'Password'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Phone</p>
				<?php echo form_input('retailerPhone',$Retailer[0]['r_phone'],array('class'=>'form-control','type'=>'phone'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Address</p>
				<?php echo form_input('retailerAddress',$Retailer[0]['r_address'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer City</p>
				<?php echo form_input('retailerCity',$Retailer[0]['r_city'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer State</p>
				<?php echo form_input('retailerState',$Retailer[0]['r_state'],'class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Pincode</p>
				<?php echo form_input('retailerPin',$Retailer[0]['r_pincode'],'class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Retailer Product</p>
				<?php 
					$ProductOption = array();
					foreach ($Product->result() as $product) {
						$ProductOption[$product->p_id] = $product->p_name;
					}
					echo form_dropdown('retailerProduct',$ProductOption,$Retailer[0]['r_product_id'],'class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Product Quantity</p>
				<?php echo form_input('retailerPQuant',$Retailer[0]['r_product_qty'],array('class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Manufacturer</p>
				<?php 
					$ManufactOption = array();
					foreach ($Manufacturer->result() as $manufacturer) {
						$ManufactOption[$manufacturer->m_id] = $manufacturer->m_name;
					}
					echo form_dropdown('retailerManufact',$ManufactOption,$Retailer[0]['r_manufacturer_id'],'class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Retailer Logo</p>
				<?php echo form_upload('retailerDp','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update Retailer','Update Retailer','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			<img src="<?php echo base_url(); ?>assets/images/retailer/<?php echo $Retailer[0]['r_img']; ?>" class="img-responsive">
		</div>
	</div>

</div>