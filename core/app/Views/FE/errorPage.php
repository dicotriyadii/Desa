<?php
$session = session();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Desa Digital Kabupaten Deli Serdang</title>
  <style>
  body {
    background-image: url("assets/errorPage.png");
    background-repeat: no-repeat;
    background-size:cover
  }
</style>
  <link href="assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">
  <link href="assets/images/LogoDeliSerdang2.png" rel="icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>
<body>
  <div>
    <a href="<?=base_url();?>/loginAdmin"> Klik disini untuk menuju Halaman Admin</a>
  </div>
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
}else if($dataSession == "Peringatan"){
  ?>
    <script> swal("Peringatan ! ", "<?= $dataKeterangan; ?>", "warning"); </script>
  <?php 
  $arraySession = ['statusTambah','keterangan'];
  $session->remove($arraySession);
  }  
?>
</body>
</html>