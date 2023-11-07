<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Kontak</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Kontak</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Alamat</h3>
              <p><?=$dataDesa[0]['alamatDesa']?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><?=$dataKontak[0]['emailKontak']?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Kontak Kantor</h3>
              <p><?=$dataKontak[0]['nomorKontak']?></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-lg-6 ">
          <?=$dataDesa[0]['linkPetaDesa']?>
          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="ProsesKritikSaran" method="post">
              <div class="row gy-4">
                <div class="col-lg-6 form-group" style="margin-bottom:30px;">
                  <input type="text" name="nama" class="form-control" id="name" placeholder="Masukkan Nama" required>
                </div>
                <div class="col-lg-6 form-group" style="margin-bottom:30px;">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                </div>
              </div>
              <div class="form-group" style="margin-bottom:30px;">
                <input type="text" class="form-control" name="kritik" id="subject" placeholder="Masukkkan kritik" required>
              </div>
              <div class="form-group" style="margin-bottom:30px;">
                <textarea class="form-control" name="saran" rows="5" placeholder="Masukkan saran" required></textarea>
              </div style="margin-bottom:30px;">
              <div class="text-center"><button type="submit" style="background-color:green; border-radius:10px; border-color:green; padding:10px; color:white;">Send Message</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
  require('footer.php');
?>