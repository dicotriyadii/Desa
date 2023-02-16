<?php

namespace App\Controllers;
use App\Libraries\Pdfgenerator;
use App\Models\Model_user;
use App\Models\Model_profil_desa;
use App\Models\Model_sejarah_desa;
use App\Models\Model_visiMisi;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_strukturPKK;
use App\Models\Model_struktur_lpm;
use App\Models\Model_warga;
use App\Models\Model_dusun;
use App\Models\Model_pendidikanTerakhir;
use App\Models\Model_pendidikanDitempuh;
use App\Models\Model_pekerjaan;
use App\Models\Model_agama;
use App\Models\Model_jenisKelamin;
use App\Models\Model_umur;
use App\Models\Model_carousel;
use App\Models\Model_kontak;
use App\Models\Model_produk_hukum;
use App\Models\Model_informasi_publik;
use App\Models\Model_artikel;
use App\Models\Model_berita;
use App\Models\Model_galeri_foto;
use App\Models\Model_log;
use App\Models\Model_tema;
use App\Models\Model_desa;
use App\Models\Model_permohonan;
use App\Models\Model_pengumuman;
use App\Models\Model_kategori;
use App\Models\Model_pelaksanaan;
use App\Models\Model_pendapatan;
use App\Models\Model_pembelanjaan;
use App\Models\Model_pemberitahuan;

