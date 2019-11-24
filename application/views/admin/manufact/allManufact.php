<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manufacturer
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Manufacturer</li>
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
		<div class="col-md-6 col-md-offset-0">
			<h3>All Manufacturer</h3>
			<div class="error">
				
			</div>
			<?php  if($allManufact): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>ID</th>
					<th>Manufacturer</th>
					<th>Phone</th>
					<th>City</th>
					<th>State</th>
					<th>Pin Code</th>
					<th>Product Quantity</th>
					<th>Manufacturer Product ID</th>
					</tr>
				</thead>
				<?php foreach ($allManufact as $Manufact) : ?>
					<tr class="ccat<?php echo $Manufact->m_id;?>">
						<td>
							<?php echo $Manufact->m_id;?>
						</td>
						<td>
							<?php echo $Manufact->m_name ?>
						</td>
						<td>
							<?php echo $Manufact->m_phone ?>
						</td>
						<td>
							<?php echo $Manufact->m_city ?>
						</td>
						<td>
							<?php echo $Manufact->m_state ?>
						</td>
						<td>
							<?php echo $Manufact->m_pincode ?>
						</td>
						<td>
							<?php echo $Manufact->m_product_qty ?>
						</td>
						<td>
							<?php echo $Manufact->m_product_id?>
						</td>
						<td>
							<a href="<?php site_url();?>editManufact/<?php echo $Manufact->m_id?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delmanufact" data-id="<?php echo $Manufact->m_id;?>" data-text="<?php echo $this->encryption->encrypt($Manufact->m_id);?>"> Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Manufacturer Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>