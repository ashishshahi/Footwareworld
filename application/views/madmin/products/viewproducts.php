<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Products</li>
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
		<div class="col-md-10 col-md-offset-0 box-body table-responsive">
			<h3>All Products</h3>
			<div class="error">
				
			</div>
			<?php  if($allMProducts): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>P.ID</th>
					<!-- <th>Image</th> -->
					<th>Product</th>
					<th>Size</th>
					<th>Quantity</th>
					<th>Brand</th>
					<th>Cateogry</th>
					<th>Sub Cateogry</th>
					<th>Product Date</th>
					</tr>
				</thead>
				<?php foreach ($allMProducts as $Product) : ?>
					<tr class="pcat<?php echo $Product->p_id;?>">
						<td>
							<?php echo $Product->p_id;?>
						</td>
						<!-- <td>
						<img src="<?php //echo base_url(); ?>assets/images/products/<?php //echo $Product[0]['p_image_id']; ?>" class="img-responsive">
						</td> -->
						<td>
							<?php echo $Product->p_name ?>
						</td>
						<td>
							<?php echo $Product->p_size ?>
						</td>
						<td>
							<?php echo $Product->p_qty ?>
						</td>
						<td>
							<?php echo $Product->p_brand ?>
						</td>
						<td>
							<?php echo $Product->p_cat ?>
						</td>
						<td>
							<?php echo $Product->p_subcat ?>
						</td>
						<td>
							<?php echo date('d M Y',strtotime($Product->date)); ?>
						</td>
						<!-- <td>
							<a href="<?php //site_url();?>editProducts/<?php //echo $Product->p_id?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delproduct" data-id="<?php //echo $Product->p_id;?>" data-text="<?php //echo $this->encryption->encrypt($Product->p_id);?>"> Delete</a>
						</td> -->
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Product Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>