<?php
	$session = session();
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
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
					<h3 class="mb-4 text-center"><b>Lupa Password</b></h3>
					<form action="ProsesLupaPassword" class="signin-form" method="POST">
					<div class="form-group">
						<input type="text" name="username" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
					<h3 class="mb-4 text-center">Pertanyaan</h3>
					<select class="form-control" name="pertanyaanLupaPassword">
						<option style="color:black;"></option>
						<option style="color:black;" value="Nama panggilan waktu kecil"> Nama panggilan waktu kecil ? </option>
						<option style="color:black;" value="Asal Sekolah pada saat Taman Kanak Kanak"> Asal Sekolah pada saat Taman Kanak Kanak ? </option>
					</select>
					</div>
					<div class="form-group">
						<input type="text" name="jawabanLupaPassword" class="form-control" placeholder="Masukkan Jawaban" required>
					</div>
					<div class="form-group">
						<input type="text" name="passwordBaru" class="form-control" placeholder="Masukkan password baru" required>
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary submit px-3">Submit</button>
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
	<script> swal("Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
	<?php 
	$arraySession = ['statusTambah','keterangan'];
	$session->remove($arraySession);
	} 
	?>

	</body>
</html>

