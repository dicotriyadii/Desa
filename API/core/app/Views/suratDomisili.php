<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$dataSurat[0]['jenisSurat']?> <?=$dataWarga[0]['nomorIndukKependudukan']?></title>
    </head>
    <body>
         <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="center" width="10%"><img src="<?=base_url()?>/assets/images/LogoDeliSerdang.png" style="width: 100px;height: 130px; margin: auto 0;"></td>
                <td width="90%">
                    <h2 style="text-align: center;">PEMERINTAH KABUPATEN DELI SERDANG <br> KECAMATAN BANGUN PURBA <br> DESA UJUNG RAMBE </h2>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="height: 5px; background-color: black;border-radius: 2px;"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="text-align: center; font-size: 18px; font-weight: bold;">
                        <?=strtoupper($dataSurat[0]['jenisSurat'])?><hr style="background-color: black;border-radius: 2px; width: 300px;"> Nomor : <?=$dataSurat[0]['nomorSurat']?>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Desa Ujung Rambe Kecamatan Bangun Purba Kabupaten Deli Serdang dengan ini menerangkan bahwa :</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table width="90%" align="center" cellspacing="0" cellpadding="0">
                        <tr>
                            <td  width="30%" style="padding: 3px;">
                                Nama
                            </td>
                            <td width="1%"style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                <?=$dataWarga[0]['namaWarga']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                Tempat / Tanggal Lahir
                            </td>
                            <td width="1%" style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                <?=$dataWarga[0]['tempatLahir']?> / <?=$dataWarga[0]['tanggalLahir']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                Jenis Kelamin
                            </td>
                            <td width="1%" style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                <?=$dataWarga[0]['jenisKelamin']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                Alamat
                            </td>
                            <td width="1%" style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                <?=$dataWarga[0]['alamat']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                NIK
                            </td>
                            <td style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                <?=$dataWarga[0]['nomorIndukKependudukan']?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>Benar nama tersebut di atas berdomisili di :
                </td>
            </tr>
            <tr>
                <td colspan="2">
                     <br>
                    <table width="90%" align="center" cellspacing="0" cellpadding="0">
                        <tr>
                            <td  width="30%" style="padding: 3px;">
                                Dusun
                            </td>
                            <td width="1%"style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                XII
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                Desa
                            </td>
                            <td width="1%" style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                Ujung Rambe
                            </td>
                        </tr>
                        <tr>
                            <td width="30%" style="padding: 3px;">
                                Kecamatan
                            </td>
                            <td width="1%" style="padding: 3px; text-align: center;">
                                :
                            </td>
                            <td width="69%" style="padding: 3px;">
                                Bangun Purba
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    Demikian surat keterangan ini dibuat agar dapat digunakan sebagai mana mestinya
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <table style="margin-left: 480px; margin-top: 15px; margin-bottom: 30px;">
                        <tr>
                            <td>Ujung Rambe, <?= $dataSurat[0]['tanggalSurat'];?></td>
                        </tr>
                        <tr align="center">
                            <td style="padding-left: 55px; margin-top: 100px;" ><br><br>#</td>
                       <!-- <td><img src="<?=base_url()?>/assets/images/ttdDico.png" style="width: 100px;height: 130px; padding: 1px"></td> -->
                        </tr>
                        <tr>
                            <td align="center">Dian Ika</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <img src="<?=base_url()?>/assets/images/footer.jpeg" style="width: 100%;height: 50px;margin-top:191px;">
                </td>
            </tr>
        </table>
    </body>
</html>