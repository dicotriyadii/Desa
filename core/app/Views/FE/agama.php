<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Rekapitulasi Agama</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Rekapitulasi Agama</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
      <div class="section-header">
          <h2>Rekapitulasi Agama</h2>
        </div>
        <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Jenis Agama</th>
            <th scope="col">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          for($i=1;$i<7;$i++){
          $no++;
          ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><?=$rekapitulasidataAgama[$i]['jenisAgama'];?></td>
            <td><?=$rekapitulasidataAgama[$i]['jumlah'];?></td>
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