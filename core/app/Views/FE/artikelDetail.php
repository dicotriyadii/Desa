<?php
  require('headerDetail.php');
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Detail Artikel</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Detail Artikel</li>
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
              <img src="<?=base_url()?>/artikel/<?=$dataDetailArtikel[0]['gambarArtikel']?>" alt="" class="img-fluid">
            </div>

            <h2 class="title"><?=$dataDetailArtikel[0]['judulArtikel']?></h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?=$dataDetailArtikel[0]['authorArtikel']?></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?=$dataDetailArtikel[0]['tanggalArtikel']?></time></a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
            <?=$dataDetailArtikel[0]['keterangan']?>
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