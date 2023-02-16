<?php
  require('MHeader.php');
?>  
   <section class="row page-header">
        <div class="container">
            <h1>Struktur Badan Usaha Mili Desa</h1>
        </div>
    </section>
    <section class="row team-content page-content">
        <div class="container">
            <div class="row team_members_row">
                <div class="col-sm-8">
                <h3 class="team_page_title">Jajaran Badan Usaha Milik Desa</h3>
                    <p class="team_page_para">Badan Usaha Milik Desa merupakan Badan yang bertujuan untuk menjalankan / memperdayakan usaha yang ada di desa</p>
                    <div class="row">
                        <?php
                        foreach($dataBumdes as $b){
                        ?>
                        <div class="col-xs-3 col-sm-4 col-md-3 team_member">
                            <img src="../foto/<?=$b['gambar']?>" alt="" class="img-responsive" style="height: 80%; margin-bottom: 20px;">
                            <h4><?=$b['namaAnggota']?></h4>
                            <h6><?=$b['jabatan']?></h6>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php
  require('MFooter.php');
?>    