class Admin extends BaseController
{
    public function admin()
    {
        return view('adminLogin');
    }
    public function lupaPassword()
    {
        return view('adminLupaPassword');
    }
    public function dashboard()
    {
        $session                    = session();
        $pendidikanTerakhir         = new Model_pendidikanTerakhir();
        $pekerjaan                  = new Model_pekerjaan();
        $warga                      = new Model_warga();
        $dusun                      = new Model_dusun();
        $pendidikanTerakhir         = new Model_pendidikanTerakhir();
        $pendidikanDitempuh         = new Model_pendidikanDitempuh();
        $pekerjaan                  = new Model_pekerjaan();
        $agama                      = new Model_agama();
        $jenisKelamin               = new Model_jenisKelamin();
        $umur                       = new Model_umur();
        $permohonan                 = new Model_Permohonan();

        //permohonan
        $permohonanSelesai = [
            'status' => 'Selesai',
            'nomorIndukKependudukan' => $session->get('nik')
        ];
        $permohonanBelumSelesai = [
            'status' => 'Belum Proses',
            'nomorIndukKependudukan' => $session->get('nik')
        ];
        $permohonanProses = [
            'status' => 'Sedang Proses',
            'nomorIndukKependudukan' => $session->get('nik')
        ];
        $permohonanDitolak = [
            'status' => 'Ditolak',
            'nomorIndukKependudukan' => $session->get('nik')
        ];
        $jumlahPermohonanSelesai    = $permohonan->where($permohonanSelesai)->countAllResults();
        $jumlahPermohonanPending    = $permohonan->where($permohonanBelumSelesai)->countAllResults();
        $jumlahPermohonanProses     = $permohonan->where($permohonanProses)->countAllResults();
        $jumlahPermohonanDitolak    = $permohonan->where($permohonanDitolak)->countAllResults();
        //proses pengolahan data
        $jumlahDusun    = $dusun->countAll();
        $dataDusun      = $dusun->getDusun();
        for($i=0;$i<$jumlahDusun;$i++){
            $filterCowok = [
                'dusun' => $dataDusun[$i]['namaDusun'],
                'jenisKelamin' => 'Laki - Laki'
            ];
            $filterCewek = [
                'dusun' => $dataDusun[$i]['namaDusun'],
                'jenisKelamin' => 'Perempuan'
            ];
            $jumlahLaki = $warga->where($filterCowok)->countAllResults();
            $jumlahPerempuan = $warga->where($filterCewek)->countAllResults();
            $jumlahKeseluruhan = $jumlahLaki + $jumlahPerempuan;
            $data = [
                'namaDusun' => $dataDusun[$i]['namaDusun'],
                'laki'      => $jumlahLaki,
                'perempuan' => $jumlahPerempuan,
                'jumlah'    => $jumlahKeseluruhan
            ];
            $dusun->update($dataDusun[$i]['idDusun'],$data);
        }
        //proses pengolahan data
        $jumlahPendidikanTerakhir       = $pendidikanTerakhir->countAll();
        $dataPendidikanTerakhir         = $pendidikanTerakhir->getPendidikanTerakhir();
        for($i=0;$i<$jumlahPendidikanTerakhir;$i++){
            $jumlahJenisPendidikan = $warga->where('pendidikanTerakhir',$dataPendidikanTerakhir[$i]['jenisPendidikan'])->countAllResults();
            $data = [
                'jenisPendidikan'   => $dataPendidikanTerakhir[$i]['jenisPendidikan'],
                'jumlah'            => $jumlahJenisPendidikan
            ];
            $pendidikanTerakhir->update($dataPendidikanTerakhir[$i]['idPendidikanTerakhir'],$data);
        }
        //proses pengolahan data
        $jumlahPendidikanDitempuh       = $pendidikanDitempuh->countAll();
        $dataPendidikanDitempuh         = $pendidikanDitempuh->getPendidikanDitempuh();
        for($i=0;$i<$jumlahPendidikanDitempuh;$i++){
            $jumlahJenisPendidikan = $warga->where('pendidikanDitempuh',$dataPendidikanDitempuh[$i]['jenisPendidikan'])->countAllResults();
            $data = [
                'jenisPendidikan'   => $dataPendidikanDitempuh[$i]['jenisPendidikan'],
                'jumlah'            => $jumlahJenisPendidikan
            ];
            $pendidikanDitempuh->update($dataPendidikanDitempuh[$i]['idPendidikanDitempuh'],$data);
        }
        //proses pengolahan data
        $jumlahDataPekerjaan   = $pekerjaan->countAll();
        $jumlahWarga           = $warga->countAll();
        $dataPekerjaan         = $pekerjaan->getPekerjaan();
        $dataWarga             = $warga->getWarga();
        for($a=0;$a<$jumlahDataPekerjaan;$a++){
            $jumlahPekerjaan = $warga->where('pekerjaan',$dataPekerjaan[$a]['namaPekerjaan'])->countAllResults();
            $data = [
                'namaPekerjaan'   => $dataPekerjaan[$a]['namaPekerjaan'],
                'jumlah'          => $jumlahPekerjaan
            ];
            $pekerjaan->update($dataPekerjaan[$a]['idPekerjaan'],$data);
        }
        //Proses pengolahan data
        $jumlahAgama       = $agama->countAll();
        $dataAgama         = $agama->getAgama();
        for($i=0;$i<$jumlahAgama;$i++){
            $jumlahJenisAgama = $warga->where('agama',$dataAgama[$i]['jenisAgama'])->countAllResults();
            $data = [
                'jenisAgama'   => $dataAgama[$i]['jenisAgama'],
                'jumlah'       => $jumlahJenisAgama
            ];
            $agama->update($dataAgama[$i]['idAgama'],$data);
        }
        //Proses pengolahan data
        $jumlahKelamin          = $jenisKelamin->countAll();
        $dataJenisKelamin       = $jenisKelamin->getJenisKelamin();
        for($i=0;$i<$jumlahKelamin;$i++){
            $jumlahJenisKelamin = $warga->where('jenisKelamin',$dataJenisKelamin[$i]['jenisKelamin'])->countAllResults();
            $data = [
                'jenisKelamin'   => $dataJenisKelamin[$i]['jenisKelamin'],
                'jumlah'       => $jumlahJenisKelamin
            ];
            $jenisKelamin->update($dataJenisKelamin[$i]['idJenisKelamin'],$data);
        }
        //Proses pengolahan data
        $rangeUmur          = $umur->getUmur();
        $jumlahRangeUmur    = $umur->countAll();
        $jumlahWarga        = $warga->countAll();
        $dataWarga          = $warga->getWarga();
        for($i=0; $i<17; $i++){
            $jumlahUmur[$i] = 0;
        }
        for($i=0;$i<$jumlahWarga;$i++){
            $dataUmur = $dataWarga[$i]['umur'];
            if($dataUmur < 1){
                $jumlahUmur[0] = $jumlahUmur[0] + 1;
            }else if($dataUmur >= 2 && $dataUmur <= 4){
                $jumlahUmur[1] = $jumlahUmur[1] + 1;
            }else if($dataUmur >= 5 && $dataUmur <= 9){
                $jumlahUmur[2] = $jumlahUmur[2] + 1;
            }else if($dataUmur >= 10 && $dataUmur <= 14){
                $jumlahUmur[3] = $jumlahUmur[3] + 1;
            }else if($dataUmur >= 15 && $dataUmur <= 19){
                $jumlahUmur[4] = $jumlahUmur[4] + 1;
            }else if($dataUmur >= 20 && $dataUmur <= 24){
                $jumlahUmur[5] = $jumlahUmur[5] + 1;
            }else if($dataUmur >= 25 && $dataUmur <= 29){
                $jumlahUmur[6] = $jumlahUmur[6] + 1;
            }else if($dataUmur >= 30 && $dataUmur <= 34){
                $jumlahUmur[7] = $jumlahUmur[7] + 1;
            }else if($dataUmur >= 35 && $dataUmur <= 39){
                $jumlahUmur[8] = $jumlahUmur[8] + 1;
            }else if($dataUmur >= 40 && $dataUmur <= 44){
                $jumlahUmur[9] = $jumlahUmur[9] + 1;
            }else if($dataUmur >= 45 && $dataUmur <= 49){
                $jumlahUmur[10] = $jumlahUmur[10] + 1;
            }else if($dataUmur >= 50 && $dataUmur <= 54){
                $jumlahUmur[11] = $jumlahUmur[11] + 1;
            }else if($dataUmur >= 55 && $dataUmur <= 59){
                $jumlahUmur[12] = $jumlahUmur[12] + 1;
            }else if($dataUmur >= 60 && $dataUmur <= 64){
                $jumlahUmur[13] = $jumlahUmur[13] + 1;
            }else if($dataUmur >= 65 && $dataUmur <= 69){
                $jumlahUmur[14] = $jumlahUmur[14] + 1;
            }else if($dataUmur >= 70 && $dataUmur <= 74){
                $jumlahUmur[15] = $jumlahUmur[15] + 1;
            }else if($dataUmur >= 75){
                $jumlahUmur[16] = $jumlahUmur[16] + 1;
            }
        }
        for($i=0;$i<$jumlahRangeUmur; $i++){
            if($jumlahUmur[$i] != $rangeUmur[$i]['jumlah'] ){
                $data = [
                    'umur'   => $rangeUmur[$i]['umur'],
                    'jumlah' => $jumlahUmur[$i]
                ];
                $umur->update($rangeUmur[$i]['idUmur'],$data);
            }
        }
        
        $filterBansos = [
            'pekerjaan' => "BELUM/TIDAK BEKERJA",
            'umur >'  => 18
        ];

        $dataSeluruhWarga           = $warga->countAllResults();
        $jumlahBPJS                 = $warga->where('bpjs !=','0')->countAllResults();
        $dataPenerimaBansos         = $warga->where($filterBansos)->countAllResults();
        $dataLakiLaki               = $warga->where('jenisKelamin','Laki - Laki')->countAllResults();
        $dataPerempuan              = $warga->where('jenisKelamin','Perempuan')->countAllResults();
        $dataMeninggal              = $warga->where('status','meninggal')->countAllResults();
        $dataPendidikan             = $pendidikanTerakhir->getPendidikanTerakhir();
        $dataPekerjaan              = $pekerjaan->getPekerjaan();
        $jumlahJenisPendidikan      = $pendidikanTerakhir->countAllResults();
        $jumlahPekerjaan            = $pekerjaan->countAllResults();
        $jumlahTidakBerpendidikan   = 0;
        $jumlahBerpendidikan        = 0;
        $jumlahBekerja              = 0;
        $jumlahTidakBekerja         = 0; 
        for($i=0; $i<$jumlahJenisPendidikan; $i++){
            if($dataPendidikan[$i]['jenisPendidikan'] == 'TIDAK/BELUM SEKOLAH'){
                $jumlahBerpendidikan = $jumlahBerpendidikan + 0;
                $jumlahTidakBerpendidikan = $jumlahTidakBerpendidikan + $dataPendidikan[$i]['jumlah'];
            }else{
                $jumlahBerpendidikan = $jumlahBerpendidikan + $dataPendidikan[$i]['jumlah'];
            }
        }
        for($i=0; $i<$jumlahPekerjaan; $i++){
            if($dataPekerjaan[$i]['namaPekerjaan'] == 'BELUM/TIDAK BEKERJA'){
                $jumlahBekerja = $jumlahBekerja + 0;
                $jumlahTidakBekerja = $jumlahTidakBekerja + $dataPekerjaan[$i]['jumlah'];
            }else{
                $jumlahBekerja = $jumlahBekerja + $dataPekerjaan[$i]['jumlah'];
            }
        }
        return view('adminDashboard',compact('jumlahBerpendidikan','jumlahTidakBerpendidikan','jumlahBekerja','jumlahTidakBekerja','dataSeluruhWarga','dataLakiLaki','dataPerempuan','dataMeninggal','jumlahBPJS','dataPenerimaBansos','jumlahPermohonanSelesai','jumlahPermohonanPending','jumlahPermohonanProses','jumlahPermohonanDitolak'));
    }
    public function profilWilayahDesa()
    {
        $profilDesa     = new Model_profil_desa();
        $data           = $profilDesa->getProfilDesa();
        return view('adminProfilWilayahDesa',compact('data'));
    }
    public function sejarahDesa()
    {
        $sejarahDesa     = new Model_sejarah_desa();
        $data           = $sejarahDesa->getSejarahDesa();
        return view('adminSejarahDesa',compact('data'));
    }
    public function visiMisi()
    {
        $visiMisi       = new Model_visiMisi();
        $data           = $visiMisi->getVisiMisi();
        return view('adminVisiMisi',compact('data'));
    }
    public function pemerintahDesa()
    {
        $pemerintahDesa     = new Model_struktur_pemerintah_desa();
        $data               = $pemerintahDesa->getStrukturPemerintahDesa();
        return view('adminPemerintahDesa',compact('data'));
    }
    public function pkk()
    {
        $anggotaPKK     = new Model_strukturPKK();
        $data           = $anggotaPKK->getStrukturPKK();
        return view('adminPKK',compact('data'));
    }
    public function lpm()
    {
        $anggotaLPM     = new Model_struktur_lpm();
        $data           = $anggotaLPM->getStrukturLPM();
        return view('adminLPM',compact('data'));
    }
    public function wilayahAdministratif()
    {
        $warga          = new Model_warga();
        $dusun          = new Model_dusun();
        $jumlahDusun    = $dusun->countAll();
        $dataDusun      = $dusun->getDusun();
        for($i=0;$i<$jumlahDusun;$i++){
            $filterCowok = [
                'dusun' => $dataDusun[$i]['namaDusun'],
                'jenisKelamin' => 'Laki - Laki'
            ];
            $filterCewek = [
                'dusun' => $dataDusun[$i]['namaDusun'],
                'jenisKelamin' => 'Perempuan'
            ];
            $jumlahLaki = $warga->where($filterCowok)->countAllResults();
            $jumlahPerempuan = $warga->where($filterCewek)->countAllResults();
            $jumlahKeseluruhan = $jumlahLaki + $jumlahPerempuan;
            $data = [
                'namaDusun' => $dataDusun[$i]['namaDusun'],
                'laki'      => $jumlahLaki,
                'perempuan' => $jumlahPerempuan,
                'jumlah'    => $jumlahKeseluruhan
            ];
            $dusun->update($dataDusun[$i]['idDusun'],$data);
        }
        $dataDusun      = $dusun->getDusun();
        return view('adminWilayahAdministratif',compact('dataDusun'));
    }
    public function pendidikanDalamKK()
    {
        $warga                          = new Model_warga();
        $pendidikanTerakhir             = new Model_pendidikanTerakhir();
        $jumlahPendidikanTerakhir       = $pendidikanTerakhir->countAll();
        $dataPendidikanTerakhir         = $pendidikanTerakhir->getPendidikanTerakhir();
        for($i=0;$i<$jumlahPendidikanTerakhir;$i++){
            $jumlahJenisPendidikan = $warga->where('pendidikanTerakhir',$dataPendidikanTerakhir[$i]['jenisPendidikan'])->countAllResults();
            $data = [
                'jenisPendidikan'   => $dataPendidikanTerakhir[$i]['jenisPendidikan'],
                'jumlah'            => $jumlahJenisPendidikan
            ];
            $pendidikanTerakhir->update($dataPendidikanTerakhir[$i]['idPendidikanTerakhir'],$data);
        }
        $dataPendidikanTerakhir         = $pendidikanTerakhir->getPendidikanTerakhir();
        return view('adminPendidikanDalamKK',compact('dataPendidikanTerakhir'));
    }
    public function pendidikanDitempuh()
    {
        $warga                          = new Model_warga();
        $pendidikanDitempuh             = new Model_pendidikanDitempuh();
        $jumlahPendidikanDitempuh       = $pendidikanDitempuh->countAll();
        $dataPendidikanDitempuh         = $pendidikanDitempuh->getPendidikanDitempuh();
        for($i=0;$i<$jumlahPendidikanDitempuh;$i++){
            $jumlahJenisPendidikan = $warga->where('pendidikanDitempuh',$dataPendidikanDitempuh[$i]['jenisPendidikan'])->countAllResults();
            $data = [
                'jenisPendidikan'   => $dataPendidikanDitempuh[$i]['jenisPendidikan'],
                'jumlah'            => $jumlahJenisPendidikan
            ];
            $pendidikanDitempuh->update($dataPendidikanDitempuh[$i]['idPendidikanDitempuh'],$data);
        }
        $dataPendidikanDitempuh         = $pendidikanDitempuh->getPendidikanDitempuh();
        return view('adminPendidikanDitempuh',compact('dataPendidikanDitempuh'));
    }
    public function pekerjaan()
    {
        $warga                 = new Model_warga();
        $pekerjaan             = new Model_pekerjaan();
        $jumlahDataPekerjaan   = $pekerjaan->countAll();
        $jumlahWarga           = $warga->countAll();
        $dataPekerjaan         = $pekerjaan->getPekerjaan();
        $dataWarga             = $warga->getWarga();
        for($a=0;$a<$jumlahDataPekerjaan;$a++){
            $jumlahPekerjaan = $warga->where('pekerjaan',$dataPekerjaan[$a]['namaPekerjaan'])->countAllResults();
            $data = [
                'namaPekerjaan'   => $dataPekerjaan[$a]['namaPekerjaan'],
                'jumlah'          => $jumlahPekerjaan
            ];
            $pekerjaan->update($dataPekerjaan[$a]['idPekerjaan'],$data);
        }
        $dataWarga             = $warga->getWarga();
        $dataPekerjaan         = $pekerjaan->getPekerjaan();
        return view('adminPekerjaan',compact('dataPekerjaan'));
        // return view('500');
    }
    public function agama()
    {
        $warga             = new Model_warga();
        $agama             = new Model_agama();
        $jumlahAgama       = $agama->countAll();
        $dataAgama         = $agama->getAgama();
        for($i=0;$i<$jumlahAgama;$i++){
            $jumlahJenisAgama = $warga->where('agama',$dataAgama[$i]['jenisAgama'])->countAllResults();
            $data = [
                'jenisAgama'   => $dataAgama[$i]['jenisAgama'],
                'jumlah'       => $jumlahJenisAgama
            ];
            $agama->update($dataAgama[$i]['idAgama'],$data);
        }
        $dataAgama         = $agama->getAgama();
        return view('adminAgama',compact('dataAgama'));
    }
    public function jenisKelamin()
    {
        $warga                  = new Model_warga();
        $jenisKelamin           = new Model_jenisKelamin();
        $jumlahKelamin          = $jenisKelamin->countAll();
        $dataJenisKelamin       = $jenisKelamin->getJenisKelamin();
        for($i=0;$i<$jumlahKelamin;$i++){
            $jumlahJenisKelamin = $warga->where('jenisKelamin',$dataJenisKelamin[$i]['jenisKelamin'])->countAllResults();
            $data = [
                'jenisKelamin'   => $dataJenisKelamin[$i]['jenisKelamin'],
                'jumlah'       => $jumlahJenisKelamin
            ];
            $jenisKelamin->update($dataJenisKelamin[$i]['idJenisKelamin'],$data);
        }
        $dataJenisKelamin       = $jenisKelamin->getJenisKelamin();
        return view('adminJenisKelamin',compact('dataJenisKelamin'));
    }
    public function umur()
    {
        $warga              = new Model_warga();
        $umur               = new Model_umur();
        $rangeUmur          = $umur->getUmur();
        $jumlahRangeUmur    = $umur->countAll();
        $jumlahWarga        = $warga->countAll();
        $dataWarga          = $warga->getWarga();
        for($i=0; $i<17; $i++){
            $jumlahUmur[$i] = 0;
        }
        for($i=0;$i<$jumlahWarga;$i++){
            $dataUmur = $dataWarga[$i]['umur'];
            if($dataUmur < 1){
                $jumlahUmur[0] = $jumlahUmur[0] + 1;
            }else if($dataUmur >= 2 && $dataUmur <= 4){
                $jumlahUmur[1] = $jumlahUmur[1] + 1;
            }else if($dataUmur >= 5 && $dataUmur <= 9){
                $jumlahUmur[2] = $jumlahUmur[2] + 1;
            }else if($dataUmur >= 10 && $dataUmur <= 14){
                $jumlahUmur[3] = $jumlahUmur[3] + 1;
            }else if($dataUmur >= 15 && $dataUmur <= 19){
                $jumlahUmur[4] = $jumlahUmur[4] + 1;
            }else if($dataUmur >= 20 && $dataUmur <= 24){
                $jumlahUmur[5] = $jumlahUmur[5] + 1;
            }else if($dataUmur >= 25 && $dataUmur <= 29){
                $jumlahUmur[6] = $jumlahUmur[6] + 1;
            }else if($dataUmur >= 30 && $dataUmur <= 34){
                $jumlahUmur[7] = $jumlahUmur[7] + 1;
            }else if($dataUmur >= 35 && $dataUmur <= 39){
                $jumlahUmur[8] = $jumlahUmur[8] + 1;
            }else if($dataUmur >= 40 && $dataUmur <= 44){
                $jumlahUmur[9] = $jumlahUmur[9] + 1;
            }else if($dataUmur >= 45 && $dataUmur <= 49){
                $jumlahUmur[10] = $jumlahUmur[10] + 1;
            }else if($dataUmur >= 50 && $dataUmur <= 54){
                $jumlahUmur[11] = $jumlahUmur[11] + 1;
            }else if($dataUmur >= 55 && $dataUmur <= 59){
                $jumlahUmur[12] = $jumlahUmur[12] + 1;
            }else if($dataUmur >= 60 && $dataUmur <= 64){
                $jumlahUmur[13] = $jumlahUmur[13] + 1;
            }else if($dataUmur >= 65 && $dataUmur <= 69){
                $jumlahUmur[14] = $jumlahUmur[14] + 1;
            }else if($dataUmur >= 70 && $dataUmur <= 74){
                $jumlahUmur[15] = $jumlahUmur[15] + 1;
            }else if($dataUmur >= 75){
                $jumlahUmur[16] = $jumlahUmur[16] + 1;
            }
        }

        for($i=0;$i<$jumlahRangeUmur; $i++){
            if($jumlahUmur[$i] != $rangeUmur[$i]['jumlah'] ){
                $data = [
                    'umur'   => $rangeUmur[$i]['umur'],
                    'jumlah' => $jumlahUmur[$i]
                ];
                $umur->update($rangeUmur[$i]['idUmur'],$data);
            }
        }
        $rangeUmur          = $umur->getUmur();
        return view('adminUmur',compact('rangeUmur'));
    }
    public function bpjs()
    {
        $warga          = new Model_warga();
        $dataWarga      = $warga->where('bpjs !=','0')->findAll();
        return view('adminBPJS',compact('dataWarga'));
    }
    public function bantuanSosial()
    {
        $warga          = new Model_warga();
        $dataFilter = [
            'pekerjaan' => 'BELUM/TIDAK BEKERJA',
            'umur >' => 18,
        ];
        $dataWarga      = $warga->where($dataFilter)->findAll();
        return view('adminBantuanSosial',compact('dataWarga'));
    }
    public function wargaNegara()
    {
        $warga     = new Model_warga();
        $data      = $warga->getWarga();
        return view('adminWargaNegara',compact('data'));
    }
    public function detailWarga($id=null)
    {
        $warga     = new Model_warga();
        $data      = $warga->where('idWarga',$id)->findAll();
        return view('adminDetailWargaNegara',compact('data'));
    }
    public function produkHukum()
    {
        $produkHukum    = new Model_produk_hukum();
        $data           = $produkHukum->getProdukHukum();
        return view('adminProdukHukum',compact('data'));
    }
    public function informasiPublik()
    {
        $informasiPublik    = new Model_informasi_publik();
        $data               = $informasiPublik->getInformasiPublik();
        return view('adminInformasiPublik',compact('data'));
    }
    public function artikel()
    {
        $artikel    = new Model_artikel();
        $data       = $artikel->getArtikel();
        return view('adminArtikel',compact('data'));
    }
    public function berita()
    {
        $berita     = new Model_berita();
        $data       = $berita->getBerita();
        return view('adminBerita',compact('data'));
    }
    public function galeriFoto()
    {
        $galeri     = new Model_galeri_foto();
        $data       = $galeri->getGaleri();
        return view('adminGaleriFoto',compact('data'));
    }
    public function manajemenPengguna()
    {
        $user    = new Model_user();
        $data    = $user->getUser();
        return view('adminManajemenPengguna',compact('data'));
    }
    public function carousel()
    {
        $carousel    = new Model_carousel();
        $data        = $carousel->getCarousel();
        return view('adminCarousel',compact('data'));
    }
    public function kontak()
    {
        $kontak    = new Model_kontak();
        $data      = $kontak->getKontak();
        return view('adminKontak',compact('data'));
    }
    public function dataDesa()
    {
        $desa       = new Model_desa();
        $dataDesa   = $desa->getDesa();
        return view('adminDataDesa',compact('dataDesa'));
    }
    public function layananDesa()
    {
        $permohonan       = new Model_permohonan();
        $dataPermohonan   = $permohonan->orderBy('idPermohonan', 'DESC')->getPermohonan();
        return view('adminLayananDesa',compact('dataPermohonan'));
    }
    public function downloadProdukHukum($id=null)
	{
        $produkHukum    = new Model_produk_hukum();
        $data = $produkHukum->where('idProdukHukum',$id)->findAll();
		return $this->response->download('produkHukum/'.$data[0]['berkasProdukHukum'], null);
	}
    public function downloadInformasiPublik($id=null)
	{
        $informasiPublik    = new Model_informasi_publik();
        $data = $informasiPublik->where('idInformasiPublik',$id)->findAll();
		return $this->response->download('informasiPublik/'.$data[0]['berkasInformasiPublik'], null);
	}
    public function downloadSurat($id=null)
	{
        $Pdfgenerator       = new Pdfgenerator();
        $desa               = new Model_desa();
        $tema               = new Model_tema();
        $kontak             = new Model_kontak();
        $dataDesa           = $desa->getDesa();
        $dataKontak         = $kontak->getKontak();
        $tema               = $tema->getTema();
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('404User',compact('dataDesa','tema','dataKontak'), $this->data);

        // run dompdf
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);


