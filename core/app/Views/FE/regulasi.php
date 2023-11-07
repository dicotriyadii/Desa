<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Regulasi</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Regulasi</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
      <div class="section-header">
          <h2>Regulasi</h2>
          <!-- <p>Disini nanti berisi tentang foto jabatan, dan juga quote yang diberikan oleh masing2 pejabat</p> -->
        </div>
      <table class="table datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Regulasi</th>
            <th scope="col">Author Regulasi</th>
            <th scope="col">Berkas</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          foreach($dataProdukHukum as $dp){
          $no++;  
          ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><?=$dp['tanggalUpload'];?></td>
            <td><?=$dp['namaProdukHukum'];?></td>
            <td><?=$dp['authorProdukHukum'];?></td>
            <td><a href="<?=base_url()?>/downloadProdukHukum/<?= $dp['idProdukHukum']?>" style="color:red;">Download</a><br></td>
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