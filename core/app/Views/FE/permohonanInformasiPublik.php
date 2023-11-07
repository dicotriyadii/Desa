<?php
  require('header.php');
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/bgHeader.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Permohonan Informasi Publik</h2>
        <ol>
          <li><a href="index.html">Beranda</a></li>
          <li>Permohonan Informasi Publik</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="sample-page">
      <div class="container">
        <div class="row justify-content-between gy-4">

          <div class="col-lg-20" data-aos="fade">
            <form action="ProsesTambahPermohonanInformasi" method="POST">
              <h2 align="center">FORM PERMOHONAN INFORMASI PUBLIK</h2>
              <p  align="center">Silahkan isi form dibawah ini untuk melakukan permohonan Informasi Publik</p>
              <div class="row gy-3">
                <div class="col-md-12">
                  <input type="text" name="nikPemohon" class="form-control" placeholder="Silahkan Masukkan Nomor Induk Kependudukan" required>
                </div>
                <div class="col-md-12 ">
                  <input type="text" class="form-control" name="namaPemohon" placeholder="Silahkan Masukkan Nama Lengkap" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="alamatPemohon" placeholder="Silahkan Masukkan Alamat" required>
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" name="pekerjaanPemohon" placeholder="Silahkan Masukkan Pekerjaan" required>
                </div>
                <div class="col-md-12">
                <input type="text" class="form-control" name="nomorTeleponPemohon" placeholder="Silahkan Masukkan Nomor Telepon" required>
                </div>
                <div class="col-md-12">
                <input type="text" class="form-control" name="emailPemohon" placeholder="Silahkan Masukkan Email" required>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="informasiPengajuan" rows="6" placeholder="Silahkan Masukkan Informasi Pengajuan" required></textarea>
                </div>
                <div class="col-md-12">
                  <textarea class="form-control" name="alasanPengajuan" rows="6" placeholder="Silahkan Masukkan Alasan Pengajuan" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                <div class="text-center"><button type="submit" style="background-color:orange; border-radius:10px; border-color:orange; padding:10px; color:black;">Kirim Permohonan</button></div>
                </div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

<?php
  require('footer.php');
?>