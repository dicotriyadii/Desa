<?php

namespace App\Controllers;
use App\Libraries\Pdfgenerator;
use App\Models\Model_data;
// use App\Models\Model_profil_desa;
// use App\Models\Model_sejarah_desa;
// use App\Models\Model_visiMisi;
// use App\Models\Model_struktur_pemerintah_desa;
// use App\Models\Model_strukturPKK;
// use App\Models\Model_struktur_lpm;
use App\Models\Model_warga;
// use App\Models\Model_dusun;
// use App\Models\Model_pendidikanTerakhir;
// use App\Models\Model_pendidikanDitempuh;
// use App\Models\Model_pekerjaan;
// use App\Models\Model_agama;
// use App\Models\Model_jenisKelamin;
// use App\Models\Model_umur;
// use App\Models\Model_carousel;
// use App\Models\Model_kontak;
// use App\Models\Model_produk_hukum;
// use App\Models\Model_informasi_publik;
// use App\Models\Model_log;
// use App\Models\Model_tema;
// use App\Models\Model_desa;
// use App\Models\Model_kategori;
// use App\Models\Model_pelaksanaan;
// use App\Models\Model_pendapatan;
// use App\Models\Model_pembelanjaan;
// use App\Models\Model_potensi;
// use App\Models\Model_struktur_bpd;
// use App\Models\Model_kritikSaran;
// use App\Models\Model_struktur_bumdes;


