<?php
  require('header.php')
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Potensi Unggulan</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Potensi Unggulan</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
      <div class="container" data-aos="fade-up">

        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
          
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php
            foreach($dataPotensiUnggulan as $dpu){?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
              <div class="portfolio-content h-100">
                <img src="potensi/<?=$dpu['gambar']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <!-- <a href="potensi/<?=$dpu['gambar']?>" align="center"; data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-eye"></i></a> -->
                  <h4 style="color:black; font-size:12px;">Nama Produk   : <?=$dpu['namaPotensi']?></h4><br>
                  <h4 style="color:black; font-size:12px;">Jenis Potensi : <?=$dpu['jenisPotensi']?></h4><br>
                  <h4 style="color:black; font-size:12px;">Alamat        : <?=$dpu['alamatPotensi']?></h4><br>
                  <h4 style="color:black; font-size:12px;">Nomor Telepon : <?=$dpu['helpdesk']?></h4>
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

  </main><!-- End #main -->

<?php
  require('footer.php')
?>