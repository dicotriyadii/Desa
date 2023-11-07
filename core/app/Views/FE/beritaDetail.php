<?php
  require('headerDetail.php');
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Detail Berita</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Detail Berita</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="<?=base_url()?>/berita/<?=$dataDetailBerita[0]['gambarBerita']?>" alt="" class="img-fluid">
              </div>

              <h2 class="title"><?=$dataDetailBerita[0]['judulBerita']?></h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?=$dataDetailBerita[0]['authorBerita']?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?=$dataDetailBerita[0]['tanggalBerita']?></time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
              <?=$dataDetailBerita[0]['keterangan']?>
              </div><!-- End post content -->
            </article><!-- End blog post -->

          </div>

          <div class="col-lg-4">

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

<?php
  require('footerDetail.php');
?>