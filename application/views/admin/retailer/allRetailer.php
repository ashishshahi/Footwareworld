<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Retailer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Retailer</li>
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
		<div class="col-md-6 " style="margin-left: -70px;">
			<h3>All Retailer</h3>
			<div class="error">
				
			</div>
			<?php  if($allRetailers): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>ID</th>
					<th>Retailer</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>City</th>
					<th>State</th>
					<th>Pin Code</th>
					<th>Retailer Product ID</th>
					<th>Product Quantity</th>
					<th>Retailer Manufacturer Id</th>
					</tr>
				</thead>
				<?php foreach ($allRetailers as $Retailer) : ?>
					<tr class="ccat<?php echo $Retailer->r_id;?>">
						<td>
							<?php echo $Retailer->r_id;?>
						</td>
						<td>
							<?php echo $Retailer->r_name ?>
						</td>
						<td>
							<?php echo $Retailer->r_email ?>
						</td>
						<td>
							<?php echo $Retailer->r_phone ?>
						</td>
						<td>
							<?php echo $Retailer->r_address ?>
						</td>
						<td>
							<?php echo $Retailer->r_city ?>
						</td>
						<td>
							<?php echo $Retailer->r_state ?>
						</td>
						<td>
							<?php echo $Retailer->r_pincode ?>
						</td>
						<td>
							<?php echo $Retailer->r_product_id?>
						</td>
						<td>
							<?php echo $Retailer->r_product_qty ?>
						</td>
						<td>
							<?php echo $Retailer->r_manufacturer_id ?>
						</td>
						<td>
							<a href="<?php site_url();?>editRetailer/<?php echo $Retailer->r_id?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delretailer" data-id="<?php echo $Retailer->r_id;?>" data-text="<?php echo $this->encryption->encrypt($Retailer->r_id);?>"> Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Retailer Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>