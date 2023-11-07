  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-content position-relative">
      <div class="container">
        <div class="row" align="center">
            <h1 align="center">Denah Kantor <?=$dataDesa[0]['namaDesa']?></h1>
            <p style="font-size:20px;">Alamat Kantor : <b><?=$dataDesa[0]['namaDesa']?></b> 
            Nomor Telepon : <b><?=$dataKontak[0]['nomorKontak']?></b> | 
            Email         : <b><?=$dataKontak[0]['emailKontak']?></b></p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127425.16534449076!2d98.79767849460582!3d3.5791063222969113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30314bbaead4318b%3A0x24134d1812ddae96!2sKantor%20kapala%20desa!5e0!3m2!1sid!2sid!4v1687082900611!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          
        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span><?=$dataDesa[0]['namaDesa']?></span></strong>. All Rights Reserved
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets/vendor/aos/aos.js"></script>
  <script src="assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/assets/vendor/tinymce/tinymce.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/assets/js/main.js"></script>
  <script src="assets/assets/js_tambahan/main.js"></script>

  <!-- Sweet Alert -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

  <?php 
  $session = session();
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