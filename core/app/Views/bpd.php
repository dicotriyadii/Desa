<?php
  require('MHeader.php');
?>  
   <section class="row page-header">
        <div class="container">
            <h1>Struktur Organisasi LPM</h1>
        </div>
    </section>
    <section class="row team-content page-content">
        <div class="container">
            <div class="row team_members_row">
                <div class="col-sm-8">
                <h3 class="team_page_title">Jajaran Badan Permusyawaratan Desa</h3>
                    <p class="team_page_para">Badan Permusyawaratan Desa merupakan Badan yang bertujuan untuk menjalankan / memperdayakan masyarakat di desa</p>
                    <div class="row">
                        <?php
                        foreach($dataBPD as $dl){
                        ?>
                        <div class="col-xs-3 col-sm-4 col-md-3 team_member">
                            <img src="../foto/<?=$dl['gambar']?>" alt="" class="img-responsive" style="height: 80%; margin-bottom: 20px;">
                            <h4><?=$dl['namaAnggota']?></h4>
                            <h6><?=$dl['jabatan']?></h6>
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