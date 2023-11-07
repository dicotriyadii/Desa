<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Artikel</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Artikel</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 posts-list">

          <?php
          foreach($dataArtikel as $da){?>
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <img src="artikel/<?=$da['gambarArtikel']?>" class="img-fluid" alt="">
                <span class="post-date"><?=$da['tanggalArtikel']?></span>
              </div>
              <div class="post-content d-flex flex-column">
                <h3 class="post-title"><?=$da['judulArtikel']?></h3>
                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2"><?=$da['authorArtikel']?></span>
                  </div>
                </div>
                <hr>
                <a href="<?=base_url()?>/artikelKelurahanDetail/<?=$da['idArtikel']?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End post item -->
          <?php
          }
          ?>

        </div><!-- End blog posts list -->

        <div class="blog-pagination">
          <ul class="justify-content-center">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
          </ul>
        </div><!-- End blog pagination -->

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

<?php
  require('footer.php');
?>