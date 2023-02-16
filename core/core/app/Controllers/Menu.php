<?php

namespace App\Controllers;
use App\Models\Model_carousel;
use App\Models\Model_kontak;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_berita;
use App\Models\Model_tema;
use App\Models\Model_artikel;
use App\Models\Model_profil_desa;
use App\Models\Model_sejarah_desa;
use App\Models\Model_visiMisi;
use App\Models\Model_strukturPKK;
use App\Models\Model_struktur_lpm;
use App\Models\Model_dusun;
use App\Models\Model_pendidikanTerakhir;
use App\Models\Model_pendidikanDitempuh;
use App\Models\Model_pekerjaan;
use App\Models\Model_agama;
use App\Models\Model_jenisKelamin;
use App\Models\Model_umur;
use App\Models\Model_produk_hukum;
use App\Models\Model_informasi_publik;
use App\Models\Model_desa;
use App\Models\Model_galeri_foto;
use App\Models\Model_warga;
use App\Models\Model_jenisPermohonan;
use App\Models\Model_permohonan;
use App\Models\Model_kategori;
use App\Models\Model_pelaksanaan;
use App\Models\Model_pendapatan;
use App\Models\Model_pembelanjaan;
use App\Models\Model_pengumuman;
use App\Models\Model_pemberitahuan;

