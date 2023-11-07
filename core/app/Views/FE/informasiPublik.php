<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Rekapitulasi Informasi Publik</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Rekapitulasi Informasi Publik</li>
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
            <th scope="col">Tanggal</th>
            <th scope="col">Informasi Publik</th>
            <th scope="col">Author Informasi Publik</th>
            <th scope="col">Berkas</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no=0;
          foreach($dataInformasiPublik as $dp){
          $no++;  
          ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><?=$dp['tanggalUpload'];?></td>
            <td><?=$dp['namaInformasiPublik'];?></td>
            <td><?=$dp['authorInformasiPublik'];?></td>
            <td><a href="<?=base_url()?>/downloadInformasiPublik/<?= $dp['idInformasiPublik']?>" style="color:red;">Download</a><br></td>
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