class Admin extends BaseController
{
    // Halaman Login
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
        // inisialisasi Varible
        $session        = session();
        $modelData      = new Model_data();      
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');   
        // Rekapitulasi data
        $jumlahWarga            = $modelData->getTotalWarga($kodeKecamatan,$kodeDesa);
        $jumlahLaki             = $modelData->getTotalLaki($kodeKecamatan,$kodeDesa);
        $jumlahPerempuan        = $modelData->getTotalPerempuan($kodeKecamatan,$kodeDesa);
        $jumlahKeluarga         = $modelData->getTotalKartuKeluarga($kodeKecamatan,$kodeDesa);
        $jumlahSedangPendidikan = $modelData->getTotalMenjalankanPendidikan($kodeKecamatan,$kodeDesa);
        $jumlahBekerja          = $modelData->getTotalBekerja($kodeKecamatan,$kodeDesa);
        $jumlahTidakBekerja     = $modelData->getTotalTidakBekerja($kodeKecamatan,$kodeDesa);
        $jumlahPenggunaBPJS     = $modelData->getTotalPenggunaBPJS($kodeKecamatan,$kodeDesa);
        $kritikSaran            = $modelData->getKritikSaran($kodeKecamatan,$kodeDesa);
        $dataResapmas           = $modelData->getResapmas($kodeKecamatan,$kodeDesa);
        $dataDesa               = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        return view('adminDashboard',compact('jumlahWarga','jumlahLaki','jumlahPerempuan','jumlahKeluarga','jumlahSedangPendidikan','jumlahBekerja','jumlahTidakBekerja','jumlahPenggunaBPJS','kritikSaran','dataDesa'));
    }
    // =======================================================================================
    // Data Desa
    public function wargaNegara()
    {
        $session                    = session();
        $kodeKecamatan              = $session->get('kodeKecamatan');
        $kodeDesa                   = $session->get('kodeDesa');
        $modelData                  = new Model_data();
        $data                       = $modelData->getWarga($kodeKecamatan,$kodeDesa);
        return view('adminWargaNegara',compact('data'));
    }
    public function wilayahAdministratif()
    {
        $session                        = session();
        $modelData                      = new Model_data();
        $kodeKecamatan                  = $session->get('kodeKecamatan');
        $kodeDesa                       = $session->get('kodeDesa');
        $jumlahWargaDusun1              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'45');
        $jumlahWargaDusun1Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'45','Laki - Laki');
        $jumlahWargaDusun1Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'45','PEREMPUAN');
        $jumlahWargaDusun2              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'46');
        $jumlahWargaDusun2Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'46','Laki - Laki');
        $jumlahWargaDusun2Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'46','PEREMPUAN');
        $jumlahWargaDusun3              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'47');
        $jumlahWargaDusun3Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'47','Laki - Laki');
        $jumlahWargaDusun3Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'47','PEREMPUAN');
        $jumlahWargaDusun4              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'48');
        $jumlahWargaDusun4Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'48','Laki - Laki');
        $jumlahWargaDusun4Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'48','PEREMPUAN');
        $jumlahWargaDusun5              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'49');
        $jumlahWargaDusun5Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'49','Laki - Laki');
        $jumlahWargaDusun5Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'49','PEREMPUAN');
        $jumlahWargaDusun6              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'50');
        $jumlahWargaDusun6Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'50','Laki - Laki');
        $jumlahWargaDusun6Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'50','PEREMPUAN');
        $jumlahWargaDusun7              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'51');
        $jumlahWargaDusun7Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'51','Laki - Laki');
        $jumlahWargaDusun7Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'51','PEREMPUAN');
        $jumlahWargaDusun8              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'52');
        $jumlahWargaDusun8Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'52','Laki - Laki');
        $jumlahWargaDusun8Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'52','PEREMPUAN');
        $jumlahWargaDusun9              = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'53');
        $jumlahWargaDusun9Laki          = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'53','Laki - Laki');
        $jumlahWargaDusun9Perempuan     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'53','PEREMPUAN');
        $jumlahWargaDusun10             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'54');
        $jumlahWargaDusun10Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'54','Laki - Laki');
        $jumlahWargaDusun10Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'54','PEREMPUAN');
        $jumlahWargaDusun11             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'55');
        $jumlahWargaDusun11Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'55','Laki - Laki');
        $jumlahWargaDusun11Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'55','PEREMPUAN');
        $jumlahWargaDusun12             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'56');
        $jumlahWargaDusun12Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'56','Laki - Laki');
        $jumlahWargaDusun12Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'56','PEREMPUAN');
        $jumlahWargaDusun13             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'57');
        $jumlahWargaDusun13Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'57','Laki - Laki');
        $jumlahWargaDusun13Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'57','PEREMPUAN');
        $jumlahWargaDusun14             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'58');
        $jumlahWargaDusun14Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'58','Laki - Laki');
        $jumlahWargaDusun14Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'58','PEREMPUAN');
        $jumlahWargaDusun15             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'59');
        $jumlahWargaDusun15Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'59','Laki - Laki');
        $jumlahWargaDusun15Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'59','PEREMPUAN');
        $jumlahWargaDusun16             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'60');
        $jumlahWargaDusun16Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'60','Laki - Laki');
        $jumlahWargaDusun16Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'60','PEREMPUAN');
        $jumlahWargaDusun17             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'61');
        $jumlahWargaDusun17Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'61','Laki - Laki');
        $jumlahWargaDusun17Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'61','PEREMPUAN');
        $jumlahWargaDusun18             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'62');
        $jumlahWargaDusun18Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'62','Laki - Laki');
        $jumlahWargaDusun18Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'62','PEREMPUAN');
        $jumlahWargaDusun19             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'63');
        $jumlahWargaDusun19Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'63','Laki - Laki');
        $jumlahWargaDusun19Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'63','PEREMPUAN');
        $jumlahWargaDusun20             = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'64');
        $jumlahWargaDusun20Laki         = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'64','Laki - Laki');
        $jumlahWargaDusun20Perempuan    = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'64','PEREMPUAN');
        $jumlahWargaDusunMawar          = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'65');
        $jumlahWargaDusunMawarLaki      = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'65','Laki - Laki');
        $jumlahWargaDusunMawarPerempuan = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'65','PEREMPUAN');
        $jumlahWargaDusunMelati         = $modelData->jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,'66');
        $jumlahWargaDusunMelatiLaki     = $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'66','Laki - Laki');
        $jumlahWargaDusunMelatiPerempuan= $modelData->jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,'66','PEREMPUAN');
        $dataRekapitulasi = [
            "DUSUN1" =>[
                            'jumlahWargaDusun1'         => $jumlahWargaDusun1,
                            'jumlahWargaDusun1Laki'     => $jumlahWargaDusun1Laki,
                            'jumlahWargaDusun1Perempuan'=> $jumlahWargaDusun1Perempuan,
                        ],
            "DUSUN2" =>[
                            'jumlahWargaDusun2'         => $jumlahWargaDusun2,
                            'jumlahWargaDusun2Laki'     => $jumlahWargaDusun2Laki,
                            'jumlahWargaDusun2Perempuan'=> $jumlahWargaDusun2Perempuan,
                        ],              
            "DUSUN3" =>[
                            'jumlahWargaDusun3'         => $jumlahWargaDusun3,
                            'jumlahWargaDusun3Laki'     => $jumlahWargaDusun3Laki,
                            'jumlahWargaDusun3Perempuan'=> $jumlahWargaDusun3Perempuan,
                        ],
            "DUSUN4" =>[
                            'jumlahWargaDusun4'         => $jumlahWargaDusun4,
                            'jumlahWargaDusun4Laki'     => $jumlahWargaDusun4Laki,
                            'jumlahWargaDusun4Perempuan'=> $jumlahWargaDusun4Perempuan,
                        ],
            "DUSUN5" =>[
                            'jumlahWargaDusun5'         => $jumlahWargaDusun5,
                            'jumlahWargaDusun5Laki'     => $jumlahWargaDusun5Laki,
                            'jumlahWargaDusun5Perempuan'=> $jumlahWargaDusun5Perempuan,
                        ],
            "DUSUN6" =>[
                            'jumlahWargaDusun6'         => $jumlahWargaDusun6,
                            'jumlahWargaDusun6Laki'     => $jumlahWargaDusun6Laki,
                            'jumlahWargaDusun6Perempuan'=> $jumlahWargaDusun6Perempuan,
                        ],
            "DUSUN7" =>[
                            'jumlahWargaDusun7'         => $jumlahWargaDusun7,
                            'jumlahWargaDusun7Laki'     => $jumlahWargaDusun7Laki,
                            'jumlahWargaDusun7Perempuan'=> $jumlahWargaDusun7Perempuan,
                        ],
            "DUSUN8" =>[
                            'jumlahWargaDusun8'         => $jumlahWargaDusun8,
                            'jumlahWargaDusun8Laki'     => $jumlahWargaDusun8Laki,
                            'jumlahWargaDusun8Perempuan'=> $jumlahWargaDusun8Perempuan,
                        ],
            "DUSUN9" =>[
                            'jumlahWargaDusun9'         => $jumlahWargaDusun9,
                            'jumlahWargaDusun9Laki'     => $jumlahWargaDusun9Laki,
                            'jumlahWargaDusun9Perempuan'=> $jumlahWargaDusun9Perempuan,
                        ],
            "DUSUN10" =>[
                            'jumlahWargaDusun10'         => $jumlahWargaDusun10,
                            'jumlahWargaDusun10Laki'     => $jumlahWargaDusun10Laki,
                            'jumlahWargaDusun10Perempuan'=> $jumlahWargaDusun10Perempuan,
                        ],
            "DUSUN11" =>[
                            'jumlahWargaDusun11'         => $jumlahWargaDusun11,
                            'jumlahWargaDusun11Laki'     => $jumlahWargaDusun11Laki,
                            'jumlahWargaDusun11Perempuan'=> $jumlahWargaDusun11Perempuan,
                        ],
            "DUSUN12" =>[
                            'jumlahWargaDusun12'         => $jumlahWargaDusun12,
                            'jumlahWargaDusun12Laki'     => $jumlahWargaDusun12Laki,
                            'jumlahWargaDusun12Perempuan'=> $jumlahWargaDusun12Perempuan,
                        ],
            "DUSUN13" =>[
                            'jumlahWargaDusun13'         => $jumlahWargaDusun13,
                            'jumlahWargaDusun13Laki'     => $jumlahWargaDusun13Laki,
                            'jumlahWargaDusun13Perempuan'=> $jumlahWargaDusun13Perempuan,
                        ],
            "DUSUN14" =>[
                            'jumlahWargaDusun14'         => $jumlahWargaDusun14,
                            'jumlahWargaDusun14Laki'     => $jumlahWargaDusun14Laki,
                            'jumlahWargaDusun14Perempuan'=> $jumlahWargaDusun14Perempuan,
                        ],
            "DUSUN15" =>[
                            'jumlahWargaDusun15'         => $jumlahWargaDusun15,
                            'jumlahWargaDusun15Laki'     => $jumlahWargaDusun15Laki,
                            'jumlahWargaDusun15Perempuan'=> $jumlahWargaDusun15Perempuan,
                        ],
            "DUSUN16" =>[
                            'jumlahWargaDusun16'         => $jumlahWargaDusun16,
                            'jumlahWargaDusun16Laki'     => $jumlahWargaDusun16Laki,
                            'jumlahWargaDusun16Perempuan'=> $jumlahWargaDusun16Perempuan,
                        ],
            "DUSUN17" =>[
                            'jumlahWargaDusun17'         => $jumlahWargaDusun17,
                            'jumlahWargaDusun17Laki'     => $jumlahWargaDusun17Laki,
                            'jumlahWargaDusun17Perempuan'=> $jumlahWargaDusun17Perempuan,
                        ],
            "DUSUN18" =>[
                            'jumlahWargaDusun18'         => $jumlahWargaDusun18,
                            'jumlahWargaDusun18Laki'     => $jumlahWargaDusun18Laki,
                            'jumlahWargaDusun18Perempuan'=> $jumlahWargaDusun18Perempuan,
                        ],
            "DUSUN19" =>[
                            'jumlahWargaDusun19'         => $jumlahWargaDusun19,
                            'jumlahWargaDusun19Laki'     => $jumlahWargaDusun19Laki,
                            'jumlahWargaDusun19Perempuan'=> $jumlahWargaDusun19Perempuan,
                        ],
            "DUSUN20" =>[
                            'jumlahWargaDusun20'         => $jumlahWargaDusun20,
                            'jumlahWargaDusun20Laki'     => $jumlahWargaDusun20Laki,
                            'jumlahWargaDusun20Perempuan'=> $jumlahWargaDusun20Perempuan,
                        ],
            "DUSUNMawar" =>[
                            'jumlahWargaDusunMawar'         => $jumlahWargaDusunMawar,
                            'jumlahWargaDusunMawarLaki'     => $jumlahWargaDusunMawarLaki,
                            'jumlahWargaDusunMawarPerempuan'=> $jumlahWargaDusunMawarPerempuan,
                        ],
            "DUSUNMelati" =>[
                            'jumlahWargaDusunMelati'         => $jumlahWargaDusunMelati,
                            'jumlahWargaDusunMelatiLaki'     => $jumlahWargaDusunMelatiLaki,
                            'jumlahWargaDusunMelatiPerempuan'=> $jumlahWargaDusunMelatiPerempuan,
                        ],
        ];
        return view('adminWilayahAdministratif',compact('dataRekapitulasi'));
        // return view('maintenancePage');
    }
    public function pendidikanDalamKK()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataPendidikan1    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"TIDAK/BELUM SEKOLAH");
        $dataPendidikan2    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"BELUM TAMAT SD/SEDERAJAT");
        $dataPendidikan3    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"TAMAT SD/SEDERAJAT");
        $dataPendidikan4    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"SLTP/SEDERAJAT");
        $dataPendidikan5    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"SLTA/ SEDERAJAT");
        $dataPendidikan6    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"DIPLOMA I / II");
        $dataPendidikan7    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"AKADEMI/ DIPLOMA III/S. MUDA");
        $dataPendidikan8    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"DIPLOMA IV/ STRATA I");
        $dataPendidikan9    = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"STRATA II");
        $dataPendidikan10   = $modelData->jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,"STRATA III");
        
        $rekapitulasiDataPendidikan = [
            "1"     => [
                        "jenisPendidikan"   => "TIDAK/BELUM SEKOLAH",
                        "jumlah"            => $dataPendidikan1,
                    ],
            "2"     => [
                        "jenisPendidikan"   => "BELUM TAMAT SD/SEDERAJAT",
                        "jumlah"            => $dataPendidikan2,
                    ],
            "3"     => [
                        "jenisPendidikan"   => "TAMAT SD/SEDERAJAT",
                        "jumlah"            => $dataPendidikan3,
                    ],
            "4"     => [
                        "jenisPendidikan"   => "SLTP/SEDERAJAT",
                        "jumlah"            => $dataPendidikan4,
                    ],
            "5"     => [
                        "jenisPendidikan"   => "SLTA/ SEDERAJAT",
                        "jumlah"            => $dataPendidikan5,
                    ],
            "6"     => [
                        "jenisPendidikan"   => "DIPLOMA I / II",
                        "jumlah"            => $dataPendidikan6,
                    ],
            "7"     => [
                        "jenisPendidikan"   => "AKADEMI/ DIPLOMA III/S. MUDA",
                        "jumlah"            => $dataPendidikan7,
                    ],
            "8"     => [
                        "jenisPendidikan"   => "DIPLOMA IV/ STRATA I",
                        "jumlah"            => $dataPendidikan8,
                    ],
            "9"     => [
                        "jenisPendidikan"   => "STRATA II",
                        "jumlah"            => $dataPendidikan9,
                    ],
            "10"     => [
                        "jenisPendidikan"   => "STRATA III",
                        "jumlah"            => $dataPendidikan10,
                    ],
        ];
        return view('adminPendidikanDalamKK',compact('rekapitulasiDataPendidikan'));
    }
    public function pendidikanDitempuh()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataPendidikan1    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"BELUM MASUK TK / KELOMPOK BERMAIN");
        $dataPendidikan2    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG TK / KELOMPOK BERMAIN");
        $dataPendidikan3    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"TIDAK PERNAH SEKOLAH");
        $dataPendidikan4    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"TIDAK TAMAT SD / SEDERAJAT");
        $dataPendidikan5    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SD / SEDERAJAT");
        $dataPendidikan6    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SLTP / SEDERAJAT");
        $dataPendidikan7    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SLTA / SEDERAJAT");
        $dataPendidikan8    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG D-1 / SEDERAJAT");
        $dataPendidikan9    = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG D-2 / SEDERAJAT");
        $dataPendidikan10   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG D-3 / SEDERAJAT");
        $dataPendidikan11   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG S-1 / SEDERAJAT");
        $dataPendidikan12   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG S-2 / SEDERAJAT");
        $dataPendidikan13   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG S-3 / SEDERAJAT");
        $dataPendidikan14   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SLB A / SEDERAJAT");
        $dataPendidikan15   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SLB B / SEDERAJAT");
        $dataPendidikan15   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"SEDANG SLB C / SEDERAJAT");
        $dataPendidikan16   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN / ARAB");
        $dataPendidikan17   = $modelData->jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,"TIDAK SEDANG SEKOLAH");
        
        $rekapitulasiDataPendidikan = [
            "1"     => [
                        "jenisPendidikan"   => "BELUM MASUK TK / KELOMPOK BERMAIN",
                        "jumlah"            => $dataPendidikan1,
                    ],
            "2"     => [
                        "jenisPendidikan"   => "SEDANG TK / KELOMPOK BERMAIN",
                        "jumlah"            => $dataPendidikan2,
                    ],
            "3"     => [
                        "jenisPendidikan"   => "TIDAK PERNAH SEKOLAH",
                        "jumlah"            => $dataPendidikan3,
                    ],
            "4"     => [
                        "jenisPendidikan"   => "TIDAK TAMAT SD / SEDERAJAT",
                        "jumlah"            => $dataPendidikan4,
                    ],
            "5"     => [
                        "jenisPendidikan"   => "SEDANG SD / SEDERAJAT",
                        "jumlah"            => $dataPendidikan5,
                    ],
            "6"     => [
                        "jenisPendidikan"   => "SEDANG SLTP / SEDERAJAT",
                        "jumlah"            => $dataPendidikan6,
                    ],
            "7"     => [
                        "jenisPendidikan"   => "SEDANG SLTA / SEDERAJAT",
                        "jumlah"            => $dataPendidikan7,
                    ],
            "8"     => [
                        "jenisPendidikan"   => "SEDANG D-1 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan8,
                    ],
            "9"     => [
                        "jenisPendidikan"   => "SEDANG D-2 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan9,
                    ],
            "10"     => [
                        "jenisPendidikan"   => "SEDANG D-3 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "11"     => [
                        "jenisPendidikan"   => "SEDANG S-1 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "12"     => [
                        "jenisPendidikan"   => "SEDANG S-2 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "13"     => [
                        "jenisPendidikan"   => "SEDANG S-3 / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "14"     => [
                        "jenisPendidikan"   => "SEDANG SLB A / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "15"     => [
                        "jenisPendidikan"   => "SEDANG SLB B / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "16"     => [
                        "jenisPendidikan"   => "SEDANG SLB C / SEDERAJAT",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "17"     => [
                        "jenisPendidikan"   => "TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN / ARAB",
                        "jumlah"            => $dataPendidikan10,
                    ],
            "18"     => [
                        "jenisPendidikan"   => "TIDAK SEDANG SEKOLAH",
                        "jumlah"            => $dataPendidikan10,
                    ],
        ];
        return view('adminPendidikanDitempuh',compact('rekapitulasiDataPendidikan'));
        // return view('maintenancePage');
    }
    public function pekerjaan()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataPekerjaan1    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"BELUM/TIDAK BEKERJA");
        $dataPekerjaan2    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"MENGURUS RUMAH TANGGA");
        $dataPekerjaan3    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PELAJAR/MAHASISWA");
        $dataPekerjaan4    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PENSIUNAN");
        $dataPekerjaan5    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PEGAWAI NEGERI SIPIL (PNS)");
        $dataPekerjaan6    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"TENTARA NASIONAL INDONESIA (TNI)");
        $dataPekerjaan7    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KEPOLISIAN RI (POLRI)");
        $dataPekerjaan8    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PERDAGANGAN");
        $dataPekerjaan9    = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PETANI/PEKEBUN");
        $dataPekerjaan10   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PETERNAK");
        $dataPekerjaan11   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"NELAYAN/PERIKANAN");
        $dataPekerjaan12   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"INDUSTRI");
        $dataPekerjaan13   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KONSTRUKSI");
        $dataPekerjaan14   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"TRANSPORTASI");
        $dataPekerjaan15   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KARYAWAN SWASTA");
        $dataPekerjaan16   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KARYAWAN BUMN");
        $dataPekerjaan17   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KARYAWAN BUMD");
        $dataPekerjaan18   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"KARYAWAN HONORER");
        $dataPekerjaan19   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"BURUH HARIAN LEPAS");
        $dataPekerjaan20   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"BURUH TANI/PERKEBUNAN");
        $dataPekerjaan21   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"BURUH PETERNAKAN");
        $dataPekerjaan22   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"PEMBANTU RUMAH TANGGA");
        $dataPekerjaan23   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"TUKANG LISTRIK");
        $dataPekerjaan24   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"TUKANG BATU");
        $dataPekerjaan25   = $modelData->jumlahWargaBekerja($kodeKecamatan,$kodeDesa,"TUKANG KAYU");
        
        $rekapitulasiDataPekerjaan = [
            "1"     => [
                        "jenisPekerjaan"   => "BELUM/TIDAK BEKERJA",
                        "jumlah"            => $dataPekerjaan1,
                    ],
            "2"     => [
                        "jenisPekerjaan"   => "MENGURUS RUMAH TANGGA",
                        "jumlah"            => $dataPekerjaan2,
                    ],
            "3"     => [
                        "jenisPekerjaan"   => "PELAJAR/MAHASISWA",
                        "jumlah"            => $dataPekerjaan3,
                    ],
            "4"     => [
                        "jenisPekerjaan"   => "PENSIUNAN",
                        "jumlah"            => $dataPekerjaan4,
                    ],
            "5"     => [
                        "jenisPekerjaan"   => "PEGAWAI NEGERI SIPIL (PNS)",
                        "jumlah"            => $dataPekerjaan5,
                    ],
            "6"     => [
                        "jenisPekerjaan"   => "TENTARA NASIONAL INDONESIA (TNI)",
                        "jumlah"            => $dataPekerjaan6,
                    ],
            "7"     => [
                        "jenisPekerjaan"   => "KEPOLISIAN RI (POLRI)",
                        "jumlah"            => $dataPekerjaan7,
                    ],
            "8"     => [
                        "jenisPekerjaan"   => "PERDAGANGAN",
                        "jumlah"            => $dataPekerjaan8,
                    ],
            "9"     => [
                        "jenisPekerjaan"   => "PETANI/PEKEBUN",
                        "jumlah"            => $dataPekerjaan9,
                    ],
            "10"     => [
                        "jenisPekerjaan"   => "PETERNAK",
                        "jumlah"            => $dataPekerjaan10,
                    ],
            "11"     => [
                        "jenisPekerjaan"   => "NELAYAN/PERIKANAN",
                        "jumlah"            => $dataPekerjaan11,
                    ],
            "12"     => [
                        "jenisPekerjaan"   => "INDUSTRI",
                        "jumlah"            => $dataPekerjaan12,
                    ],
            "13"     => [
                        "jenisPekerjaan"   => "KONSTRUKSI",
                        "jumlah"            => $dataPekerjaan13,
                    ],
            "14"     => [
                        "jenisPekerjaan"   => "TRANSPORTASI",
                        "jumlah"            => $dataPekerjaan14,
                    ],
            "15"     => [
                        "jenisPekerjaan"   => "KARYAWAN SWASTA",
                        "jumlah"            => $dataPekerjaan15,
                    ],
            "16"     => [
                        "jenisPekerjaan"   => "KARYAWAN BUMN",
                        "jumlah"            => $dataPekerjaan16,
                    ],
            "17"     => [
                        "jenisPekerjaan"   => "KARYAWAN BUMD",
                        "jumlah"            => $dataPekerjaan17,
                    ],
            "18"     => [
                        "jenisPekerjaan"   => "KARYAWAN HONORER",
                        "jumlah"            => $dataPekerjaan18,
                    ],
            "19"     => [
                        "jenisPekerjaan"   => "BURUH HARIAN LEPAS",
                        "jumlah"            => $dataPekerjaan19,
                    ],
            "20"     => [
                        "jenisPekerjaan"   => "BURUH TANI/PERKEBUNAN",
                        "jumlah"            => $dataPekerjaan20,
                    ],
            "21"     => [
                        "jenisPekerjaan"   => "BURUH PETERNAKAN",
                        "jumlah"            => $dataPekerjaan21,
                    ],
            "22"     => [
                        "jenisPekerjaan"   => "PEMBANTU RUMAH TANGGA",
                        "jumlah"            => $dataPekerjaan22,
                    ],
            "23"     => [
                        "jenisPekerjaan"   => "TUKANG LISTRIK",
                        "jumlah"            => $dataPekerjaan23,
                    ],
            "24"     => [
                        "jenisPekerjaan"   => "TUKANG BATU",
                        "jumlah"            => $dataPekerjaan24,
                    ],
            "25"     => [
                        "jenisPekerjaan"   => "TUKANG KAYU",
                        "jumlah"            => $dataPekerjaan25,
                    ],
        ];
        return view('adminPekerjaan',compact('rekapitulasiDataPekerjaan'));
    }
    public function agama()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataAgama1         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"Islam");
        $dataAgama2         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"Kristen");
        $dataAgama3         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"Katolik");
        $dataAgama4         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"Hindu");
        $dataAgama5         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"Budha");
        $dataAgama6         = $modelData->jumlahWargaAgama($kodeKecamatan,$kodeDesa,"SEDANG SLTP / SEDERAJAT");
        
        $rekapitulasidataAgama = [
            "1"     => [
                        "jenisAgama"        => "Islam",
                        "jumlah"            => $dataAgama1,
                    ],
            "2"     => [
                        "jenisAgama"        => "Kristen",
                        "jumlah"            => $dataAgama2,
                    ],
            "3"     => [
                        "jenisAgama"        => "Katolik",
                        "jumlah"            => $dataAgama3,
                    ],
            "4"     => [
                        "jenisAgama"        => "Hindu",
                        "jumlah"            => $dataAgama4,
                    ],
            "5"     => [
                        "jenisAgama"        => "Budha",
                        "jumlah"            => $dataAgama5,
            ],
            "6"     => [
                        "jenisAgama"        => "Konghucu",
                        "jumlah"            => $dataAgama6,
                    ]
        ];
        return view('adminAgama',compact('rekapitulasidataAgama'));
    }
    public function jenisKelamin()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataKelamin1       = $modelData->jumlahWargaJenisKelamin($kodeKecamatan,$kodeDesa,"Laki - Laki");
        $dataKelamin2       = $modelData->jumlahWargaJenisKelamin($kodeKecamatan,$kodeDesa,"Perempuan");
        
        $rekapitulasidataKelamin = [
            "1"     => [
                        "jenisKelamin"      => "Laki Laki",
                        "jumlah"            => $dataKelamin1,
                    ],
            "2"     => [
                        "jenisKelamin"      => "Perempuan",
                        "jumlah"            => $dataKelamin2,
                    ]
        ];
        return view('adminJenisKelamin',compact('rekapitulasidataKelamin'));
    }
    public function umur()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataUmur1          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"Dibawah 1 Tahun");
        $dataUmur2          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"2 s/d 4 Tahun");
        $dataUmur3          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"5 s/d 9 Tahun");
        $dataUmur4          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"10 s/d 14 Tahun");
        $dataUmur5          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"15 s/d 19 Tahun");
        $dataUmur6          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"20 s/d 24 Tahun");
        $dataUmur7          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"25 s/d 29 Tahun");
        $dataUmur8          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"30 s/d 34 Tahun");
        $dataUmur9          = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"35 s/d 39 Tahun");
        $dataUmur10         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"40 s/d 44 Tahun");
        $dataUmur11         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"45 s/d 49 Tahun");
        $dataUmur12         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"50 s/d 54 tahun");
        $dataUmur13         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"55 s/d 49 Tahun");
        $dataUmur14         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"60 s/d 64 Tahun");
        $dataUmur15         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"65 s/d 69 Tahun");
        $dataUmur16         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"70 s/d 74 Tahun");
        $dataUmur17         = $modelData->jumlahWargaUmur($kodeKecamatan,$kodeDesa,"Diatas 75 Tahun");
        
        $rekapitulasiDataPekerjaan = [
            "1"     => [
                        "jenisPekerjaan"   => "Dibawah 1 Tahun",
                        "jumlah"            => $dataUmur1,
                    ],
            "2"     => [
                        "jenisPekerjaan"   => "2 s/d 4 Tahun",
                        "jumlah"            => $dataUmur2,
                    ],
            "3"     => [
                        "jenisPekerjaan"   => "5 s/d 9 Tahun",
                        "jumlah"            => $dataUmur3,
                    ],
            "4"     => [
                        "jenisPekerjaan"   => "10 s/d 14 Tahun",
                        "jumlah"            => $dataUmur4,
                    ],
            "5"     => [
                        "jenisPekerjaan"   => "15 s/d 19 Tahun",
                        "jumlah"            => $dataUmur5,
                    ],
            "6"     => [
                        "jenisPekerjaan"   => "20 s/d 24 Tahun",
                        "jumlah"            => $dataUmur6,
                    ],
            "7"     => [
                        "jenisPekerjaan"   => "25 s/d 29 Tahun",
                        "jumlah"            => $dataUmur7,
                    ],
            "8"     => [
                        "jenisPekerjaan"   => "30 s/d 34 Tahun",
                        "jumlah"            => $dataUmur8,
                    ],
            "9"     => [
                        "jenisPekerjaan"   => "35 s/d 39 Tahun",
                        "jumlah"            => $dataUmur9,
                    ],
            "10"     => [
                        "jenisPekerjaan"   => "40 s/d 44 Tahun",
                        "jumlah"            => $dataUmur10,
                    ],
            "11"     => [
                        "jenisPekerjaan"   => "45 s/d 49 Tahun",
                        "jumlah"            => $dataUmur11,
                    ],
            "12"     => [
                        "jenisPekerjaan"   => "50 s/d 54 tahun",
                        "jumlah"            => $dataUmur12,
                    ],
            "13"     => [
                        "jenisPekerjaan"   => "55 s/d 49 Tahun",
                        "jumlah"            => $dataUmur13,
                    ],
            "14"     => [
                        "jenisPekerjaan"   => "60 s/d 64 Tahun",
                        "jumlah"            => $dataUmur14,
                    ],
            "15"     => [
                        "jenisPekerjaan"   => "65 s/d 69 Tahun",
                        "jumlah"            => $dataUmur15,
                    ],
            "16"     => [
                        "jenisPekerjaan"   => "70 s/d 74 Tahun",
                        "jumlah"            => $dataUmur16,
                    ],
            "17"     => [
                        "jenisPekerjaan"   => "Diatas 75 Tahun",
                        "jumlah"            => $dataUmur17,
                    ]
        ];
    return view('adminUmur',compact('rekapitulasiDataPekerjaan'));
    }
    public function bpjs()
    {
        $session            = session();
        $warga              = new Model_warga();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataWarga          = $modelData->getBPJS($kodeKecamatan,$kodeDesa);
        return view('adminBPJS',compact('dataWarga'));
        // return view('maintenancePage');
    }
    public function bantuanSosial()
    {
        // $warga          = new Model_warga();
        // $dataFilter = [
        //     'pekerjaan' => 'BELUM/TIDAK BEKERJA',
        //     'umur >' => 18,
        // ];
        // $dataWarga      = $warga->where($dataFilter)->findAll();
        // return view('adminBantuanSosial',compact('dataWarga'));
        return view('maintenancePage');
    }
    // =======================================================================================
    // Informasi
    public function artikel()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getArtikel($kodeKecamatan, $kodeDesa);
        return view('adminArtikel',compact('data'));
    }
    public function berita()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataKategori   = $modelData->getKategori($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getBerita($kodeKecamatan,$kodeDesa);
        return view('adminBerita',compact('data','dataKategori'));
    }
    public function kategori()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getKategori($kodeKecamatan,$kodeDesa);
        return view('adminKategori',compact('data'));
    }
    public function galeri()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getGaleri($kodeKecamatan,$kodeDesa);
        return view('adminGaleriFoto',compact('data'));
    }
    public function pengumuman()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getPengumuman($kodeKecamatan,$kodeDesa);
        return view('adminPengumuman',compact('data'));
    }
    public function pemberitahuan()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getPemberitahuan($kodeKecamatan,$kodeDesa);
        return view('adminPemberitahuan',compact('data'));
    }
    // =======================================================================================
    // Profil Desa
    public function profilDesa()
    {
        $session        = session();
        $profilDesa     = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $profilDesa->getProfilDesa($kodeKecamatan,$kodeDesa);
        return view('adminProfilDesa',compact('data'));
    }
    public function profilUmum()
    {
        $session            = session();
        $profilDesa         = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataTataGunaLahan  = $profilDesa->getTataGunaLahan($kodeKecamatan,$kodeDesa);
        $dataProduksi       = $profilDesa->getProduksi($kodeKecamatan,$kodeDesa);
        return view('adminProfilUmum',compact('dataTataGunaLahan','dataProduksi'));
    }
    public function profilRawanBencana()
    {
        $session            = session();
        $profilDesa         = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataRawanBencana   = $profilDesa->getRawanBencana($kodeKecamatan,$kodeDesa);
        $dataOrbitasi       = $profilDesa->getOrbitasi($kodeKecamatan,$kodeDesa);
        return view('adminProfilRawanBencana',compact('dataRawanBencana','dataOrbitasi'));
    }
    public function profilSarana()
    {
        $session            = session();
        $profilDesa         = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataKantorDesa     = $profilDesa->getKantorDesa($kodeKecamatan,$kodeDesa);
        $dataKesehatan      = $profilDesa->getKesehatan($kodeKecamatan,$kodeDesa);
        $dataPendidikan     = $profilDesa->getPendidikan($kodeKecamatan,$kodeDesa);
        $dataPeribadatan    = $profilDesa->getPeribadatan($kodeKecamatan,$kodeDesa);
        $dataTransportasi   = $profilDesa->getTransportasi($kodeKecamatan,$kodeDesa);
        $dataAirBersih      = $profilDesa->getAirBersih($kodeKecamatan,$kodeDesa);
        $dataIrigasi        = $profilDesa->getIrigasi($kodeKecamatan,$kodeDesa);
        $dataSanitasi       = $profilDesa->getSanitasi($kodeKecamatan,$kodeDesa);
        $dataOlahraga       = $profilDesa->getOlahraga($kodeKecamatan,$kodeDesa);
        return view('adminProfilSaranaPrasarana',compact('dataKantorDesa','dataKesehatan','dataPendidikan','dataPeribadatan','dataTransportasi','dataAirBersih','dataIrigasi','dataSanitasi','dataOlahraga'));
    }
    public function profilKelembagaan()
    {
        $session            = session();
        $profilDesa         = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataKemasyarakatan = $profilDesa->getKemasyarakatan($kodeKecamatan,$kodeDesa);
        $dataAdat           = $profilDesa->getAdat($kodeKecamatan,$kodeDesa);
        return view('adminProfilSaranaKelembagaan',compact('dataKemasyarakatan','dataAdat'));
    }
    public function profilKeamanan()
    {
        $session            = session();
        $profilDesa         = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataKeamanan       = $profilDesa->getKeamanan($kodeKecamatan,$kodeDesa);
        return view('adminProfilKeamanan',compact('dataKeamanan'));
    }
    // public function sejarahDesa()
    // {
    //     $session        = session();
    //     $sejarahDesa     = new Model_data();
    //     $kodeKecamatan  = $session->get('kodeKecamatan');
    //     $kodeDesa       = $session->get('kodeDesa');
    //     $data           = $sejarahDesa->getSejarahDesa($kodeKecamatan,$kodeDesa);
        
    //     return view('adminSejarahDesa',compact('data'));
    // }
    public function potensiUnggulan()
    {
        $session            = session();
        $produk             = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataJenisPotensi   = $produk->getJenisPotensi();
        $data               = $produk->getPotensi($kodeKecamatan,$kodeDesa);
        return view('adminPotensiDesa',compact('data','dataJenisPotensi'));
    }
    public function kepemilikanTanah()
    {
        $session                = session();
        $produk                 = new Model_data();
        $kodeKecamatan          = $session->get('kodeKecamatan');
        $kodeDesa               = $session->get('kodeDesa');
        $dataKepemilikanTanah   = $produk->getPemilikTanah($kodeKecamatan,$kodeDesa);
        return view('adminKepemilikanTanah',compact('dataKepemilikanTanah'));
    }
    // Pemerintah Desa
    public function visiMisi()
    {
        $session        = session();
        $visiMisi       = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $visiMisi->getVisiMisi($kodeKecamatan,$kodeDesa);
        return view('adminVisiMisi',compact('data'));
    }
    public function pemerintahDesa()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataWarga      = $modelData->getWargaAll($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getStrukturPemerintahDesa($kodeKecamatan,$kodeDesa);
        return view('adminPemerintahDesa',compact('data','dataWarga'));
    }
    public function pkk()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataWarga      = $modelData->getWargaAll($kodeKecamatan,$kodeDesa);
        $dataDasawisma  = $modelData->getDasawisma($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getStrukturPKK($kodeKecamatan,$kodeDesa);
        return view('adminPKK',compact('data','dataWarga','dataDasawisma'));
    }
    public function dasawisma()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataDusun      = $modelData->getDusun();
        $data           = $modelData->getDasawisma($kodeKecamatan,$kodeDesa);
        return view('adminDasawisma',compact('data','dataDusun'));
    }
    public function lpm()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataWarga      = $modelData->getWargaAll($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getStrukturLPM();
        return view('adminLPM',compact('data','dataWarga'));
    }
    public function bpd()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataWarga      = $modelData->getWargaAll($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getStrukturBPD();
        return view('adminBPD',compact('data','dataWarga'));
    }
    public function bumdes()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $dataWarga      = $modelData->getWargaAll($kodeKecamatan,$kodeDesa);
        $data           = $modelData->getStrukturBumdes();
        return view('adminBumdes',compact('data','dataWarga'));
    }
    public function danaDesa()
    {
        return view('adminDanaDesa');
    }
    // =======================================================================================
    // Pemerintah Desa
    public function produkHukum()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getProdukHukum($kodeKecamatan,$kodeDesa);
        return view('adminProdukHukum',compact('data'));
    }
    public function informasiPublik()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getInformasiPublik($kodeKecamatan,$kodeDesa);
        return view('adminInformasiPublik',compact('data'));
    }
    // =======================================================================================
    // Setting
    public function carousel()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getCarousel($kodeKecamatan,$kodeDesa);
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

    // =======================================================================================
    // Download
    public function downloadBerkasPemilikTanah($id=null)
	{
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getDetailPemilikTanah($kodeKecamatan,$kodeDesa,$id);
		return $this->response->download('suratTanah/'.$data[0]['berkas'], null);
	}
    public function downloadProdukHukum($id=null)
	{
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data = $modelData->getDetailProdukHukum($kodeKecamatan,$kodeDesa,$id);
		return $this->response->download('produkHukum/'.$data[0]['berkasProdukHukum'], null);
	}
    public function downloadInformasiPublik($id=null)
	{
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data = $modelData->getDetailInformasiPublik($kodeKecamatan,$kodeDesa,$id);
		return $this->response->download('informasiPublik/'.$data[0]['berkasInformasiPublik'], null);
	}
    public function downloadInformasiRegulasi($id=null)
	{
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data = $modelData->getDetailRegulasi($kodeKecamatan,$kodeDesa,$id);
		return $this->response->download('regulasi/'.$data[0]['berkas'], null);
	}
    public function downloadInformasi($id=null)
	{
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data = $modelData->getDetailInformasi($kodeKecamatan,$kodeDesa,$id);
		return $this->response->download('informasi/'.$data[0]['berkas'], null);
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
    public function downloadContohFormat()
    {
        return $this->response->download('berkas/formatUploadData.xlsx', null);
    }
    public function downloadTataCaraUploadVideo()
    {
        return $this->response->download('berkas/tataCaraUploadVideo.docx', null);
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
    // =======================================================================================
    // Lainnya
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

    // =======================================================================================
    // Dana Desa
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
    public function detailWarga($id=null)
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getWargaDetail($kodeKecamatan,$kodeDesa,$id);
        $dataDesa       = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        return view('adminDetailWargaNegara',compact('data','dataDesa'));
    }
    public function permohonanInformasi()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getPermohonanInformasi($kodeKecamatan,$kodeDesa);
        return view('adminPermohonanInformasi',compact('data'));
    }
    public function regulasi()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getRegulasi($kodeKecamatan,$kodeDesa);
        return view('adminInformasiRegulasi',compact('data'));
    }
    public function informasi()
    {
        $session        = session();
        $modelData      = new Model_data();
        $kodeKecamatan  = $session->get('kodeKecamatan');
        $kodeDesa       = $session->get('kodeDesa');
        $data           = $modelData->getInformasi($kodeKecamatan,$kodeDesa);
        return view('adminInformasi',compact('data'));
    }
}
