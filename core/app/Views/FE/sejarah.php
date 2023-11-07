<?php
  require('header.php')
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Sejarah</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Sejarah</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" style="background-image: url(assets/<?=$dataSejarah[0]['gambar']?>);"></div>

          <div class="col-lg-7">
            <h2>Sejarah Singkat <?=$dataDesa[0]['namaDesa']?></h2>
            <div class="our-story">
              <p><?=$dataSejarah[0]['keteranganSejarahDesa']?></p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End About Section -->
  </main><!-- End #main -->
<?php
  require('footer.php');
?>