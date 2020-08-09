<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url('Atlantis/assets/img/logoico.ico');?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/webfont/webfont.min.js');?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url('Atlantis/assets/css/fonts.min.css');?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url('Atlantis/assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('Atlantis/assets/css/atlantis.min.css');?>">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?php echo base_url('Atlantis/assets/css/demo.css');?>">
</head>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" style="background-color:#EE1C25;">

				<a href="#" class="logo">
					<img src="<?php echo base_url('Atlantis/assets/img/logoissmall.png');?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="topbar-toggler more"><i class="icon-options-vertical" style="color:white;"></i></button>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color:#EE1C25;">

				<div class="container-fluid">

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
							<a class="nav-link" href="<?php echo site_url('CLogin/index') ?>" aria-expanded="false">
                <h3 style="color:white;">Login&nbsp;&nbsp;<i class="fas fa-key"></i></h3>
              </a>

            </li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>


		<div class="main-panel">
			<div class="content">
				<div class="panel-header" style="background-color:#005BAB;">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Dashboard for User</h5>
							</div>
              <div class="ml-md-auto py-2 py-md-0">
                <h3 style="color:white;"><?php echo date('D, d F Y'); ?>
              </div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row row-card-no-pd mt--2">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-coins text-success"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Revenue</p>
												<h4 class="card-title">Rp. <?php echo number_format($revenue->total); ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body ">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-users text-warning"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Customer</p>
												<h4 class="card-title"><?php echo $countCustomer ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-alarm-1 text-info"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Information</p>
												<h4 class="card-title"><?php echo $countInfo ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<div class="icon-big text-center">
												<i class="flaticon-present text-primary"></i>
											</div>
										</div>
										<div class="col-7 col-stats">
											<div class="numbers">
												<p class="card-category">Promotion</p>
												<h4 class="card-title"><?php echo $countPromo ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">User Promotion</div>
									</div>
								</div>
								<div class="card-body">
                  <div class="table-responsive">
                    <table id="add-row2" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Promo's Name</th>
                          <th>Description</th>
                          <th>Last Update</th>
                          <th>Update By</th>
                          <th>Status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Promo's Name</th>
                          <th>Description</th>
                          <th>Last Update</th>
                          <th>Update By</th>
                          <th>Status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($promo as $item){
                         ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php if($item->promo == null){echo "-";}else{echo $item->promo;} ?></td>
                          <td><?php if($item->deskripsi == null){echo "-";}else{echo $item->deskripsi;} ?></td>
                          <td><?php echo date_format(new datetime($item->moddate),"d F Y"); ?></td>
                          <td><?php if($item->modby == null){echo "-";}else{echo $item->modifiedby;} ?></td>
                          <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
                          <td>
                            <div class="form-button-action">
                              <a href="<?php echo base_url()?>upload/promo/<?php echo $item->promo_file ?>" download="<?php echo $item->promo_file ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Download">
                                <i class="fa fa-download"></i>
                              </a>
                            </div>
                          </td>
                        </tr>

                      <?php $no++;} ?>
                      </tbody>
                    </table>
                  </div>
								</div>
							</div>
						</div>
					</div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-head-row">
                    <div class="card-title">User Information</div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="add-row" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Information</th>
                          <th>Description</th>
                          <th>Last Update</th>
                          <th>Update By</th>
                          <th>Status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>No</th>
                          <th>Information</th>
                          <th>Description</th>
                          <th>Last Update</th>
                          <th>Update By</th>
                          <th>Status</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                        $no=1;
                        foreach($info as $item){
                         ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php if($item->nama_info == null){echo "-";}else{echo $item->nama_info;} ?></td>
                          <td><?php if($item->desc_info == null){echo "-";}else{echo $item->desc_info;} ?></td>
                          <td><?php echo date_format(new datetime($item->moddate),"d F Y"); ?></td>
                          <td><?php if($item->modby == null){echo "-";}else{echo $item->modifiedby;} ?></td>
                          <td><?php if($item->status == 0){echo "<span class='badge badge-danger'>Non-Active</span>";}else{echo "<span class='badge badge-primary'>Active</span>";} ?></td>
                          <td>
                            <div class="form-button-action">

                              <a href="<?php echo base_url()?>upload/info/<?php echo $item->info_file ?>" download="<?php echo $item->info_file ?>" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Download">
                                <i class="fa fa-download"></i>
                              </a>


                            </div>
                          </td>
                        </tr>

                      <?php $no++;} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>

						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>
				</div>
			</footer>
		</div>


		<!-- Custom template | don't include it in your project! -->

		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url('Atlantis/assets/js/core/jquery.3.2.1.min.js');?>"></script>
	<script src="<?php echo base_url('Atlantis/assets/js/core/popper.min.js');?>"></script>
	<script src="<?php echo base_url('Atlantis/assets/js/core/bootstrap.min.js');?>"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js');?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js');?>"></script>


	<!-- Chart JS -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/chart.js/chart.min.js');?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js');?>"></script>

	<!-- Chart Circle -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/chart-circle/circles.min.js');?>"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/datatables/datatables.min.js');?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js');?>"></script>
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js');?>"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo base_url('Atlantis/assets/js/plugin/sweetalert/sweetalert.min.js');?>"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo base_url('Atlantis/assets/js/atlantis.min.js');?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url('Atlantis/assets/js/setting-demo.js');?>"></script>
	<script src="<?php echo base_url('Atlantis/assets/js/demo.js');?>"></script>
  <script>
  $('#add-row').DataTable({
    "pageLength": 5,
  });

  $('#add-row2').DataTable({
    "pageLength": 5,
  });
  </script>
</body>
</html>
