<?php
  require('header.php');
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Struktur Pembina Kesejahteraan Keluarga</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Struktur Pembina Kesejahteraan Keluarga</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Struktur Pembina Kesejahteraan Keluarga</h2>
          <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
        </div>

        <div class="row gy-5">
          
          <?php
          foreach($dataPKK as $dp){?>
          <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
            <div class="member-img">
              <img src="foto/<?=$dp['gambar']?>" class="img-fluid" alt="">
              <div class="social">
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info text-center">
              <h4><?=$dp['namaWarga'];?></h4>
              <span><?=$dp['jabatan'];?></span>
              <p><?=$dp['keterangan']?></p>
            </div>
          </div><!-- End Team Member -->
          <?php
          }
          ?>

        </div>

      </div>
    </section><!-- End Our Team Section -->

  </main><!-- End #main -->

<?php
  require('footer.php');
?>