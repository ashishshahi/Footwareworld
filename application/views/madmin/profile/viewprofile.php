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
     <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-5 col-sm-offset-1">
    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/images/manufact/<?php echo $vMdata[0]['m_img']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo getMAdminName();?></h3>

              <p class="text-muted text-center">Manufacturer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Brands</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Orders</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Seles</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

             <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


      </div>
       <!-- About Me Box -->
        <div class="col-md-5 col-sm-offset-0">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $vMdata[0]['m_address']?> , <?php echo $vMdata[0]['m_city']?> , <?php echo $vMdata[0]['m_state'] ?></br><?php  echo $vMdata[0]['m_pincode']?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Products</strong>

              <p>
                <span class="label label-danger">Manufacturer Id : #FootM00<?php  echo $vMdata[0]['m_id']?></span>
                <span class="label label-success">Product Quantity : <?php echo $vMdata[0]['m_product_qty']?></span>
                <span class="label label-info">Joining Date <?php echo date('d-M-Y',strtotime($vMdata[0]['date']))?></span>
              </p>

              <hr>

              <strong><i class="fa fa-address-book"></i> Contact Details</strong>

              <p><i class="fa fa-phone"></i>&nbsp&nbsp<?php  echo $vMdata[0]['m_phone']?></p>
              <p><i class="fa fa-envelope"></i>&nbsp&nbsp<?php  echo $vMdata[0]['m_email']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
</div>
</div>