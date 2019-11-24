<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cateogries
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Cateogries</li>
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
			<h3>All Cateogries</h3>
			<div class="error">
				
			</div>
			<?php  if($allCateogries): ?>
			<table class="table table-bordered">
				<?php foreach ($allCateogries as $Cateogries) : ?>
					<tr class="ccat<?php echo $Cateogries->cId;?>">
						<td>
							<?php echo $Cateogries->cId;?>
						</td>
						<td>
							<?php echo $Cateogries->cName ?>
						</td>
						<td>
							<a href="<?php site_url();?>editCateogry/<?php echo $Cateogries->cId?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger delcat" data-id="<?php echo $Cateogries->cId;?>" data-text="<?php echo $this->encryption->encrypt($Cateogries->cId);?>"> Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Cateogries Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>