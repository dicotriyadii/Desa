<?php
  require('MHeader.php');
?>    
    <section >
        <div class="container">
            <h1>Data Agama Desa <?= $dataDesa[0]['namaDesa']?></h1>
        </div>
    </section>
    
    <section class="row blog-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    
                    <article class="post post-type-image single-post row">
                        <div style="width: 85%;height: 350px">
                            <canvas id="myChart"></canvas>
                        </div>
                        <div class="row article-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Agama</th>
                                    <th>Jumlah</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=0;
                                    foreach($dataAgama as $da){
                                    $no++;
                                    ?>
                                <tr>
                                    <td><?=$no;?></td>
                                    <td><?=$da['jenisAgama']?></td>
                                    <td><?=$da['jumlah']?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                </table>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 sidebar  post-sidebar">
                    
                    <div class="row m0 widget widget-recent-posts">
                        <h4 class="widget-title">recent post</h4>
                        <?php
                        foreach($dataBerita as $db){
                        ?>
                        <div class="media recent-post">
                            <div class="media-left"><a href="single.html"><img src="../berita/<?= $db['gambarBerita']?>" alt="" style="width:100px;"></a></div>
                            <div class="media-body">
                                <h5 class="title"><a href="<?=base_url()?>/detailBerita/<?=$db['idBerita']?>"><?= $db['judulBerita']?></a></h5>
                                <h5 class="date"><i class="fa fa-calendar-o"></i><a href="#"><?=$db['tanggalBerita']?></a></h5>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: [
                    <?php
                    foreach($dataAgama as $da){
                        echo '"'.$da['jenisAgama'].'",';
                    }
                    ?>
                ],
				datasets: [{
					label: 'Data Dusun',
					data: [
                        <?php
                        foreach($dataAgama as $da){
                        echo '"'.$da['jumlah'].'",';
                        }
                        ?>
                    ],
					backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<?php
  require('MFooter.php');
?>    