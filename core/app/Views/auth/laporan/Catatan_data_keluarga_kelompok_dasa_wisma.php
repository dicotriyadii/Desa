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
		<colgroup width="46"></colgroup>
		<colgroup width="170"></colgroup>
		<colgroup width="60"></colgroup>
		<colgroup span="2" width="37"></colgroup>
		<colgroup span="2" width="36"></colgroup>
		<colgroup width="35"></colgroup>
		<colgroup width="40"></colgroup>
		<colgroup width="56"></colgroup>
		<colgroup width="87"></colgroup>
		<colgroup width="72"></colgroup>
		<colgroup width="55"></colgroup>
		<colgroup width="105"></colgroup>
		<colgroup width="84"></colgroup>
		<colgroup width="108"></colgroup>
		<colgroup width="114"></colgroup>
		<colgroup width="74"></colgroup>
		<colgroup width="90"></colgroup>
		<colgroup width="99"></colgroup>
		<colgroup span="2" width="66"></colgroup>
		<colgroup width="55"></colgroup>
		<colgroup span="2" width="67"></colgroup>
		<colgroup width="54"></colgroup>
		<colgroup width="125"></colgroup>
		<colgroup width="80"></colgroup>
		<colgroup width="111"></colgroup>
		<colgroup width="90"></colgroup>
		<tr>
			<td colspan=30 height="38" align="center" valign=middle><b>
					<font size=6 color="#FF0000">REKAPITULASI</font>
				</b></td>
		</tr>
		<tr>
			<td colspan=30 height="38" align="center" valign=middle><b>
					<font size=6>CATATAN DATA DAN KEGIATAN WARGA </font>
				</b></td>
		</tr>
		<tr>
			<td colspan=30 height="35" align="center" valign=middle><b>
					<font size=4>KELOMPOK DASA WISMA</font>
				</b></td>
		</tr>
		<tr>
			<td height="17" align="center" valign=middle>
				<font size=4><br></font>
			</td>
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
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
			<td align="center" valign=middle><br></td>
		</tr>
		<tr>
			<td height="20" align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="center" valign=middle><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>DASA WISMA</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>: <?= $dasa_wisma ?></td>
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
			<td align="left" valign=bottom>RT</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>:&nbsp;<?= $rt ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
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
			<td align="left" valign=bottom>RW</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>:&nbsp;<?= $rw ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
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
			<td align="left" valign=bottom>DESA/ KELURAHAN</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>:&nbsp;<?= $desa ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
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
			<td align="left" valign=bottom>TAHUN</td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=middle>:&nbsp;<?= date('Y') ?></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom><br></td>
			<td align="left" valign=bottom bgcolor="#FFFFFF"><br></td>
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
		</tr>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 height="99" align="center" valign=middle>NO</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>NAMA KEPALA RUMAH TANGGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=3 align="center" valign=middle>JML KK</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=11 align="center" valign=middle>JUMLAH ANGGOTA KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 align="center" valign=middle>KRITERIA RUMAH</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle>SUMBER AIR KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="center" valign=middle>MAKANAN POKOK</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=4 align="center" valign=middle>MENGIKUTI KEGIATAN</td>
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
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>SEHAT </td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>KURANG SEHAT </td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI TMP. PEMB. SAMPAH</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI SPAL</td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>MEMILIKI JAMBAN KELUARGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle bgcolor="#FFFFFF">MENEMPEL STIKER P4K</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PDAM</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>SUMUR</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>LAINNYA</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" rowspan=2 align="center" valign=middle>BERAS</td>
			<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>NON BERAS</td>
			<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle>UP2K</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>PEMANFAATAN TANAH PEKARANGAN</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>INDUSTRI RUMAH TANGGA</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="center" valign=middle>
				<font color="#FF0000">KESEHATAN LINGKUNGAN</font>
			</td>
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
		</tr>
		<?php $i = 1 ?>
		<?php foreach ($list as $l) : ?>
			<tr>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><?= $i++ ?><br></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom><?= $l['namaWarga'] ?></td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="3" sdnum="1033;">

				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="6" sdnum="1033;">
					<font color="#FFFFFF">6</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="5" sdnum="1033;">
					<font color="#FFFFFF">5</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
					<font color="#FFFFFF">1</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#FFFFFF">-</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">

				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<font color="#FFFFFF">2</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#FFFFFF">-</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#FFFFFF">-</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">

				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<font color="#FFFFFF">-</font>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['berkebutuhan_khusus'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom>
					<?php if ($l['kriteria_rumah'] == 6) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 5) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 4) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 3) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 2) : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="16" sdnum="1033;">
					<?php if ($l['kriteria_rumah'] == 6) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 5) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 4) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 3) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 2) : ?>
						×
					<?php else : ?>
						✓
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?= $l['jenis_tempat_sampah'] ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['kriteria_rumah'] == 6) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 5) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 4) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 3) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 2) : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['kriteria_rumah'] == 6) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 5) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 4) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 3) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 2) : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?php if ($l['kriteria_rumah'] == 6) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 5) : ?>
						×
					<?php elseif ($l['kriteria_rumah'] == 4) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 3) : ?>
						✓
					<?php elseif ($l['kriteria_rumah'] == 2) : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
					<?php if ($l['jenis_sumber_air'] == 'PDAM') : ?>
						✓
					<?php elseif ($l['jenis_sumber_air'] == 'SUMUR') : ?>
						×
					<?php elseif ($l['jenis_sumber_air'] == 'LAINNYA') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['jenis_sumber_air'] == 'PDAM') : ?>
						×
					<?php elseif ($l['jenis_sumber_air'] == 'SUMUR') : ?>
						✓
					<?php elseif ($l['jenis_sumber_air'] == 'LAINNYA') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?php if ($l['jenis_sumber_air'] == 'PDAM') : ?>
						×
					<?php elseif ($l['jenis_sumber_air'] == 'SUMUR') : ?>
						×
					<?php elseif ($l['jenis_sumber_air'] == 'LAINNYA') : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['makanan_pokok'] == 'BERAS') : ?>
						✓
					<?php elseif ($l['makanan_pokok'] == 'NON BERAS') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['makanan_pokok'] == 'BERAS') : ?>
						×
					<?php elseif ($l['makanan_pokok'] == 'NON BERAS') : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
						✓
					<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						✓
					<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
						✓
					<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
					<?php if ($l['jenis_kegiatan'] == 'UP2K' or $l['jenis_kegiatan'] == 'PENGEMBANGAN KEHIDUPAN BERKOPERASI' or $l['jenis_kegiatan'] == 'PENDIDIKAN DAN KETRAMPILAN' or $l['jenis_kegiatan'] == 'PENGHAYATAN DAN PENGAMALAN PANCASILA') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'PEMANFAATAN TANAH PEKARANGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'INDUSTRI RUMAH TANGGA' or $l['jenis_kegiatan'] == 'PANGAN' or $l['jenis_kegiatan'] == 'SANDANG') : ?>
						×
					<?php elseif ($l['jenis_kegiatan'] == 'KESEHATAN LINGKUNGAN' or $l['jenis_kegiatan'] == 'GOTONG ROYONG' or $l['jenis_kegiatan'] == 'PERENCANAAN SEHAT' or $l['jenis_kegiatan'] == 'KESEHATAN') : ?>
						✓
					<?php else : ?>
						×
					<?php endif; ?>
				</td>
				<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
					<?= $l['keterangan'] ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="20" align="left" valign=bottom><br></td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>JUMLAH</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="3" sdnum="1033;">
				<font color="#FFFFFF">3</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="6" sdnum="1033;">
				<font color="#FFFFFF">6</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="5" sdnum="1033;">
				<font color="#FFFFFF">5</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
				<font color="#FFFFFF">1</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="16" sdnum="1033;">
				<font color="#FFFFFF">16</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="1" sdnum="1033;">
				<font color="#FFFFFF">1</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF">-</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=bottom sdval="2" sdnum="1033;">
				<font color="#FFFFFF">2</font>
			</td>
			<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom>
				<font color="#FFFFFF"><br></font>
			</td>
		</tr>
	</table>
	<!-- ************************************************************************** -->
</body>

</html>