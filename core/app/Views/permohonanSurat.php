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
            <h1>Permohonan Pembuatan Surat</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <a href="<?=base_url()?>/daftarPermohonan" style="border: 0px solid black; padding:10px; margin:0 0 5px 0; border-radius:5px; background-color:green; color:white;">Daftar Permnohonan</a><br><br>
                        <label>Jenis Permohonan Surat</label>
                        <select name="jenisKelamin" class="form-control select2" style="width: 100%;" id="permohonan" required>
                        <option value="-"> - </option>
                        <?php
                        foreach($dataJenisPermohonan as $d){?>
                        <option value="<?= $d['idPermohonan']?>"><?= $d['jenisPermohonan']?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            </div>
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
        foreach($dataJenisPermohonan as $d){?>
        <form class="form-horizontal" action="ProsesPermohonan" method="POST"  enctype="multipart/form-data">
        <div class="card card-default" id="<?=$d['idPermohonan'];?>">
          <div class="card-body">
          <!-- <form class="form-horizontal" action="ProsesTambahWarga" method="POST"  enctype="multipart/form-data"> -->
            <h3>Berkas Yang diperlukan</h3>
            <table width="100%">
              <tr>
                <td>
                  <?php 
                   $nilaiArray = $d['idPermohonan'] - 1;
                   $json = $dataJenisPermohonan[$nilaiArray]['berkas'];
                   $data = json_decode($json);
                   if($data == null){
                    $jumlahData = 0;
                   }else{
                    $jumlahData = count($data);
                   }
                   $no = 0;
                   for($i=0; $i<$jumlahData; $i++){
                    $no++;
                    ?>
                    <?=$no?>.
                    <?= $data[$i]?> <br>
                  <?php
                   }
                  ?>
                  <span style="color:red; font-size:13px;">
                   NB : Seluruh berkas yang di upload dijadikan menjadi satu
                  </span>
                </td>
              </tr>
            </table>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Berkas</label><br>
                    <input type="file" name="file" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">keterangan</label>
                    <textarea class="form-control" name="keterangan" style="height:100px;"></textarea>
                    <input type="text" name="jenisPermohonan" value="<?= $d['jenisPermohonan'];?>" hidden>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer" style="text-align:right;">
            <button type="submit" class="btn btn-primary" style="background-color:red; border-color: red;">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
          <!-- </form> -->
        </div>
        <?php
        }
        ?>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
<script>
$(document).ready(function(){ 
  $("select[id=permohonan]").on("change", function() { 
    if ($(this).val() === "-") {
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "1") { 
      $("div[id=1]").show(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "2") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").show(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "3") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").show(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "4") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").show(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "5") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").show(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "6") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").show(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "7") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").show(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "8") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "9") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").show();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "10") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").show();
      $("div[id=11]").hide();
      $("div[id=12]").hide();
    } else if ($(this).val() === "11") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").show();
      $("div[id=12]").hide();
    } else if ($(this).val() === "12") { 
      $("div[id=1]").hide(); 
      $("div[id=2]").hide(); 
      $("div[id=3]").hide(); 
      $("div[id=4]").hide(); 
      $("div[id=5]").hide(); 
      $("div[id=6]").hide(); 
      $("div[id=7]").hide(); 
      $("div[id=8]").hide(); 
      $("div[id=9]").hide();
      $("div[id=10]").hide();
      $("div[id=11]").hide();
      $("div[id=12]").show();
    } 
  }); 
  $("select[id=permohonan]").trigger("change");
});
</script>
<?php
  require('AFooter.php');
?>  