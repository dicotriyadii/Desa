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
            <h1>Data Wilayah Administratif</h1>
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
                    <th>Nama Dusun</th>
                    <th>Jumlah Laki - Laki</th>
                    <th>Jumlah Perempuan</th>
                    <th>Total Warga</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  for($i=1;$i<21;$i++){?>
                  <tr>
                    <td><?=$i?></td>
                    <td>DUSUN <?=$i?></td>
                    <td><?= $dataRekapitulasi['DUSUN'.$i]['jumlahWargaDusun'.$i.'Laki']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUN'.$i]['jumlahWargaDusun'.$i.'Perempuan']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUN'.$i]['jumlahWargaDusun'.$i]?> Orang</td>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td>21</td>
                    <td>DUSUN Mawar</td>
                    <td><?= $dataRekapitulasi['DUSUNMawar']['jumlahWargaDusunMawarLaki']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUNMawar']['jumlahWargaDusunMawarPerempuan']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUNMawar']['jumlahWargaDusunMawar']?> Orang</td>
                  </tr>
                  <tr>
                  <td>22</td>
                  <td>DUSUN Melati</td>
                    <td><?= $dataRekapitulasi['DUSUNMelati']['jumlahWargaDusunMelatiLaki']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUNMelati']['jumlahWargaDusunMelatiPerempuan']?> Orang</td>
                    <td><?= $dataRekapitulasi['DUSUNMelati']['jumlahWargaDusunMelati']?> Orang</td>
                  </tr>
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