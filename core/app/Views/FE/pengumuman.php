<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Pengumuman</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Pengumuman</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
      <div class="section-header">
          <h2>Pengumuman</h2>
          <p>Disini nanti berisi tentang foto jabatan, dan juga quote yang diberikan oleh masing2 pejabat</p>
        </div>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">tanggal</th>
            <th scope="col">pengumuman</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          foreach($dataPengumuman as $dp){
          $no++;  
          ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><?=$dp['tanggalPengumuman'];?></td>
            <td><?=$dp['pengumuman'];?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  require('footer.php');
?>