<?php
  require('AHeader.php');
  $status = $session->get('status');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Produk Hukum</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-footer" style="text-align:left; margin-top:15px;background-color:white;">
                <a href="<?= base_url()?>/formProdukHukum" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Produk Hukum</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk Hukum</th>
                    <th>Keterangan</th>
                    <th>Petugas</th>
                    <th>Tanggal Upload</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($data as $d){
                    $no++;
                    ?>
                  <tr>
                    <td><?=$no;?></td>
                    <td><?=$d['namaProdukHukum']?></td>
                    <td><?=$d['keterangan']?></td>
                    <td><?=$d['authorProdukHukum']?></td>
                    <td><?=$d['tanggalUpload']?></td>
                    <td>
                      <a href="<?=base_url()?>/downloadProdukHukum/<?= $d['idProdukHukum']?>" style="color:gray;">Download</a><br>
                      <a href="<?=base_url()?>/editProdukHukum/<?= $d['idProdukHukum']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusProdukHukum/<?= $d['idProdukHukum']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php
  require('AFooter.php');
?>  