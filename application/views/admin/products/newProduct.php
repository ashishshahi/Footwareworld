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
		<div class="col-sm-6 col-sm-offset-1">
			<?php if($this->session->flashdata('class')):?>
			<div class="alert <?php  echo $this->session->flashdata('class');?> alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">x</span></button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php echo form_open_multipart('Products/addProduct','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter Product Name</p>
				<?php echo form_input('productName','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Size</p>
				<?php echo form_input('productSize','','class="form-control"');?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Cateogry</p>
				<?php //var_dump($cateogries->result());
					$CateogryOption = array();
					foreach ($cateogries->result() as $cateogries) {
						$CateogryOption[$cateogries->cName] = $cateogries->cName;
					}
					echo form_dropdown('productCat',$CateogryOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product SubCateogry</p>
				<?php //var_dump($SubCat->result());
					$SubCateogryOption = array();
					foreach ($SubCat->result() as $scateogry) {
						$SubCateogryOption[$scateogry->subcat_name] = $scateogry->subcat_name;
					}
					echo form_dropdown('productSubCat',$SubCateogryOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Brand</p>
				<?php //var_dump($Brands->result());
					$BrandsOption = array();
					foreach ($Brands->result() as $brand) {
						$BrandsOption[$brand->b_name] = $brand->b_name;
					}
					echo form_dropdown('productBrand',$BrandsOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Manufacturer  </p>
				<?php //var_dump($Brands->result());
					$ManufactOption = array();
					foreach ($Manufacturer->result() as $manufacturer) {
						$ManufactOption[$manufacturer->m_name] = $manufacturer->m_name;
					}
					echo form_dropdown('productManufact',$ManufactOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Retailer  </p>
				<?php //var_dump($Brands->result());
					$RetailOption = array();
					foreach ($Retailer->result() as $retailer) {
						$RetailOption[$retailer->r_name] = $retailer->r_name;
					}
					echo form_dropdown('productRetailer',$RetailOption,'','class="form-control"');
				?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Quantity</p>
				<?php echo form_input('productQuant','',array('class'=>'form-control','type'=>'number'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter Product Description</p>
		<?php echo form_textarea('productDesc','',array('class'=>'form-control textarea','style'=>'width:100%','rows'=>'2','cols'=>'2','id'=>'editor1'));?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add Product','Add Product','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			<?php echo form_open_multipart('Products/addMultiImage','',''); ?>
			<div class="form-group">
				<p class="label label-default">Add Multiple Product Images</p>
				<?php echo form_upload('mulProduct','','multiple');?>
			</div>
			<div class="form-group">
			<?php echo form_submit('Upload Multiple Product Images','Upload Multiple Product Images','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>
<script>
  $(function () {
    $('.textarea').wysihtml5()
  })
</script>