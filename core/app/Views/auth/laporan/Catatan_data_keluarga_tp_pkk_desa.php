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
			<td height="25" align="left" valign=bottom><br></td>
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
			<td align="right" valign=bottom>
				<font size=4>Lampiran III - 17a</font>
			</td>
		</tr>
		<tr>
			<td colspan=35 height="45" align="center" valign=middle><b>
					<font size=6>CATATAN DATA DAN KEGIATAN WARGA </font>
				</b></td>
		</tr>
		<tr>
			<td colspan=35 height="35" align="center" valign=middle><b>
					<font size=5>TP PKK DESA/ KELURAHAN </font>
				</b></td>
		</tr>
		<tr>
			<td colspan=35 height="25" align="center" valign=middle>
				<font size=4>TAHUN <?= date('Y') ?></font>
			</td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>TP. PKK DESA/KEL</td>
			<td align="left" valign=bottom>:&nbsp;<?= $desa ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>KECAMATAN </td>
			<td align="left" valign=bottom>:&nbsp;<?= $kecamatan ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>KAB/ KOTA</td>
			<td align="left" valign=bottom>:&nbsp;<?= $kabupaten ?></td>
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
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom>PROVINSI </td>
			<td align="left" valign=bottom>:&nbsp;<?= $provinsi ?></td>
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
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 height="89" align="center" valign=middle>NO</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>NAMA DUSUN/ LINGKUNGAN</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JUML. RW</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JUML. RT</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JUML. DASA WISMA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JML. KRT</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JML KK</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=11 align="center" valign=middle>JUMLAH ANGGOTA KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle>JUMLAH RUMAH</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle>SUMBER AIR KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>MAKANAN POKOK</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=4 align="center" valign=middle>WARGA MENGIKUTI KEGIATAN</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>KET</td>
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>TOTAL</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>BALITA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PUS</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>WUS</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>IBU HAMIL</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>IBU MENYUSUI</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>LANSIA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>3 BUTA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>BERKE-BUTUHAN KHUSUS</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>SEHAT</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>TIDAK SEHAT</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI TMP. PEMB. SAMPAH</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI SPAL</td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI JAMBAN KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFFFF">MENEMPEL STIKER P4K</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PDAM</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>SUMUR</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>DLL</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 align="center" valign=middle>BERAS</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NON BERAS</td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>UP2K</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PEMANFAATAN TANAH PEKARANGAN</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>INDUSTRI RUMAH TANGGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>KESEHATAN LINGKUNGAN</td>
		</tr>
		<tr>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>L</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>P</td>
			<td align="center" valign=middle>L</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>P</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle><br></td>
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="center" valign=bottom sdval="1" sdnum="1033;">1</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="2" sdnum="1033;">2</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="3" sdnum="1033;">3</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="4" sdnum="1033;">4</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="5" sdnum="1033;">5</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="6" sdnum="1033;">6</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="7" sdnum="1033;">7</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="8" sdnum="1033;">8</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="9" sdnum="1033;">9</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="10" sdnum="1033;">10</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="11" sdnum="1033;">11</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="12" sdnum="1033;">12</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="13" sdnum="1033;">13</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="14" sdnum="1033;">14</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="15" sdnum="1033;">15</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="16" sdnum="1033;">16</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="17" sdnum="1033;">17</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="18" sdnum="1033;">18</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="19" sdnum="1033;">19</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="20" sdnum="1033;">20</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="21" sdnum="1033;">21</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="22" sdnum="1033;">22</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="23" sdnum="1033;">23</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="24" sdnum="1033;">24</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="25" sdnum="1033;">25</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="26" sdnum="1033;">26</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="27" sdnum="1033;">27</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="28" sdnum="1033;">28</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="29" sdnum="1033;">29</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="30" sdnum="1033;">30</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="31" sdnum="1033;">31</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="32" sdnum="1033;">32</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="33" sdnum="1033;">33</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=bottom sdval="34" sdnum="1033;">34</td>
		</tr>
		<?php $i = 1 ?>
		<?php foreach ($list as $l) : ?>
			<tr>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><?= $i++ ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['namaDusun'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><br></td>

				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_dasa_wisma'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_krt'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_kk'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_laki_laki'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_perempuan'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_balita_laki_laki'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_balita_perempuan'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_pus'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_wus'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_ibu_hamil'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_ibu_menyusui'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_lansia'] ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['jumlah_3_buta'] ?><br></td>


				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['jumlah_berkebutuhan_khusus'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom>
					<?= $l['jumlah_kriteria_rumah_sehat'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="16" sdnum="1033;">
					<?= $l['jumlah_kriteria_rumah_kurang_sehat'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_tempat_sampah'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_kriteria_memiliki_spal'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_jamban'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['jumlah_menempel_stiker'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
					<?= $l['jumlah_pdam'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_sumur'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['jumlah_lainnya'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_beras'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_non_beras'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['jumlah_up2k'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_pemanfaatan_tanah_perkarangan'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['jumlah_industri_rumah_tangga'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jumlah_kesehatan_lingkungan'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['keterangan'] ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<!-- ************************************************************************** -->
</body>

</html>