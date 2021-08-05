<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/logo-03.png">
	<title>Snowlake</title>
	<!-- <link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/revolution/css/layers.css">
	<link rel="styleslaeet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/revolution/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/type/type.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style.css">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/css/color/purple.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://appt.demoo.id/tema/snowlake/snowlake-html/snowlake/style/css/font/font2.css"> -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/revolution/css/layers.css">
	<link rel="styleslaeet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/revolution/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/type/type.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/style2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/gaya2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/css/color/purple.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/snowlake/css/font/font2.css">
</head>

<body>
	<div class="preloader-container">
		<svg class="preloader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
			<circle cx="170" cy="170" r="160" stroke="#E2007C" />
			<circle cx="170" cy="170" r="135" stroke="#404041" />
			<circle cx="170" cy="170" r="110" stroke="#E2007C" />
			<circle cx="170" cy="170" r="85" stroke="#404041" />
		</svg>
	</div>
	<div class="content-wrapper">
		<nav class="navbar bg-white navbar-expand-lg">
			<div class="container justify-content-center">
				<div class="navbar-brand"><a href="<?= base_url() ?>"><img src="#" srcset="<?php echo base_url(); ?>/assets/images/logo-02.png 1x, <?php echo base_url(); ?>/assets/images/logo-02.png 2x" style="width: 100px;" alt="" /></a></div>
				<div class="navbar-other ml-auto order-lg-3">
					<ul class="navbar-nav flex-row align-items-center" data-sm-skip="true">
						<li class="nav-item">
							<div class="navbar-hamburger d-lg-none d-xl-none ml-auto"><button class="hamburger animate plain" data-toggle="offcanvas-nav"><span></span></button></div>
						</li>
						<li class="dropdown search-dropdown position-static nav-item">
							<div class="dropdown-menu search-dropdown-menu w-100 collapse">
								<div class="form-wrapper">
									<i class="dropdown-close jam jam-close"></i>
								</div>
								<!-- /.form-wrapper -->
							</div>
						</li>
					</ul>
					<!-- /.navbar-nav -->
				</div>
				<!-- /.navbar-other -->
				<div class="navbar-collapse offcanvas-nav">
					<div class="offcanvas-header d-lg-none d-xl-none">
						<a href="<?= base_url() ?>"><img src="#" srcset="<?php echo base_url(); ?>/assets/images/logo-02.png 1x, <?php echo base_url(); ?>/assets/images/logo-02.png 2x" style="width: 100px;" alt="" /></a>
						<button class="plain offcanvas-close offcanvas-nav-close"><i class="jam jam-close"></i></button>
					</div>
					<?php $this->load->view('templates/frontend/navbar') ?>
					<!-- /.navbar-nav -->
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Header -->
		<?php $this->load->view('templates/frontend/header') ?>
		<!--  /.Header -->

		<!-- Main Page -->
		<?php $this->load->view($page) ?>
		<!-- /.Main Page -->

		<!-- Footer -->
		<?php $this->load->view('templates/frontend/footer') ?>
		<!-- /.Footer -->
	</div>
	<!-- /.content-wrapper -->
	<script src="<?php echo base_url(); ?>/assets/snowlake/js/popper.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/js/plugins.js"></script>
	<script src="<?php echo base_url(); ?>/assets/snowlake/js/scripts.js"></script>
	<script>
		$(document).ready(function() {
			$('.preloader-container').fadeOut(500)
		})
	</script>
</body>

</html>
