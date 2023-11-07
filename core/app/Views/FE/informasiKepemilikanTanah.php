<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Informasi Kepemilikan Tanah</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Informasi Kepemilikan Tanah</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
        <div class="section-header">
          <h2>Informasi Kepemilikan Tanah</h2>
          <p>Hai masyarakat kelurahan Galang Kota, silahkan cek validasi surat tanah anda di halaman ini, silahkan masukkan nomor surat yang terdaftar yaaa</p><br>
      
          <Form method="POST" action="ProsesPencarianSuratTanah">
            <input type="text" name="nomorSurat" placeholder="Silahkan Masukkan Nomor Surat Tanah" style="padding:10px;border-radius:10px;margin:20px;width:70%;">
            <button type="submit" style="padding:10px;border-radius:10px;background-color:orange;"><i class="bi bi-search"></i> Pencarian</button>
          </Form>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php
  require('footer.php');
?>