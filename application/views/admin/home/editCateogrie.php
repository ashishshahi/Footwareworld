<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cateogries
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Cateogries</li>
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
		<div class="col-md-6 col-md-offset-1">
			<h3>Edit Cateogries</h3>
			<?php echo form_open_multipart('Cateogry/updateCateogry','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $Cateogry[0]['cId'];?>">
			<input type="hidden" name="oldImg" value="<?php echo $Cateogry[0]['cDp'];?>">
			<div class="form-group">
				<?php echo form_input('cateogryName',$Cateogry[0]['cName'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<?php echo form_upload('catDp','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update Cateogry','Update Cateogry','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			<img src="<?php echo base_url(); ?>assets/images/cateogries/<?php echo $Cateogry[0]['cDp']; ?>" class="img-responsive">
		</div>
	</div>

</div>