<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        About Us
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit About Us</li>
      </ol>
    </section>
<div class="content-wrapper">
	<div class="row padtop">
		<div class="col-sm-10 col-sm-offset-1">
			<?php if($this->session->flashdata('class')):?>
			<div class="alert <?php  echo $this->session->flashdata('class');?> alert-dismissable" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true">x</span></button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-md-10 col-md-offset-1">
			<h3>Edit About Us</h3>
			<?php echo form_open_multipart('Aboutus/UpdateAboutUs','',''); ?>
			<input type="hidden" name="xid" value="<?php echo $AboutUs[0]['a_id'];?>">
			<div class="form-group">
				<p class="label label-default">Enter About Us Title</p>
				<?php echo form_input('atitle',$AboutUs[0]['a_title'],array('placeholder'=>'Enter About Us Title','class'=>'form-control'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter About Us Data</p>
				<?php 
				echo form_textarea('autext',$AboutUs[0]['a_desciption'],array('class'=>'form-control','id'=>'editor1','style'=>'width:100%','rows'=>'2','cols'=>'2'));?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Update About Us','Update About Us','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/ckeditor/ckeditor.js"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
  })
</script>