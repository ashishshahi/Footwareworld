<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        About Us
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add About Us</li>
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
			<h3>Add About Us</h3>
			<?php echo form_open_multipart('Aboutus/AddAboutUs','',''); ?>
			<div class="form-group">
				<p class="label label-default">Enter About Us Title</p>
				<?php echo form_input('atitle','',array('placeholder'=>'Enter About Us Title','class'=>'form-control'));?>
			</div>
			<div class="form-group">
				<p class="label label-default">Enter About Us Data</p>
				<?php 
					  $data = array(
						        'name'        => 'autext',
						        'id'          => 'editor1',
						        'value'       => set_value('autext'),
						        'rows'        => '5',
						        'cols'        => '10',
						        'style'       => 'width:100%',
						        'class'       => 'form-control textarea'
						    );
					  echo form_textarea($data);
				?>
			</div>
			<div class="form-group">
				<?php echo form_submit('Add About Us','Add About Us','class="btn btn-primary"');?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>

</div>
<script src="<?php echo base_url('assets/admin/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
  })
</script>