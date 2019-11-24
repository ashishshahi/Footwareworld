<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manufacturer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Manufacturer</li>
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
			<h3>Edit Manufacturer</h3>
			<?php echo form_open_multipart('Manufact/updateManufact','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $Manufact[0]['m_id'];?>">
			<input type="hidden" name="oldImg" value="<?php echo $Manufact[0]['m_img'];?>">
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Name</p>
				<?php echo form_input('manufactName',$Manufact[0]['m_name'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Email</p>
				<?php echo form_input('manufactEmail',$Manufact[0]['m_email'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Password</p>
				<?php echo form_input('manufactPassword',$Manufact[0]['m_password'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Phone</p>
				<?php echo form_input('manufactPhone',$Manufact[0]['m_phone'],array('class'=>'form-control','type'=>'phone'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Address</p>
				<?php echo form_input('manufactAddress',$Manufact[0]['m_address'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer City</p>
				<?php echo form_input('manufactCity',$Manufact[0]['m_city'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer State</p>
				<?php echo form_input('manufactState',$Manufact[0]['m_state'],'class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Pincode</p>
				<?php echo form_input('manufactPin',$Manufact[0]['m_pincode'],'class = "form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Choose Manufacturer Product</p>
				<?php //var_dump($Brands->result());
					$ProductOption = array();
					foreach ($Product->result() as $product) {
						$ProductOption[$product->p_id] = $product->p_name;
					}
					echo form_dropdown('manufactProduct',$ProductOption,$Manufact[0]['m_product_id'],'class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Product Quantity</p>
				<?php echo form_input('MproductQuant',$Manufact[0]['m_product_qty'],array('class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Manufacturer Logo</p>
				<?php echo form_upload('manfactDp','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update Manufacturer','Update Manufacturer','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			<img src="<?php echo base_url(); ?>assets/images/manufact/<?php echo $Manufact[0]['m_img']; ?>" class="img-responsive">
		</div>
	</div>

</div>