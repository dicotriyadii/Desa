    
<section class="row newsletter_signup">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Kritik & Saran</h4>
                    <p>Silahkan kirim kritik dan saran anda untuk kemajuan desa kita</p>
                </div>
                <form class="col-sm-7 form-inline newsletter_signup_form" action="index.php/ProsesKritikSaran" method="post">
                    <input type="text" name="namaWarga" class="form-control" placeholder="Masukkan Nama" style="width:500px; margin-bottom:10px;">
                    <input type="text" name="namaWarga" class="form-control" placeholder="Masukkan Email" style="width:500px; margin-bottom:10px;">
                    <textarea class="form-control" placeholder="Masukkan Kritik dan Saran" style="width:500px; height:100px; margin-bottom:10px;"></textarea>
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
                        <a class="social-media-icon" href="https://wa.me/<?=$dataKontak[0]['nomorKontak']?>"><span class="fab fa-whatsapp" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.facebook.com/<?=$dataKontak[0]['facebookKontak']?>/"><span class="fab fa-facebook" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.instagram.com/<?=$dataKontak[0]['instagramKontak']?>/"><span class="fab fa-instagram" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.youtube.com/<?=$dataKontak[0]['youtubeKontak']?>/"><span class="fab fa-youtube" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
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
                    <?=$dataDesa[0]['linkPetaDesa']?>
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
    
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <!--Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="../assets/js/gmaps.min.js"></script>
    <!--Bootstrap Select-->
    <script src="../assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!--Magnific Popup-->
    <script src="../assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--Owl Carousel-->
    <script src="../assets/vendors/owl.carousel/owl.carousel.min.js"></script>
    <!--CounterUp-->
    <script src="../assets/vendors/couterup/jquery.counterup.min.js"></script>
    <!--WayPoints-->
    <script src="../assets/vendors/waypoint/waypoints.min.js"></script>
    <!--Isotope & ImagesLoaded-->
    <script src="../assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../assets/vendors/isotope/isotope.min.js"></script>
    <!--Theme Script-->    
    <script src="../assets/js/theme.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="../assetsAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/jszip/jszip.min.js"></script>
    <script src="../assetsAdmin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assetsAdmin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
</body>
</html>