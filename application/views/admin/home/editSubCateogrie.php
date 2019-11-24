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
			<h3>Edit Sub Cateogries</h3>
			<?php echo form_open_multipart('SubCateogry/updateSubCateogry','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $SubCateogry[0]['subcat_id'];?>">
			<input type="hidden" name="subcat" value="<?php echo $SubCateogry[0]['cat_name']?>">
			<input type="hidden" name="oldImg" value="<?php echo $SubCateogry[0]['subcat_id'];?>">
			<div class="form-group">
				<?php echo form_input('subcateogryName',$SubCateogry[0]['subcat_name'],'class="form-control"');?>
			</div>
			<div class="form-group">
				<?php //var_dump($cateogries->result());
					$CateogryOption = array();
					foreach($cateogries->result() as $cateogry) {
						$CateogryOption[$cateogry->cName] = $cateogry->cName;
					}
					echo form_dropdown('subcatId',$CateogryOption,$SubCateogry[0]['cat_name'],'class="form-control"');
				?>
			</div>
			<div class="form-group">
				<?php echo form_upload('simg','','');?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update Sub Cateogry','Update Sub Cateogry','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-md-3">
			<img src="<?php echo base_url(); ?>assets/images/subcateogries/<?php echo $SubCateogry[0]['subcat_img']; ?>" class="img-responsive">
		</div>
	</div>

</div>