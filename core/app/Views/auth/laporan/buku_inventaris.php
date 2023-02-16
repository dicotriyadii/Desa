<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>

<head>

	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title><?= $title ?></title>

	<style type="text/css">
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
	<table cellspacing="0" border="0" x>

		<tr>
			<td colspan=8 align="center" valign=bottom bgcolor="#FFFFFF"><b>
					<font size=4 color="#000000">BUKU INVENTARIS</font>
				</b></td>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid #000000" height="21" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
			<td style="border-bottom: 2px solid #000000" align="left" valign=bottom>
				<font face="Times New Roman" color="#000000"><br></font>
			</td>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" height="35" align="center" valign=middle><b>
					<font color="#000000">NO</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">NAMA BARANG</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">ASAL BARANG</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">TANGGAL PENERIMAAN/PEMBELIAN</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">JUMLAH</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">TEMPAT PENYIMPANAN</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">KONDISI BARANG</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=middle><b>
					<font color="#000000">KETERANGAN</font>
				</b></td>
		</tr>
		<tr>
			<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" height="21" align="center" valign=bottom sdval="1" sdnum="1033;"><b>
					<font color="#000000">1</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="2" sdnum="1033;"><b>
					<font color="#000000">2</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="3" sdnum="1033;"><b>
					<font color="#000000">3</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="4" sdnum="1033;"><b>
					<font color="#000000">4</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="5" sdnum="1033;"><b>
					<font color="#000000">5</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="6" sdnum="1033;"><b>
					<font color="#000000">6</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="7" sdnum="1033;"><b>
					<font color="#000000">7</font>
				</b></td>
			<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="center" valign=bottom sdval="8" sdnum="1033;"><b>
					<font color="#000000">8</font>
				</b></td>
		</tr>
		<?php $i = 1 ?>
		<?php foreach ($list as $l) : ?>
			<tr>
				<td style="border-bottom: 2px solid #000000; border-left: 2px solid #000000; border-right: 2px solid #000000" height="21" align="left" valign=bottom>
					<font color="#000000"><?= $i++ ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['nama_barang'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['asal_barang'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= date('d-m-Y', strtotime($l['tgl'])) ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['jumlah'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['tempat_penyimpanan'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['kondisi_barang'] ?><br></font>
				</td>
				<td style="border-bottom: 2px solid #000000; border-right: 2px solid #000000" align="left" valign=bottom>
					<font color="#000000"><?= $l['keterangan'] ?><br></font>
				</td>
			</tr>
		<?php endforeach; ?>
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
				<font color="#000000">...........,<?= date('d') ?> - <?= date('m') ?> - <?= date('Y') ?></font>
			</td>
			<td align="left" valign=bottom>
				<font color="#000000"><br></font>
			</td>
		</tr>

	</table>
</body>

</html>