<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Rekapitulasi Sesuai Jenis Kelamin</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Rekapitulasi Sesuai Jenis Kelamin</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
      <div class="section-header">
          <h2>Rekapitulasi Berdasarkan Jenis Kelamin</h2>
        </div>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          for($i=1;$i<3;$i++){
          $no++;
          ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><?=$rekapitulasidataKelamin[$i]['jenisKelamin'];?></td>
            <td><?=$rekapitulasidataKelamin[$i]['jumlah'];?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <span style="font-weight:italic;"><i>* Seluruh Rekapitulasi Data Bersumber Dari Dinas Kependudukan dan Catatan Sipil Kabupaten Deli Serdang</i></span>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  require('footer.php');
?>