        // $permohonan     = new Model_permohonan();
        // $data           = $permohonan->where('idPermohonan',$id)->findAll();
        // return $this->response->download('berkasPermohonanSelesai/'.$data[0]['berkas'], null);
    }
    public function updateStatusTolak($id=null)
    {
        $session        = session();
        $permohonan     = new Model_permohonan();
        $log            = new Model_log();
        $data           = $permohonan->where('idPermohonan',$id)->findAll();
        $dataPermohonan   = $permohonan->orderBy('idPermohonan', 'DESC')->getPermohonan();
        $statusUpdate   = [
            'status' => 'Ditolak', 
        ];
        $permohonan->update($id,$statusUpdate);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Berkas Ditolak',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        return redirect()->to(base_url().'/adminLayananDesa');
    }

    public function downloadBerkasPermohonan($id=null)
	{
        $session        = session();
        $permohonan     = new Model_permohonan();
        $log            = new Model_log();
        $data           = $permohonan->where('idPermohonan',$id)->findAll();
        $dataPermohonan   = $permohonan->getPermohonan();
		$statusUpdate   = [
            'status' => 'Sedang Proses', 
        ];
        $permohonan->update($id,$statusUpdate);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Update Status Permohonan',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        return $this->response->download('berkasPermohonan/'.$data[0]['berkasPemohon'], null);
    }
    public function downloadFormatCSV()
	{
		return $this->response->download('berkas/contohFormat.docx', null);
	}
    
    public function defaultTema()
	{
        $session        = session();
        $tema           = new Model_tema();
        $log            = new Model_log();
        $data = [
            'warna'  => '#29af8a'
        ];
        $tema->update('1',$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah warna default website',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan warna default website berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formRubahTema');
	}
    public function pengumuman()
    {
        $pengumuman     = new Model_pengumuman();
        $data           = $pengumuman->orderBy('idPengumuman','desc')->findAll();
        return view('adminPengumuman',compact('data'));
    }
    public function pemberitahuan()
    {
        $pemberitahuan     = new Model_pemberitahuan();
        $data              = $pemberitahuan->getPemberitahuan();
        return view('adminPemberitahuan',compact('data'));
    }
    public function kategori()
    {
        $kategori       = new Model_kategori();
        $data           = $kategori->getKategori();
        return view('adminKategori',compact('data'));
    }
    public function danaDesa()
    {
        return view('adminDanaDesa');
    }
    public function danaPelaksanaan()
    {
        $Pelaksanaan        = new Model_pelaksanaan();
        $Pendapatan         = new Model_pendapatan();
        $Pembelanjaan       = new Model_pembelanjaan();

        //Dana Pendapatan Realisasi
        $pendapatanRealisasi = 0;
        $jumlahPendapatanRealisasi = $Pendapatan->where('statusPendapatan','Realisasi')->countAllResults();
        $dataPendapatanRealisasi = $Pendapatan->where('statusPendapatan','Realisasi')->findAll();
        for($i=0;$i<$jumlahPendapatanRealisasi; $i++){
            $pendapatanRealisasi = $pendapatanRealisasi + $dataPendapatanRealisasi[$i]['jumlah'];
        }
        // die(print_r($pendapatanRealisasi));
        //Dana Pendapatan Anggaran
        $pendapatanAnggaran = 0;
        $jumlahPendapatanAnggaran = $Pendapatan->where('statusPendapatan','Anggaran')->countAllResults();
        $dataPendapatanAnggaran = $Pendapatan->where('statusPendapatan','Anggaran')->findAll();
        for($i=0;$i<$jumlahPendapatanAnggaran; $i++){
            $pendapatanAnggaran = $pendapatanAnggaran + $dataPendapatanAnggaran[$i]['jumlah'];
        }
        //Dana Pembelanjaan Realisasi
        $pembelanjaanRealisasi = 0;
        $jumlahPembelanjaanRealisasi = $Pembelanjaan->where('statusPembelanjaan','Realisasi')->countAllResults();
        $dataPembelanjaanRealisasi = $Pembelanjaan->where('statusPembelanjaan','Realisasi')->findAll();
        for($i=0;$i<$jumlahPembelanjaanRealisasi; $i++){
            $pembelanjaanRealisasi = $pembelanjaanRealisasi + $dataPembelanjaanRealisasi[$i]['jumlah'];
        }
        //Dana Pembelanjaan Anggaran
        $pembelanjaanAnggaran = 0;
        $jumlahPembelanjaanAnggaran = $Pembelanjaan->where('statusPembelanjaan','Anggaran')->countAllResults();
        $dataPembelanjaanAnggaran = $Pembelanjaan->where('statusPembelanjaan','Anggaran')->findAll();
        for($i=0;$i<$jumlahPembelanjaanAnggaran; $i++){
            $pembelanjaanAnggaran = $pembelanjaanAnggaran + $dataPembelanjaanAnggaran[$i]['jumlah'];
        }
        //update data Pelaksanaan Pendapatan
        $dataPendapatanRealisasi = [
            'jenisPelaksanaan' => 'Pendapatan',
            'jumlah' => $pendapatanRealisasi,
            'statusPelaksanaan' => 'Realisasi',
        ];
        $Pelaksanaan->update('1',$dataPendapatanRealisasi);
        $dataPendapatanAnggaran = [
            'jenisPelaksanaan' => 'Pendapatan',
            'jumlah' => $pendapatanAnggaran,
            'statusPelaksanaan' => 'Anggaran',
        ];
        $Pelaksanaan->update('2',$dataPendapatanAnggaran);
        //update data Pelaksanaan Pembelanjaan
        $dataPembelanjaanRealisasi = [
            'jenisPelaksanaan' => 'Pembelanjaan',
            'jumlah' => $pembelanjaanRealisasi,
            'statusPelaksanaan' => 'Realisasi',
        ];
        $Pelaksanaan->update('3',$dataPembelanjaanRealisasi);
        $dataPembelanjaanAnggaran = [
            'jenisPelaksanaan' => 'Pembelanjaan',
            'jumlah' => $pembelanjaanAnggaran,
            'statusPelaksanaan' => 'Anggaran',
        ];
        $Pelaksanaan->update('4',$dataPembelanjaanAnggaran);
        
        $data                   = $Pelaksanaan->getPelaksanaan();
        return view('adminDanaPelaksanaan',compact('data'));
    }
    public function danaPendapatan()
    {
        $danaPendapatan         = new Model_pendapatan();
        $data                   = $danaPendapatan->getPendapatan();
        return view('adminDanaPendapatan',compact('data'));
    }
    public function danaPembelanjaan()
    {
        $danaPembelanjaan       = new Model_pembelanjaan();
        $data                   = $danaPembelanjaan->getPembelanjaan();
        return view('adminDanaPembelanjaan',compact('data'));
    }
}
