    <section class="row newsletter_signup">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Kritik & Saran</h4>
                    <p>Silahkan kirim kritik dan saran anda untuk kemajuan desa kita</p>
                </div>
                <form class="col-sm-7 form-inline newsletter_signup_form" action="ProsesKritikSaran" method="post">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" style="width:500px; margin-bottom:10px;">
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" style="width:500px; margin-bottom:10px;">
                    <textarea name="kritik" class="form-control" placeholder="Masukkan Kritik" style="width:500px; height:60px; margin-bottom:10px;"></textarea>
                    <textarea name="saran" class="form-control" placeholder="Masukkan Saran" style="width:500px; height:60px; margin-bottom:10px;"></textarea>
                    <input type="submit" value="submit" class="btn-primary white">
                </form>
            </div>
        </div>
    </section>

<footer class="row footer" style="background-color:black; color:white;">
        <div class="container">
            <div class="row footer_sidebar">
                <div class="widget widget-contact col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title">Kontak Desa <?=$dataDesa[0]['namaDesa']?></h6>
                    <address style="color:white;">
                        Kontak dan Sosial Media Desa <?=$dataDesa[0]['namaDesa']?> bisa di akses melalui kontak di bawah ini
                        <br><br>
                        <a class="social-media-icon" href="https://www.waweb.com"><span class="fab fa-whatsapp" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.facebook.com"><span class="fab fa-facebook" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.instagram.com"><span class="fab fa-instagram" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.youtube.com/@kabdeliserdang/videos"><span class="fab fa-youtube" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                    </address>
                </div>
                <div class="widget widget-recent-posts col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title">Layanan Desa</h6>
                    <ul class="nav recent-posts" >
                        <li ><a href="<?=base_url();?>/dataWargaNegara" style="color:white;">Data Warga Negara</a></li>     
                        <li ><a href="<?=base_url();?>/loginWarga" style="color:white;">Permohonan Surat</a></li>     
                        <li ><a href="<?=base_url();?>/produkHukum" style="color:white;">Produk Hukum</a></li>
                        <li ><a href="<?=base_url();?>/informasiPublik" style="color:white;">Informasi Publik</a></li>          
                    </ul>
                </div>
                <div class="widget widget-recent-tweets col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title" style="background-color:#dd482d;">Peta Desa</h6>
                    <div class="tweet m0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31863.01901843285!2d98.87133929887119!3d3.3801291234288904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303141d8238210db%3A0xe619252c567660d5!2sBandar%20Kwala%2C%20Kec.%20Galang%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1672799010854!5m2!1sid!2sid" width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row copyright_area m0">
            <div class="container">
                <div class="copy_inner row">
                    <div class="col-sm-7 copyright_text" style="color:white; width:1200px;">Copyright &copy; 2023 Dinas Komunikasi, Informatikan, Statistik dan Persandian Kabupaten Deli Serdang, Sumatera Utara. All Rights Reserved</div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="jassets/s/bootstrap.min.js"></script>
    <!--Magnific Popup-->
    <script src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--Owl Carousel-->
    <script src="assets/vendors/owl.carousel/owl.carousel.min.js"></script>
    <!--CounterUp-->
    <script src="assets/vendors/couterup/jquery.counterup.min.js"></script>
    <!--WayPoints-->
    <script src="assets/vendors/waypoint/waypoints.min.js"></script>
    <!--Theme Script-->    
    <script src="assets/js/theme.js"></script>
    
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