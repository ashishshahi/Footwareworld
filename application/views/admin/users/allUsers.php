<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Users</li>
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
		<div class="col-md-6 col-md-offset-0">
			<h3>All Users</h3>
			<div class="error">
				
			</div>
			<?php  if($allusers): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>ID</th>
					<th>FName</th>
					<th>LName</th>
					<th>Email</th>
					<th>Link</th>
					<th>Added By</th>
					<th>Time</th>
					</tr>
				</thead>
				<?php foreach ($allusers as $Users) : ?>
					<tr class="ccat<?php echo $Users->uId;?>">
						<td>
							<?php echo $Users->uId;?>
						</td>
						<td>
							<?php echo $Users->uFirstName ?>
						</td>
						<td>
							<?php echo $Users->uLastName ?>
						</td>
						<td>
							<?php echo $Users->uEmail ?>
						</td>
						<td>
							<?php echo $Users->uLink ?>
						</td>
						<td>
							<?php echo $Users->uPosted ?>
						</td>
						<td>
							<?php echo $Users->uDate ?>
						</td>
						<td>
							<a href="<?php site_url();?>editUser/<?php echo $Users->uId?>" class="btn btn-info"> Edit</a>
						</td>
						<td>
							<a href="javascript:void(0)" class="btn btn-danger deluser" data-id="<?php echo $Users->uId;?>" data-text="<?php echo $this->encryption->encrypt($Users->uId);?>"> Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php echo $links; ?>
			<?php else: ?>
				<?php echo "Users Not Available."; ?>
			<?php endif; ?>
		</div>
	</div>

</div>