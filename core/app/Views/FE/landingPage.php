<?php
require('header.php');
?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down">Selamat Datang di <br><span><?=$dataDesa[0]['namaDesa']?></span></h2><br>
            <!-- <p data-aos="fade-up">Disini Data Penyambutan di ambil dari database</p> -->
            <!-- <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Memulai Perjalanan</a> -->
          </div>
        </div>
      </div>
    </div>

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

      <div class="carousel-item active" style="background-image: url(carousel/<?=$dataCarousel[0]['gambar']?>)"></div>
      <?php
      foreach($dataCarousel as $dc){?>
        <div class="carousel-item" style="background-image: url(carousel/<?=$dc['gambar']?>)"></div>
      <?php
      }
      ?>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">
    <!-- ======= Alt Services Section ======= -->
    <section id="alt-services" class="alt-services">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h2>Tentang <?=$dataDesa[0]['namaDesa']?></h2>
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

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Data Statistik <?=$dataDesa[0]['namaDesa']?></h2>
          <p>Data Statistik didapat melalui data yang sudah di kumpulkan dalam satu database dan kemudian dikelola oleh sistem</p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Statistik Pendidikan Dalam Kartu Keluarga</h3>
              <p>Data statistik pendidikan dalam kartu keluarga merupakan data yang direkapitulasi berdasarkan data pendidikan yang tertera atau pun tercatatat di kartu keluarga</p>
              <a href="<?=base_url()?>/pendidikanDalamKK" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-trowel-bricks"></i>
              </div>
              <h3>Statistik Pekerjaan</h3>
              <p>Data statistik pekerjaan merupakan data yang sudah dikumpulkan oleh pihak pemerintah yang disimpan dalam sistem untuk dilakukan rekapitulasi</p>
              <a href="<?=base_url()?>/pekerjaan" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-helmet-safety"></i>
              </div>
              <h3>Statistik Agama</h3>
              <p>Data statistik agama merupakan data yang sudah direkapitulasi berdasarkan data yang sudah disimpan di dalam sistem dan dilakukan rekapitulasi data</p>
              <a href="<?=base_url()?>/agama" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fa-solid fa-arrow-up-from-ground-water"></i>
              </div>
              <h3>Statistik Jenis Kelamin</h3>
              <p>Data statistik jenis kelamin merupakan data yang sudah di rekapitulasi berdaksarkan data yang sudah disimpan di dalam sistem dan dilakukan rekapitulasi data</p>
              <a href="<?=base_url()?>/jenisKelamin" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Constructions Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <h2>Berita Terkini</h2>
          <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
        </div>

        <div class="row gy-5">
          <?php
          foreach($dataBerita as $db){?>
          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="post-item position-relative h-100">
              <div class="post-img position-relative overflow-hidden">
                <img src="berita/<?=$db['gambarBerita']?>" class="img-fluid" alt="">
                <span class="post-date"><?=$db['tanggalBerita']?></span>
              </div>
              <div class="post-content d-flex flex-column">
                <h3 class="post-title"><?=$db['judulBerita']?></h3>
                <div class="meta d-flex align-items-center">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2"><?=$db['authorBerita']?></span>
                  </div>
                </div>
                <hr>
                <a href="<?=base_url()?>/beritaKelurahanDetail/<?=$db['idBerita']?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End post item -->
          <?php
          }
          ?>
        </div>
    </section>
    <!-- End Recent Blog Posts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Struktur Pemerintah</h2>
          <p>Disini nanti berisi tentang foto jabatan, dan juga quote yang diberikan oleh masing2 pejabat</p>
        </div>

        <div class="slides-2 swiper">
          <div class="swiper-wrapper">
            <?php
            foreach($dataPemerintah as $dp){?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="foto/<?=$dp['gambar']?>" class="testimonial-img" alt="">
                  <h3><?=$dp['namaWarga']?></h3>
                  <h4><?=$dp['jabatan']?></h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <?=$dp['keterangan']?>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <?php
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->


    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Galeri Foto</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">

          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">  
            
            <?php
            foreach($dataGaleri as $dg){?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="galeri/<?=$dg['link']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?=$dg['judul']?></h4>
                  <a href="galeri/<?=$dg['link']?>" title="<?=$dg['judul']?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-eye"></i></a>
                </div>
              </div>
            </div><!-- End Projects Item -->
            <?php
            }
            ?>

          </div><!-- End Projects Container -->

        </div>

      </div>
    </section><!-- End Our Projects Section -->

    
    <!-- ======= Recent Blog Posts Section ======= -->
    
  </main><!-- End #main -->

<?php
require('footer.php');
?>