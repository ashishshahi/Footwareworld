<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sub Cateogries
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Sub Cateogries</li>
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
			<h3>All Sub Cateogries</h3>
			<div class="error">
				
			</div>
			<?php  if($allsubCateogries): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>ID</th>
					<th>Sub Cateogry</th>
					<th>Cateogry</th>
					</tr>
				</thead>
				<?php foreach ($allsubCateogries as $SubCateogries) : ?>
					<tr class="ccat<?php echo $SubCateogries->subcat_id;?>">
						<td>
							<?php echo $SubCateogries->subcat_id;?>
						</td>
						<td>
							<?php echo $SubCateogries->subcat_name; ?>
						</td>
						<td>
							<?php echo $SubCateogries->cat_name;?>
						</td>
						<td>
							<a href="<?php site_url();?>editSubCateogry/<?php echo $SubCateogries->subcat_id?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delsubcat" data-id="<?php echo $SubCateogries->subcat_id;?>" data-text="<?php echo $this->encryption->encrypt($SubCateogries->subcat_id);?>"> Delete</a>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Sub Cateogries Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>