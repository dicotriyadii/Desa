<?php
  require('header.php');
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Visi Dan Misi</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Visi dan Misi</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h2>Tentang Kami</h2>
          <p><?=$dataDesa[0]['namaDesa']?> Merupakan Kelurahan yang ada di Kabupaten Deli Serdang</p>
        </div>

        <div class="row justify-content-around gy-4">
          <div class="col-lg-6 img-bg" style="background-image: url(assets/<?=$dataVisiMisi[0]['gambar'];?>);" data-aos="zoom-in" data-aos-delay="100"></div>

          <div class="col-lg-5 d-flex flex-column justify-content-center">
            <h3>Visi <?=$dataDesa[0]['namaDesa']?></h3>
            <p><?=$dataVisiMisi[0]['visi'];?></p>

            <h3>Misi <?=$dataDesa[0]['namaDesa']?></h3>
            <p><?=$dataVisiMisi[0]['misi'];?></p>
          </div>
        </div>

      </div>
    </section><!-- End Alt Services Section -->

  </main><!-- End #main -->

<?php
  require('footer.php');
?>