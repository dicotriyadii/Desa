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
            <h1>Dasawisma</h1>
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
              <table width="35%" style="margin-top:2%;" border="0" >
                <tr>
                  <td width="1%">
                    <div class="card-footer" style="text-align:left; background-color:white;">
                      <a href="<?=base_url()?>/adminPKK" style="background-color:gray;padding:8px 10px;border-radius:10px;color:white;">Kembali</a>
                    </div>
                  </td>
                  <td width="34%" >
                    <div class="card-footer" style="text-align:left;background-color:white;">
                      <a href="" data-toggle="modal" data-target="#modalTambahPemerintahDesa" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Dasawisma</a>
                    </div>
                  </td>
                </tr>
              </table>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dasawisma</th>
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
                    <td><?= $no; ?></td>
                    <td><?= $d['nama_dasa_wisma'] ?></td>
                    <td>
                      <a href="<?=base_url()?>/hapusDasawisma/<?= $d['id']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
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
<!-- Modal -->
<div class="modal fade" id="modalTambahPemerintahDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Dasawisma</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahDasawisma" method="POST"  enctype="multipart/form-data">
          <label for="exampleInputEmail1">Nama Dasawisma<span style="color:red;">*</span></span></label>
          <input type="text" name="namaDasaWisma" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Dasawisma">
          <label for="exampleInputEmail1">Nama Dusun<span style="color:red;">*</span></span></label>
          <select name="kodeDusun" class="form-control">
            <option> - Silahkan Pilih Dusun - </option>
            <?php
            foreach($dataDusun as $dd){?>
            <option value="<?=$dd['idDusun']?>"><?=$dd['namaDusun']?></option>
            <?php
            }
            ?>
          </select>
          <label for="exampleInputEmail1">RT<span style="color:red;">*</span></span></label>
          <input type="text" name="RT" class="form-control" id="exampleInputEmail1" placeholder="Masukkan RT">
          <label for="exampleInputEmail1">RW<span style="color:red;">*</span></span></label>
          <input type="text" name="RW" class="form-control" id="exampleInputEmail1" placeholder="Masukkan RW">
        </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
  </div>
</div>
<?php
  require('AFooter.php');
?>  