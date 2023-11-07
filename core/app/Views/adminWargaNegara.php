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
            <h1>Data Warga Negara</h1>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Pendidikan Ditempuh</th>
                    <th>Pekerjaan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                      foreach($data as $d) {
                      $no++;
                    ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?=$d['namaWarga']?></td>
                    <td><?=$d['jenisKelamin']?></td>
                    <td><?=$d['agama']?></td>
                    <td><?=$d['pendidikanTerakhir']?></td>
                    <td><?=$d['pendidikanDitempuh']?></td>
                    <td><?=$d['pekerjaan']?></td>
                    <td>
                      <a href="<?=base_url()?>/adminDetailWarga/<?= $d['idWarga']?>" style="color:grey;">Detail</a><br>
                      <a href="<?=base_url()?>/formTambahWargaEdit/<?= $d['idWarga']?>" style="color: green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusWarga/<?= $d['idWarga']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                    </div>
                  </div>
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