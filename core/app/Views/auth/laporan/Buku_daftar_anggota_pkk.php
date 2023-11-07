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
	<table cellspacing="0" border="0" width="100%">

		<tr>
			<td colspan=13 height="24" align="center" valign=bottom><b>
					<font face="Tahoma" size=4 color="#000000">BUKU DAFTAR ANGGOTA TP PKK DAN KADER </font>
				</b></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><b>
					<font color="#000000">Desa/Kel. : <?= $desa ?></font>
				</b></td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom><b>
					<font color="#000000">Kecamatan&nbsp;:&nbsp;<?= $kecamatan ?>&nbsp;</font>
				</b></td>

			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><b>
					<font color="#000000">Kab/Kota&nbsp;:&nbsp;<?= $kabupaten ?>&nbsp;</font>
				</b></td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom><b>
					<font color="#000000">Provinsi&nbsp;:&nbsp;<?= $provinsi ?>&nbsp;</font>
				</b></td>
			<td align="left" valign=bottom><b>
					<font color="#000000"><br></font>
				</b></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
		</tr>
		<tr>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">NO</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">NAMA</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">JENIS KELAMIN (L/P)</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle>
				<font color="#000000">KEDUDUKAN/ FUNGSI</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">TG/BL/ TH. LAHIR/ UMUR</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">STATUS</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">ALAMAT</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">PENDIDIKAN</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">PEKERJAAN</font>
			</td>
			<td style="border-top: 2px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" rowspan=3 align="center" valign=middle>
				<font color="#000000">KET</font>
			</td>
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>
				<font color="#000000">DALAM KEANGGOTAAN TP. PKK</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>
				<font color="#000000">KADER UMUM</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>
				<font color="#000000">KADER KHUSUS</font>
			</td>
		</tr>
		<tr>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3" sdnum="1033;">
				<font color="#000000">1</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="2" sdnum="1033;">
				<font color="#000000">2</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="3" sdnum="1033;">
				<font color="#000000">3</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="4" sdnum="1033;">
				<font color="#000000">4</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="5" sdnum="1033;">
				<font color="#000000">5</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="6" sdnum="1033;">
				<font color="#000000">6</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="7" sdnum="1033;">
				<font color="#000000">7</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="8" sdnum="1033;">
				<font color="#000000">8</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="9" sdnum="1033;">
				<font color="#000000">9</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="10" sdnum="1033;">
				<font color="#000000">10</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="11" sdnum="1033;">
				<font color="#000000">11</font>
			</td>
			<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle sdval="12" sdnum="1033;">
				<font color="#000000">12</font>
			</td>

		</tr>
		<?php $i = 1; ?>
		<?php foreach ($list as $l) : ?>
			<tr>
				<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 1px solid #000000" height="21" align="left" valign=bottom>
					<font color="#000000"><?= $i++ ?><br></font>
				</td>
	
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['namaWarga'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['jenisKelamin'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['jabatan'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['tempatLahir'] ?>, <?= $l['tanggalLahir'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['status'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['alamat'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['pendidikanTerakhir'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['pekerjaan'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-left: 1px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><br></font>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<!-- ************************************************************************** -->
</body>

</html>