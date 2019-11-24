<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sub Cateogries
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New Sub Cateogries</li>
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
			<?php echo form_open_multipart('SubCateogry/addsubCateogry','',''); ?>
			<div class="form-group">
				<?php echo form_input('subcatName','','class="form-control"');?>
			</div>
			<div class="form-group">
				<?php //var_dump($cateogries->result());
					$CateogryOption = array();
					foreach ($cateogries->result() as $cateogrys) {
						$CateogryOption[$cateogrys->cName] = $cateogrys->cName;
					}
					echo form_dropdown('subcatId',$CateogryOption,'','class="form-control"');
				?>
			</div>
				<div class="form-group">
					<?php echo form_upload('subcatDp','','');?>
				</div>
			<div class="form-group">
				<?php echo form_submit('Add Sub Cateogry','Add Sub Cateogry','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>