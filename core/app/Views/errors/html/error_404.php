<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Dasa Wisma PKK">

	<meta name="Dasa Wisma PKK" content="">

	<title> Dasa Wisma PKK</title>

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/../foto_dasa_wisma/logo-dasa-wisma.png">
	<!-- Mobile Specific Meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/bootstrap/bootstrap.css">
	<!-- Iconfont Css -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/fontawesome/css/all.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/bicon/css/bicon.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/themify/themify-icons.css">
	<!-- animate.css -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/animate-css/animate.css">
	<!-- WooCOmmerce CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/woocommerce/woocommerce-layouts.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/woocommerce/woocommerce-small-screen.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/woocommerce/woocommerce.css">
	<!-- Owl Carousel  CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/owl/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/vendors/owl/assets/owl.theme.default.min.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/css/responsive.css">

	<!-- Map Responsive -->
	<link rel="stylesheet" href="<?= base_url() ?>/../assets_dasa_wisma/css/map-responsive.css">

	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/../assets_dasa_wisma/images/logo.png">

	<!-- Login Register CSS -->
	<link href="<?= base_url() ?>/../assets_dasa_wisma/css/front_login_reg.css" rel="stylesheet" type="text/css">

	<script src="<?= base_url() ?>/../assets_dasa_wisma/js/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>

<body id="top-header">


	<!--  Header Menu start -->


	<div class="blog main-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<div class="error-page text-center error-404 not-found">
						<div class="error-header">
							<h2><strong>404</strong></h2>
						</div>
						<div class="error-message">
							<h3>Oops... Halaman Tidak Ditemukan!</h3>
						</div>

						<div class="error-content">
							<?php if (!empty($message) && $message !== '(null)') : ?>
								<?= esc($message) ?> <br>
							<?php else : ?>
								Gunakan tombol di bawah ini untuk membuka halaman utama situs <br>
							<?php endif ?>
							<a href="<?= base_url('dashboard') ?>" class="btn btn-main">Kembali ke halaman utama situs</a>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #main -->
	</div><!-- #primary -->



	<div class="fixed-btm-top">
		<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
	</div>



	<!-- 
    Essential Scripts
    =====================================-->

	<!-- Main jQuery -->
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/jquery/jquery.js"></script>
	<!-- Bootstrap 4.5 -->
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/bootstrap/bootstrap.js"></script>
	<!-- Counterup -->
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/counterup/waypoint.js"></script>
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/counterup/jquery.counterup.min.js"></script>
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/jquery.isotope.js"></script>
	<!-- <script src="assets/vendors/imagesloaded.js"></script> -->
	<!--  Owlk Carousel-->
	<script src="<?= base_url() ?>/../assets_dasa_wisma/vendors/owl/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>/../assets_dasa_wisma/js/script.js"></script>

	<script src="<?= base_url() ?>/../assets_dasa_wisma/js/front_logreg.js"></script>

	<script src="<?= base_url() ?>/../assets_dasa_wisma/js/sweetalert2@10.js"></script>


</body>

</html>