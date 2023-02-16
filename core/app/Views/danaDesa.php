<?php
    function rupiah($angka){	
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
    require('MHeader.php');
?>    
    
    <section class="row content_about page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 who_we_are">
                    <h3 class="team_page_title">Dana Desa <?= $dataDesa[0]['namaDesa']?></h3>
                    <h2>Pendapatan</h2>
                    <table width="100%">
                        <tr>
                            <th>Anggaran</th>
                            <th>Realisasi</th>
                        </tr>
                        <tr>
                            <td><?=rupiah($ppa[0]['jumlah'])?></td>
                            <td><?=rupiah($ppr[0]['jumlah'])?></td>
                        </tr>
                    </table>
                    <h2>Pembelanjaan</h2>
                    <table width="100%">
                        <tr>
                            <th>Anggaran</th>
                            <th>Realisasi</th>
                        </tr>
                        <tr>
                            <td><?=rupiah($ppa2[0]['jumlah'])?></td>
                            <td><?=rupiah($ppr2[0]['jumlah'])?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6 history">
                    <div class="history_carousel">
                        <div class="item">
                            <h3 class="year">Dana Pendapatan Realisasi Desa <?= $dataDesa[0]['namaDesa']?></h3>
                            <?php
                            foreach($danaPendapatanRealisasi as $pendapatan){?>
                            <h2><?=$pendapatan['jenisPendapatan']?></h2>
                            <table width="100%">
                                <tr>
                                    <td><?=rupiah($pendapatan['jumlah'])?></td>
                                </tr>
                            </table>                            
                            <?php
                            }
                            ?>
                        </div>
                        <div class="item">
                            <h3 class="year">Dana Pendapatan Anggaran Desa <?= $dataDesa[0]['namaDesa']?></h3>
                            <?php
                            foreach($danaPendapatanAnggaran as $pendapatan){?>
                            <h2><?=$pendapatan['jenisPendapatan']?></h2>
                            <table width="100%">
                                <tr>
                                    <td><?=rupiah($pendapatan['jumlah'])?></td>
                                </tr>
                            </table>                            
                            <?php
                            }
                            ?>
                        </div>
                        <div class="item">
                            <h3 class="year">Dana Pembelanjaan Realisasi Desa <?= $dataDesa[0]['namaDesa']?></h3>
                            <?php
                            foreach($danaPembelanjaanRealisasi as $pembelanjaan){?>
                            <h2><?=$pembelanjaan['jenisPembelanjaan']?></h2>
                            <table width="100%">
                                <tr>
                                    <td><?=rupiah($pembelanjaan['jumlah'])?></td>
                                </tr>
                            </table>                            
                            <?php
                            }
                            ?>
                        </div>
                        <div class="item">
                            <h3 class="year">Dana Pembelanjaan Anggaran Desa <?= $dataDesa[0]['namaDesa']?></h3>
                            <?php
                            foreach($danaPembelanjaanAnggaran as $pembelanjaan){?>
                            <h2><?=$pembelanjaan['jenisPembelanjaan']?></h2>
                            <table width="100%">
                                <tr>
                                    <td><?=rupiah($pembelanjaan['jumlah'])?></td>
                                </tr>
                            </table>                            
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
<?php
  require('MFooter.php');
?>    