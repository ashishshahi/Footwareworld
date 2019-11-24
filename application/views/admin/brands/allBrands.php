<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Brands
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Brands</li>
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
			<h3>All Brands</h3>
			<div class="error">
				
			</div>
			<?php  if($allBrands): ?>
			<table class="table table-bordered">
				<?php foreach ($allBrands as $Brands) : ?>
					<tr class="ccat<?php echo $Brands->b_id;?>">
						<td>
							<?php echo $Brands->b_id;?>
						</td>
						<td>
							<?php echo $Brands->b_name ?>
						</td>
						<td>
							<a href="<?php site_url();?>editBrand/<?php echo $Brands->b_id?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delbrand" data-id="<?php echo $Brands->b_id;?>" data-text="<?php echo $this->encryption->encrypt($Brands->b_id);?>"> Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Brands Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>