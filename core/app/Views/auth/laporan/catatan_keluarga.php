<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?= $title ?></title>

	<style type="text/css">
		* {
			font-family: DejaVu Sans !important;
		}

		body,
		div,
		table,
		thead,
		tbody,
		tfoot,
		tr,
		th,
		td,
		p {
			font-family: "Calibri";
			font-size: x-small
		}

		a.comment-indicator:hover+comment {
			background: #ffd;
			position: absolute;
			display: block;
			border: 1px solid black;
			padding: 0.5em;
		}

		a.comment-indicator {
			background: red;
			display: inline-block;
			border: 1px solid black;
			width: 0.5em;
			height: 0.5em;
		}

		comment {
			display: none;
		}
	</style>

</head>

<body>
	<table cellspacing="0" border="0">
		<tr>
			<td height="28" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="right" valign=bottom><b>
					<font size=4>Lampiran III - 15</font>
				</b></td>
		</tr>
		<tr>
			<td colspan=19 height="28" align="center" valign=bottom><b>
					<font size=4>CATATAN KELUARGA</font>
				</b></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>CATATAN&nbsp;KELUARGA&nbsp;DARI</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>:&nbsp;<?= $nama_warga ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>KRITERIA RUMAH</td>
			<td align="left" valign=bottom>: <?= $data_warga['jenis_kriteria_rumah'] ?> </td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>ANGGOTA&nbsp;KELOMPOK&nbsp;DASA WISMA</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>:&nbsp;<?= $nama_user ?>&nbsp;</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>JAMBAN&nbsp;KELUARGA</td>
			<td align="left" valign=bottom>: Ada, Jumlah : 2 Buah</td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>TAHUN</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>:&nbsp;<?= date('Y') ?>&nbsp;</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>SUMBER AIR</td>
			<td align="left" valign=bottom>: <?= $data_warga['jenis_sumber_air'] ?></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="21" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>TEMPAT SAMPAH</td>
			<td align="left" valign=bottom>: <?= $data_warga['jenis_tempat_sampah'] ?></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td style="border-top: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=4 height="102" align="center" valign=middle>NO</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>NAMA ANGGOTA KELUARGA</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>STATUS PERKAWINAN</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>L / P</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>TEMPAT LAHIR</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>TGL/BL/TH LAHIR/ UMUR</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>AGAMA</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>PENDIDIKAN</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>PEKERJAAN</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=4 align="center" valign=middle>BERKE-BUTUHAN KHUSUS</td>
			<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=8 rowspan=2 align="center" valign=middle>KEGIATAN PKK YANG DIIKUTI</td>
			<td style="border-top: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" rowspan=4 align="center" valign=middle>KET </td>
		</tr>
		<tr>
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PENGHAYATAN DAN PENGAMALAN PANCASILA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>GOTONG ROYONG</td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PENDIDIKAN DAN KETRAMPILAN</td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>
					<font size=3 color="#FF0000">PENGEMBANGAN KEHIDUPAN BERKOPERASI</font>
				</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>
					<font size=3 color="#FF0000">PANGAN</font>
				</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>
					<font size=3 color="#FF0000">SANDANG</font>
				</b></td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>
					<font size=3 color="#FF0000">KESEHATAN</font>
				</b></td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle><b>
					<font size=3 color="#FF0000">PERENCANAAN SEHAT</font>
				</b></td>
		</tr>
		<tr>
		</tr>
		<tr>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="center" valign=bottom sdval="1" sdnum="1033;">1</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="2" sdnum="1033;">2</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="3" sdnum="1033;">3</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="4" sdnum="1033;">4</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="5" sdnum="1033;">5</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="6" sdnum="1033;">6</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="7" sdnum="1033;">7</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="8" sdnum="1033;">8</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="9" sdnum="1033;">9</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="10" sdnum="1033;">10</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="11" sdnum="1033;">11</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="12" sdnum="1033;">12</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="13" sdnum="1033;">13</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="14" sdnum="1033;">14</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="15" sdnum="1033;">15</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="16" sdnum="1033;">16</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="17" sdnum="1033;">17</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="18" sdnum="1033;">18</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="19" sdnum="1033;">19</td>
		</tr>

		<?php $i = 1 ?>
		<?php foreach ($list as $l) : ?>
			<?php if ($l['nomorKartuKeluarga'] == $nomor_kk) : ?>
				<tr>
					<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom><?= $i++ ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['namaWarga'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['statusKawin'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jenisKelamin'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['tempatLahir'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['tanggalLahir'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['agama'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['pendidikanTerakhir'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['pekerjaan'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['berkebutuhan_khusus'] ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							V
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
							-
						<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
							<?= $l['nama_kegiatan'] ?>
						<?php else : ?>
							-
						<?php endif; ?><br></td>
					<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom><?= $l['keterangan'] ?><br></td>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>

	</table>
	<table>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><b>Keterangan:</b></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>


		<tr>
			<td height="20" align="left" valign=bottom>Kolom&nbsp;2:&nbsp;Diisi&nbsp;dengan&nbsp;nama&nbsp;seluruh&nbsp;anggota&nbsp;keluarga&nbsp;yang&nbsp;ada&nbsp;dalam&nbsp;rumah&nbsp;tangga</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 3: Diisi dengan Menikah, Lajang, Cerai Mati, Cerai Hidup</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 4: Diisi dengan jenis kelamin laki-laki/perempuan</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 10: Diisi dengan kondisi anggota keluarga (Cacat mental, cacat fisik, dsb)</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 11-18: Diisi dengan jenis kegiatan yang diikuti oleh masing-masing anggota keluarga</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 11: Diisi dengan Kegiatan keagamaan, PKBN, Pola Asuh, Pencegahan KDRT, Pencegahan Trafficking, Narkoba, Pencegahan kejahatan seksual yang diikuti oleh anggota keluarga. </td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 12: Diisi dengan Kegiatan kerja bakti, jimpitan, arisan, rukun kematian, bakti sosial, dsb, yang diikuti oleh anggota keluarga.</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 13: Diisi dengan Kegiatan BKB, PAUD sejenis, Paket ABC, KF yang dikuti oleh anggota keluarga </td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 14: Diisi dengan Kegiatan UP2K, KOPERASI, yang dikuti oleh anggota keluarga </td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 15: Diisi dengan jenis makanan pokok (beras/non beras/pangan lokal) anggota keluarga dan pemanfaatan halaman pekarangan yang dilakukan oleh anggota keluarga </td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 16: Diisi dengan kegiatan usaha yang berkaitan dengan usaha sandang</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 17: Diisi dengan anggota keluarga yang mengikuti kegiatan Posyandu Balita/Lansia dan PHBS, dan kegiatan kesehatan lainnya.</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 18: Diisi dengan anggota keluarga yang mengikuti program KB, menjadi peserta BPJS Kesehatan, menabung untuk masa depan keluarga. </td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>Kolom 19: Diisi dengan hal-hal yang belum tercantum dalam kolom-kolom sebelumnya</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
	</table>
	<!-- ************************************************************************** -->
</body>

</html>