class Menu extends BaseController
{
    public function login()
    {
        return view('login');
    }
    public function landingPage()
    {
        $carousel           = new Model_carousel();
        $strukturPemerintah = new Model_struktur_pemerintah_desa();
        $berita             = new Model_berita();
        $artikel            = new Model_artikel();
        $desa               = new Model_desa();
        $pengumuman         = new Model_pengumuman();  
        $pemberitahuan      = new Model_pemberitahuan();  
        $profilDesa         = new Model_profil_desa();  
        $kontak             = new Model_kontak();
        $dataKontak         = $kontak->getKontak();
        $dataProfilDesa     = $profilDesa->getProfilDesa();
        $dataDesa           = $desa->getDesa();
        $dataPemerintah     = $strukturPemerintah->getStrukturPemerintahDesa();  
        $data               = $carousel->getCarousel();
        $dataPengumuman     = $pengumuman->orderBy('idPengumuman','desc')->findAll(5);
        $dataPemberitahuan  = $pemberitahuan->getPemberitahuan();
        $dataBerita         = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(8);
        $dataArtikel        = $artikel->where('status','Sudah Validasi')->orderBy('tanggalArtikel','desc')->findAll(4);
        return view('landingPage2',compact('data','dataPemerintah','dataBerita','dataArtikel','dataDesa','dataPengumuman','dataProfilDesa','dataKontak','dataPemberitahuan'));
    }
    public function profilWilayahDesa()
    {
        $kontak                 = new Model_kontak();
        $tema                   = new Model_tema();
        $profiWilayahDesa       = new Model_profil_desa();
        $berita                 = new Model_berita();
        $desa                   = new Model_desa();  
        $dataDesa               = $desa->getDesa();
        $dataBerita         	= $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak             = $kontak->getKontak();   
        $tema                   = $tema->getTema();
        $dataProfilWilayahDesa  = $profiWilayahDesa->getProfilDesa();   
        return view('profilWilayahDesa',compact('dataKontak','tema','dataProfilWilayahDesa','dataBerita','dataDesa'));
    }
    public function sejarahDesa()
    {
        $kontak         = new Model_kontak();
        $dataKontak     = $kontak->getKontak();   
        $berita         = new Model_berita();
        $sejarahDesa    = new Model_sejarah_desa();
        $tema           = new Model_tema();   
        $desa           = new Model_desa();  
        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();   
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataSejarahDesa= $sejarahDesa->getSejarahDesa();
        return view('sejarahDesa',compact('dataKontak','dataBerita','tema','dataSejarahDesa','dataDesa'));
    }
    public function visiMisi()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();   
        $visiMisi       = new Model_visiMisi();   
        $desa           = new Model_desa();  
        $berita         = new Model_berita();
        $dataDesa       = $desa->getDesa();
        $dataKontak     = $kontak->getKontak();
        $dataVisiMisi   = $visiMisi->getVisiMisi();   
        $tema           = $tema->getTema();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        return view('visiMisi',compact('dataKontak','tema','dataVisiMisi','dataDesa','dataBerita'));
    }
    public function danaDesa()
    {
        $kontak                 = new Model_kontak();
        $tema                   = new Model_tema();      
        $desa                   = new Model_desa();  
        $danaPelaksanaan        = new Model_pelaksanaan();
        $danaPendapatan         = new Model_pendapatan();
        $danaPembelanjaan       = new Model_pembelanjaan();
        $filter1 =[
            'jenisPelaksanaan'  => 'Pendapatan',
            'statusPelaksanaan' => 'Realisasi'
        ];
        $filter2 =[
            'jenisPelaksanaan'  => 'Pendapatan',
            'statusPelaksanaan' => 'Anggaran'
        ];
        $filter3 =[
            'jenisPelaksanaan'  => 'Pembelanjaan',
            'statusPelaksanaan' => 'Realisasi'
        ];
        $filter4 =[
            'jenisPelaksanaan'  => 'Pembelanjaan',
            'statusPelaksanaan' => 'Anggaran'
        ];
        //ppr = Pendapatan || ppr2 = Pembelanjaan
        $ppr = $danaPelaksanaan->where($filter1)->findAll(); 
        $ppa = $danaPelaksanaan->where($filter2)->findAll();
        $ppr2 = $danaPelaksanaan->where($filter3)->findAll();
        $ppa2 = $danaPelaksanaan->where($filter4)->findAll();
        

        $danaPendapatanRealisasi        = $danaPendapatan->where('statusPendapatan','Realisasi')->findAll();
        $danaPendapatanAnggaran         = $danaPendapatan->where('statusPendapatan','Anggaran')->findAll();
        $danaPembelanjaanRealisasi      = $danaPembelanjaan->where('statusPembelanjaan','Realisasi')->findAll();
        $danaPembelanjaanAnggaran       = $danaPembelanjaan->where('statusPembelanjaan','Anggaran')->findAll();

        $dataDesa           = $desa->getDesa();
        $dataKontak         = $kontak->getKontak(); 
        $tema               = $tema->getTema();
        return view('danaDesa',compact('dataKontak','tema','dataDesa','danaPendapatanRealisasi','danaPendapatanAnggaran','danaPembelanjaanRealisasi','danaPembelanjaanAnggaran','ppr','ppr2','ppa','ppa2'));
    }
    public function pemerintahDesa()
    {
        $kontak                 = new Model_kontak();  
        $tema                   = new Model_tema();   
        $pemerintahDesa         = new Model_struktur_pemerintah_desa;
        $desa                   = new Model_desa();  
        $berita                 = new Model_berita();
        $dataBerita             = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataDesa               = $desa->getDesa();
        $tema                   = $tema->getTema();
        $dataKontak             = $kontak->getKontak(); 
        $dataPemerintahDesa     = $pemerintahDesa->getStrukturPemerintahDesa(); 
        $kepalaDesa             = $pemerintahDesa->where('jabatan','Kepala Desa')->findAll(); 
        return view('pemerintahDesa',compact('dataKontak','tema','dataPemerintahDesa','kepalaDesa','dataDesa','dataBerita'));
    }
    public function pkk()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();   
        $pkk            = new Model_strukturPKK();
        $desa           = new Model_desa();  
        $berita         = new Model_berita();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $dataKontak     = $kontak->getKontak();
        $dataPKK        = $pkk->getStrukturPKK();   
        return view('pkk',compact('dataKontak','tema','dataPKK','dataDesa','dataBerita'));
    }
    public function lpm()
    {
        $kontak         = new Model_kontak();  
        $tema           = new Model_tema();  
        $lpm            = new Model_struktur_lpm();
        $desa           = new Model_desa();  
        $berita                 = new Model_berita();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataDesa       = $desa->getDesa();
        $dataKontak     = $kontak->getKontak();  
        $tema           = $tema->getTema();
        $dataLPM        = $lpm->getStrukturLPM(); 
        return view('lpm',compact('dataKontak','tema','dataLPM','dataDesa','dataBerita'));
    }
    public function dataWilayahAdministrasi()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $berita         = new Model_berita();
        $dusun          = new Model_dusun();
        $desa           = new Model_desa();  
        $warga          = new Model_warga();
        //Proses
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

        $dataDesa       = $desa->getDesa();
        $dataKontak     = $kontak->getKontak();  
        $tema           = $tema->getTema(); 
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataDusun      = $dusun->getDusun();
        return view('dataWilayahAdministrasi',compact('dataKontak','tema','dataBerita','dataDusun','dataDesa'));
    }
    public function dataPendidikanDalamKK()
    {
        $kontak             = new Model_kontak();
        $berita             = new Model_berita();   
        $tema               = new Model_tema();   
        $pendidikanTerakhir = new Model_pendidikanTerakhir();  
        $pendidikanDitempuh     = new Model_pendidikanDitempuh();  
        $desa               = new Model_desa();
        //Proses
        $warga                          = new Model_warga();
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

        $dataDesa           = $desa->getDesa();
        $tema               = $tema->getTema();
        $dataKontak         = $kontak->getKontak();
        $dataBerita         = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataPendidikanTerakhir         = $pendidikanTerakhir->getPendidikanTerakhir();
        $dataPendidikanDitempuh = $pendidikanDitempuh->getPendidikanDitempuh();
        return view('dataPendidikanDalamKK',compact('dataKontak','tema','dataBerita','dataPendidikanTerakhir','dataDesa','dataPendidikanDitempuh'));
    }
    public function dataPendidikanDitempuh()
    {
        $kontak                 = new Model_kontak();
        $tema                   = new Model_tema();  
        $berita                 = new Model_berita(); 
        $pendidikanDitempuh     = new Model_pendidikanDitempuh(); 
        $desa                   = new Model_desa();  
        $warga                  = new Model_warga();
        //Proses
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
        $dataDesa               = $desa->getDesa();
        $dataKontak             = $kontak->getKontak(); 
        $tema                   = $tema->getTema();   
        $dataBerita         = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);   
        $dataPendidikanDitempuh = $pendidikanDitempuh->getPendidikanDitempuh();
        return view('dataPendidikanDitempuh',compact('dataKontak','tema','dataBerita','dataPendidikanDitempuh','dataDesa'));
    }
    public function dataPekerjaan()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $berita         = new Model_berita(); 
        $pekerjaan      = new Model_pekerjaan();
        $desa           = new Model_desa();  
        $warga          = new Model_warga();
        //proses 
        $jumlahDataPekerjaan       = $pekerjaan->countAll();
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
        $dataDesa       = $desa->getDesa();
        $dataKontak     = $kontak->getKontak();    
        $tema           = $tema->getTema();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataPekerjaan  = $pekerjaan->getPekerjaan();
        return view('dataPekerjaan',compact('dataKontak','tema','dataBerita','dataPekerjaan','dataDesa'));
    }
    public function dataAgama()
    {
        $kontak         = new Model_kontak();
        $berita         = new Model_berita();    
        $tema           = new Model_tema();
        $agama          = new Model_agama();   
        $desa           = new Model_desa(); 
        $warga          = new Model_warga(); 
        //proses
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

        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak     = $kontak->getKontak();
        $dataAgama      = $agama->getAgama();
        return view('dataAgama',compact('dataKontak','tema','dataBerita','dataAgama','dataDesa'));
    }
    public function dataJenisKelamin()
    {
        $kontak             = new Model_kontak(); 
        $tema               = new Model_tema();  
        $berita             = new Model_berita();    
        $jenisKelamin       = new Model_jenisKelamin();
        $desa               = new Model_desa();  
        $warga              = new Model_warga();
        //proses
        $jumlahJenisKelamin     = $jenisKelamin->countAll();
        $dataJenisKelamin       = $jenisKelamin->getJenisKelamin();
        for($i=0;$i<$jumlahJenisKelamin;$i++){
            $jumlahJenisKelamin = $warga->where('jenisKelamin',$dataJenisKelamin[$i]['jenisKelamin'])->countAllResults();
            $data = [
                'jenisKelamin'   => $dataJenisKelamin[$i]['jenisKelamin'],
                'jumlah'       => $jumlahJenisKelamin
            ];
            $jenisKelamin->update($dataJenisKelamin[$i]['idJenisKelamin'],$data);
        }
        $dataDesa           = $desa->getDesa();  
        $dataBerita         = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak         = $kontak->getKontak();   
        $tema               = $tema->getTema();
        $dataJenisKelamin   = $jenisKelamin->getJenisKelamin();
        return view('dataJenisKelamin',compact('dataKontak','tema','dataBerita','dataJenisKelamin','dataDesa'));
    }
    public function dataWargaNegara()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();   
        $berita         = new Model_berita();   
        $umur           = new Model_umur();   
        $desa           = new Model_desa();  
        $warga          = new Model_warga();
        //Proses
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

        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $dataUmur       = $umur->getUmur();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak     = $kontak->getKontak();   
        return view('dataWargaNegara',compact('dataKontak','tema','dataBerita','dataUmur','dataDesa'));
    }
    public function dataBPJS()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $berita         = new Model_berita(); 
        $desa           = new Model_desa();  
        $warga          = new Model_warga();
        //proses 
        $jumlahPenggunaBPJS         = $warga->where('bpjs !=','0')->countAllResults();
        $jumlahTidakPenggunaBPJS    = $warga->where('bpjs =','0')->countAllResults();       
        $dataWarga                  = $warga->getWarga();
        $dataDesa                   = $desa->getDesa();
        $dataKontak                 = $kontak->getKontak();    
        $tema                       = $tema->getTema();
        $dataBerita                 = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        return view('dataBPJS',compact('dataKontak','tema','dataBerita','jumlahPenggunaBPJS','dataDesa','jumlahTidakPenggunaBPJS'));
    }
    public function dataBansos()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $berita         = new Model_berita(); 
        $desa           = new Model_desa();  
        $warga          = new Model_warga();
        //proses 
        $filterBansos = [
            'pekerjaan' => "BELUM/TIDAK BEKERJA",
            'umur >'  => 18
        ];
        $filterTidakBansos = [
            'umur >'  => 18
        ];
        $dataPenerimaBansos         = $warga->where($filterBansos)->countAllResults();
        $dataTidakPenerimaBansos    = $warga->where($filterTidakBansos)->countAllResults();
        $dataWarga                  = $warga->getWarga();
        $dataDesa                   = $desa->getDesa();
        $dataKontak                 = $kontak->getKontak();    
        $tema                       = $tema->getTema();
        $dataBerita                 = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        return view('dataBansos',compact('dataKontak','tema','dataBerita','dataPenerimaBansos','dataDesa','dataTidakPenerimaBansos'));
    }
    public function produkHukum()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $berita         = new Model_berita();   
        $produkHukum    = new Model_produk_hukum();
        $desa           = new Model_desa();  
        $dataDesa       = $desa->getDesa();  
        $dataKontak     = $kontak->getKontak();    
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $tema           = $tema->getTema();
        $dataProdukHukum    = $produkHukum->getProdukHukum();
        return view('produkHukum',compact('dataKontak','tema','dataBerita','dataProdukHukum','dataDesa'));
    }
    public function informasiPublik()
    {
        $kontak                 = new Model_kontak();
        $tema                   = new Model_tema();   
        $berita                 = new Model_berita();   
        $informasiPublik        = new Model_informasi_publik();
        $desa                   = new Model_desa();  
        $dataDesa               = $desa->getDesa();
        $dataInformasiPublik    = $informasiPublik->getInformasiPublik();
        $tema                   = $tema->getTema();
        $dataBerita             = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak             = $kontak->getKontak();   
        return view('informasiPublik',compact('dataKontak','tema','dataBerita','dataInformasiPublik','dataDesa'));
    }
    public function petaDesa()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $desa           = new Model_desa();  
        $berita         = new Model_berita();   
        $dataKontak     = $kontak->getKontak();
        $dataDesa       = $desa->getDesa();    
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $tema           = $tema->getTema();
        return view('petaDesa',compact('dataKontak','tema','dataDesa','dataBerita'));
    }
    public function artikel()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();  
        $artikel        = new Model_artikel();  
        $desa           = new Model_desa();  
        $berita         = new Model_berita();   
        $dataDesa       = $desa->getDesa();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak     = $kontak->getKontak();
        $dataArtikel    = $artikel->where('status','Sudah Validasi')->findAll();    
        $tema           = $tema->getTema();
        return view('artikel',compact('dataKontak','tema','dataArtikel','dataDesa','dataBerita'));
    }
    public function detailArtikel($id=null)
    {
        $kontak         = new Model_kontak();   
        $tema           = new Model_tema(); 
        $berita         = new Model_berita();     
        $artikel        = new Model_artikel();  
        $desa           = new Model_desa();  
        $dataDesa       = $desa->getDesa(); 
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $tema           = $tema->getTema();
        $dataArtikel    = $artikel->where('idArtikel',$id)->findAll();
        $dataKontak     = $kontak->getKontak();
        return view('detailArtikel',compact('dataKontak','tema','dataArtikel','dataBerita','dataDesa'));
    }
    public function berita()
    {
        $kontak         = new Model_kontak();   
        $tema           = new Model_tema();   
        $berita         = new Model_berita();   
        $desa           = new Model_desa();
        $kategori       = new Model_kategori();  
        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $dataBerita     = $berita->where('status','Sudah Validasi')->findAll();
        $dataKontak     = $kontak->getKontak();
        $dataKategori   = $kategori->getKategori();
        return view('berita',compact('dataKontak','tema','dataBerita','dataDesa','dataKategori'));
    }
    public function beritaFilter($id=null)
    {
        $kontak         = new Model_kontak();   
        $tema           = new Model_tema();   
        $berita         = new Model_berita();   
        $desa           = new Model_desa();
        $kategori       = new Model_kategori();  
        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $filterBerita   = [
            'status' => 'Sudah Validasi',
            'kategori' => $id,
        ];
        $dataBerita     = $berita->where($filterBerita)->findAll();
        $dataKontak     = $kontak->getKontak();
        $dataKategori   = $kategori->getKategori();
        return view('beritaFilter',compact('dataKontak','tema','dataBerita','dataDesa','dataKategori'));
    }
    public function detailBerita($id=null)
    {
        $kontak         = new Model_kontak();   
        $tema           = new Model_tema();   
        $berita         = new Model_berita();   
        $desa           = new Model_desa();  
        $dataDesa       = $desa->getDesa();
        $tema           = $tema->getTema();
        $dataBerita1    = $berita->orderBy('tanggalBerita','desc')->findAll(4);
        $dataBerita     = $berita->where('idBerita',$id)->findAll();
        $dataKontak     = $kontak->getKontak();
        return view('detailBerita',compact('dataKontak','tema','dataBerita','dataBerita1','dataDesa'));
    }
    public function galeri()
    {
        $kontak         = new Model_kontak();
        $tema           = new Model_tema();
        $galeri         = new Model_galeri_foto();  
        $desa           = new Model_desa();  
        $berita         = new Model_berita();
        $dataBerita     = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataDesa       = $desa->getDesa();
        $dataKontak     = $kontak->getKontak();    
        $dataGaleri     = $galeri->getGaleri();
        $tema           = $tema->getTema();
        return view('galeri',compact('dataKontak','tema','dataGaleri','dataDesa','dataBerita'));
    }
    public function permohonanSurat()
    {
        $jenisPermohonan        = new Model_jenisPermohonan();
        $dataJenisPermohonan    = $jenisPermohonan->getJenisPermohonan();
        return view('permohonanSurat',compact('dataJenisPermohonan'));
    }
    public function daftarPermohonan()
    {
        $session            = session();
        $permohonan         = new Model_permohonan();
        $dataPermohonan     = $permohonan->orderBy('idPermohonan', 'DESC')->where('nomorIndukKependudukan',$session->get('nik'))->findAll();
        return view('daftarPermohonanSurat',compact('dataPermohonan'));
    }
    public function profile($id=null)
    {
        $session        = session();
        $warga          = new Model_warga();
        $dataWarga      = $warga->where('nomorIndukKependudukan',$session->get('nik'))->findAll();
        return view('profile',compact('dataWarga'));
    }
    public function pengumuman()
    {
        $kontak             = new Model_kontak();
        $berita             = new Model_berita();    
        $tema               = new Model_tema();
        $pengumuman         = new Model_pengumuman();
        $desa               = new Model_desa();
        $dataDesa           = $desa->getDesa();   
        $dataPengumuman     = $pengumuman->orderBy('idPengumuman','desc')->findAll();
        $tema               = $tema->getTema();
        $dataBerita         = $berita->where('status','Sudah Validasi')->orderBy('tanggalBerita','desc')->findAll(4);
        $dataKontak         = $kontak->getKontak();
        return view('pengumuman',compact('dataKontak','tema','dataBerita','dataPengumuman','dataDesa'));
    }
}
