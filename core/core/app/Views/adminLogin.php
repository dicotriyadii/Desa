<?php
	$session = session();
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Website Desa</title>
    <meta charset="utf-8">
	<link href="../assets/images/LogoDeliSerdang2.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assetsLogin/css/style.css">
	<!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../assetsLogin/images/background.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"><b>Administrator Website Desa</b></h3>
		      	<form action="ProsesLogin" class="signin-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
					</div>
					<div class="w-50 text-md-right">
						<!-- <a href="<?=base_url()?>/loginWarga" style="color: #fff">*Masuk Sebagai Warga</a> -->
						<a href="<?=base_url()?>/lupaPassword" style="color: #fff">Lupa Password ? </a>
					</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../assetsLogin/js/jquery.min.js"></script>
	<script src="../assetsLogin/js/popper.js"></script>
	<script src="../assetsLogin/js/bootstrap.min.js"></script>
	<script src="../assetsLogin/js/main.js"></script>

	<!-- Sweet Alert -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

	<?php 
	$dataSession = $session->get('statusTambah');
	$dataKeterangan = $session->get('keterangan');
	if($dataSession == "Berhasil"){ 
	?>
	<script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
	<?php 
	$arraySession = ['statusTambah','keterangan'];
	$session->remove($arraySession);
	}else if($dataSession == "Gagal"){
	?>
	<script> swal("Login Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
	<?php 
	$arraySession = ['statusTambah','keterangan'];
	$session->remove($arraySession);
	} 
	?>

	</body>
</html>

