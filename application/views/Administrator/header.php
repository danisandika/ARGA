<?php
if($this->session->userdata('user_role') != 'Administrator')
{
  $this->session->set_flashdata("failed", "You are not an Administrator");
  redirect(base_url('CLogin'));
}
?>
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
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="#" class="logo">
          <!--Navbar Atlantis _ icon-->
					<img src="<?php echo base_url('Atlantis/assets/img/logoissmall.png');?>" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">


						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">

              	<div class="avatar-sm">
									<img src="<?php echo base_url('upload/profil/'.$this->session->userdata('user_profil'));?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="<?php echo base_url('upload/profil/'.$this->session->userdata('user_profil'));?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $this->session->userdata('user_username') ?></h4>
												<p class="text-muted"><?php echo $this->session->userdata('user_role') ?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo site_url('CProfil/editUseradmin/'.$this->session->userdata('user_userID'))?>">Edit Profile</a>
										<a class="dropdown-item" href="<?php echo site_url('CProfil/editpassadmin/'.$this->session->userdata('user_userID'))?>">Edit Password</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="<?php echo site_url('CLogin/logout')?>">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('upload/profil/'.$this->session->userdata('user_profil'));?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $this->session->userdata('user_username') ?>
									<span class="user-level"><?php echo $this->session->userdata('user_role') ?></span>
								</span>
							</a>
							<div class="clearfix"></div>


						</div>
					</div>
					<ul class="nav nav-primary">

						<li class="nav-item <?php echo $this->uri->segment(1)=='CDashboard'? 'active':''?>">
							<a href="<?php echo site_url('CDashboard/index2') ?>" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Administrator</h4>
						</li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='CAActivity'? 'active':''?>">
							<a href="<?php echo site_url('CAActivity') ?>">
								<i class="fas fa-pen-square"></i>
								<p>Activity Plan</p>
							</a>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CARevenue'? 'active':''?>">
							<a  href="<?php echo site_url('CARevenue') ?>">
								<i class="fas fa-money-bill-alt"></i>
								<p>Revenue</p>
							</a>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CAVisit'? 'active':''?>">
							<a  href="<?php echo site_url('CAVisit') ?>">
								<i class="fas fa-map-marker-alt"></i>
								<p>Visit</p>
							</a>
						</li>


            <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Information</h4>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CAPromo'? 'active':''?>">
							<a href="<?php echo site_url('CAPromo') ?>">
								<i class="fas fa-tags"></i>
								<p>Promotion</p>
							</a>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CAInfo'? 'active':''?>">
							<a href="<?php echo site_url('CAInfo') ?>">
								<i class="fas fa-info"></i>
								<p>Information</p>
							</a>
						</li>


            <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">User</h4>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CAEmployee'? 'active':''?>">
							<a href="<?php echo site_url('CAEmployee')?>">
								<i class="fas fa-user-tie"></i>
								<p>Employee</p>
							</a>
						</li>
            <li class="nav-item <?php echo $this->uri->segment(1)=='CACustomer'? 'active':''?>">
							<a href="<?php echo site_url('CACustomer')?>">
								<i class="fas fa-user-friends"></i>
								<p>Customer</p>
							</a>
						</li>
						<li class="nav-item <?php echo $this->uri->segment(1)=='CARole'? 'active':''?>">
							<a href="<?php echo site_url('CARole')?>">
								<i class="fas fa-user-tie"></i>
								<p>Role</p>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
