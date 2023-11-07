<?php

namespace App\Controllers;
use App\Models\Model_data;

class Page extends BaseController
{
    // Halaman Pengguna
    public function LandingPage()
    {        
        $modelData  = new Model_data();
        $session    = session();
        $ses_data = [
            'kodeKecamatan' => "120715",
            'kodeDesa'      => "1207242008",
        ];
        $session->set($ses_data);
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        // data
        $dataCarousel        = $modelData->getCarousel($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataPemberitahuan   = $modelData->getPemberitahuan($kodeKecamatanLog,$kodeDesaLog);
        $dataBerita          = $modelData->getBeritaLimit($kodeKecamatanLog,$kodeDesaLog);
        $dataPengumuman      = $modelData->getPengumumanLimit($kodeKecamatanLog,$kodeDesaLog);
        $dataArtikel         = $modelData->getArtikelLimit($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataVisiMisi        = $modelData->getVisiMisi($kodeKecamatanLog,$kodeDesaLog);
        $dataPemerintah      = $modelData->getStrukturPemerintahDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataGaleri          = $modelData->getGaleri($kodeKecamatanLog,$kodeDesaLog);
        if($dataCarousel == null || $dataDesa == null || $dataPemberitahuan == null || $dataBerita == null || $dataPengumuman == null || $dataArtikel == null || $dataKontak == null || $dataVisiMisi == null || $dataPemerintah == null || $dataGaleri == null ){
            return view('FE/notifikasiPage');
        }
        return view('FE/landingPage',compact('dataDesa','dataCarousel','dataPemberitahuan','dataBerita','dataPengumuman','dataArtikel','dataKontak','dataVisiMisi','dataPemerintah','dataGaleri'));
    }
    public function sejarah()
    {   
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataSejarah         = $modelData->getSejarahDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/sejarah',compact('dataSejarah','dataDesa','dataKontak'));
    }
    public function profilWilayah()
    {
        $modelData              = new Model_data();
        $session                = session();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $dataDesa               = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak             = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataProfil             = $modelData->getProfilDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataTataGunaLahan      = $modelData->getTataGunaLahan($kodeKecamatanLog,$kodeDesaLog);
        $dataProduksi           = $modelData->getProduksi($kodeKecamatanLog,$kodeDesaLog);
        $dataRawanBencana       = $modelData->getRawanBencana($kodeKecamatanLog,$kodeDesaLog);
        $dataOrbitasi           = $modelData->getOrbitasi($kodeKecamatanLog,$kodeDesaLog);
        $dataKantorDesa         = $modelData->getKantorDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKesehatan          = $modelData->getKesehatan($kodeKecamatanLog,$kodeDesaLog);
        $dataPendidikan         = $modelData->getPendidikan($kodeKecamatanLog,$kodeDesaLog);
        $dataPeribadatan        = $modelData->getPeribadatan($kodeKecamatanLog,$kodeDesaLog);
        $dataTransportasi       = $modelData->getTransportasi($kodeKecamatanLog,$kodeDesaLog);
        $dataAirBersih          = $modelData->getAirBersih($kodeKecamatanLog,$kodeDesaLog);
        $dataIrigasi            = $modelData->getIrigasi($kodeKecamatanLog,$kodeDesaLog);
        $dataSanitasi           = $modelData->getSanitasi($kodeKecamatanLog,$kodeDesaLog);
        $dataOlahraga           = $modelData->getOlahraga($kodeKecamatanLog,$kodeDesaLog);
        $dataKemasyarakatan     = $modelData->getKemasyarakatan($kodeKecamatanLog,$kodeDesaLog);
        $dataAdat               = $modelData->getAdat($kodeKecamatanLog,$kodeDesaLog);
        $dataKeamanan           = $modelData->getKeamanan($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/profilWilayah', compact('dataDesa','dataKontak','dataProfil'));
    }
    public function visiMisi()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataVisiMisi        = $modelData->getVisiMisi($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/visiMisi',compact('dataVisiMisi','dataDesa','dataDesa','dataKontak'));
    }
    public function strukturPemerintah()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataPemerintah      = $modelData->getStrukturPemerintahDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/strukturPemerintah',compact('dataPemerintah','dataDesa','dataKontak'));
    }
    public function pkk()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataPKK             = $modelData->getStrukturPKK($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/pkk',compact('dataPKK','dataDesa','dataKontak'));
    }
    public function artikel()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataArtikel         = $modelData->getArtikelValidasi($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/artikel',compact('dataArtikel','dataDesa','dataKontak'));
    }
    public function artikelKelurahanDetail($id)
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataDetailArtikel   = $modelData->getArtikelDetail($kodeKecamatanLog,$kodeDesaLog,$id);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/artikelDetail',compact('dataDetailArtikel','dataDesa','dataKontak'));
    }
    public function beritaKelurahan()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataBerita          = $modelData->getBeritaValidasi($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/berita',compact('dataBerita','dataDesa','dataKontak'));
    }
    public function beritaKelurahanDetail($id)
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataDetailBerita    = $modelData->getBeritaDetail($kodeKecamatanLog,$kodeDesaLog,$id);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/beritaDetail',compact('dataDetailBerita','dataDesa','dataKontak'));
    }
    public function galeriKelurahan()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataGaleri          = $modelData->getGaleri($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/galeri',compact('dataGaleri','dataDesa','dataKontak'));
    }
    public function pengumuman()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataPengumuman      = $modelData->getPengumuman($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/pengumuman',compact('dataPengumuman','dataDesa','dataKontak'));
    }
    public function kontak()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/kontak',compact('dataKontak','dataDesa','dataDesa','dataKontak'));
    }
    public function dataPendidikandalamKK()
    {
        $session            = session();
        $modelData          = new Model_data();
        $kodeKecamatan      = $session->get('kodeKecamatan');
        $kodeDesa           = $session->get('kodeDesa');
        $dataKontak          = $modelData->getKontak($kodeKecamatan,$kodeDesa);
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
                        // "jumlah"            => 1894,
                    ],
            "2"     => [
                        "jenisPendidikan"   => "BELUM TAMAT SD/SEDERAJAT",
                        "jumlah"            => $dataPendidikan2,
                        // "jumlah"            => 873,
                    ],
            "3"     => [
                        "jenisPendidikan"   => "TAMAT SD/SEDERAJAT",
                        "jumlah"            => $dataPendidikan3,
                        // "jumlah"            => 1110,
                    ],
            "4"     => [
                        "jenisPendidikan"   => "SLTP/SEDERAJAT",
                        "jumlah"            => $dataPendidikan4,
                        // "jumlah"            => 1296,
                    ],
            "5"     => [
                        "jenisPendidikan"   => "SLTA/ SEDERAJAT",
                        "jumlah"            => $dataPendidikan5,
                        // "jumlah"            => 3372,
                    ],
            "6"     => [
                        "jenisPendidikan"   => "DIPLOMA I / II",
                        "jumlah"            => $dataPendidikan6,
                        // "jumlah"            => 64,
                    ],
            "7"     => [
                        "jenisPendidikan"   => "AKADEMI/ DIPLOMA III/S. MUDA",
                        "jumlah"            => $dataPendidikan7,
                        // "jumlah"            => 172,
                    ],
            "8"     => [
                        "jenisPendidikan"   => "DIPLOMA IV/ STRATA I",
                        "jumlah"            => $dataPendidikan8,
                        // "jumlah"            => 584,
                    ],
            "9"     => [
                        "jenisPendidikan"   => "STRATA II",
                        "jumlah"            => $dataPendidikan9,
                        // "jumlah"            => 20,
                    ],
            "10"     => [
                        "jenisPendidikan"   => "STRATA III",
                        "jumlah"            => $dataPendidikan10,
                        // "jumlah"            => 0,
                    ],
        ];
        $dataDesa            = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        return view('FE/pendidikanDalamKK',compact('rekapitulasiDataPendidikan','dataDesa','dataKontak'));
    }
    public function dataPendidikanSedangDitempuh()
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
        $dataDesa            = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        $dataKontak          = $modelData->getKontak($kodeKecamatan,$kodeDesa);
        return view('FE/pendidikanSedangDitempuh',compact('rekapitulasiDataPendidikan','dataDesa','dataKontak'));
    }
    public function dataPekerjaan()
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
                        // "jumlah"            => 2727,
                    ],
            "2"     => [
                        "jenisPekerjaan"   => "MENGURUS RUMAH TANGGA",
                        "jumlah"            => $dataPekerjaan2,
                        // "jumlah"            => 2023,
                    ],
            "3"     => [
                        "jenisPekerjaan"   => "PELAJAR/MAHASISWA",
                        "jumlah"            => $dataPekerjaan3,
                        // "jumlah"            => 1555,
                    ],
            "4"     => [
                        "jenisPekerjaan"   => "PENSIUNAN",
                        "jumlah"            => $dataPekerjaan4,
                        // "jumlah"            => 146,
                    ],
            "5"     => [
                        "jenisPekerjaan"   => "PEGAWAI NEGERI SIPIL (PNS)",
                        "jumlah"            => $dataPekerjaan5,
                        // "jumlah"            => 270,
                    ],
            "6"     => [
                        "jenisPekerjaan"   => "TENTARA NASIONAL INDONESIA (TNI)",
                        "jumlah"            => $dataPekerjaan6,
                        // "jumlah"            => 33,
                    ],
            "7"     => [
                        "jenisPekerjaan"   => "KEPOLISIAN RI (POLRI)",
                        "jumlah"            => $dataPekerjaan7,
                        // "jumlah"            => 18,
                    ],
            "8"     => [
                        "jenisPekerjaan"   => "PERDAGANGAN",
                        "jumlah"            => $dataPekerjaan8,
                        // "jumlah"            => 29,
                    ],
            "9"     => [
                        "jenisPekerjaan"   => "PETANI/PEKEBUN",
                        "jumlah"            => $dataPekerjaan9,
                        // "jumlah"            => 164
                    ],
            "10"     => [
                        "jenisPekerjaan"   => "PETERNAK",
                        "jumlah"            => $dataPekerjaan10,
                        // "jumlah"            => 1
                    ],
            "11"     => [
                        "jenisPekerjaan"   => "NELAYAN/PERIKANAN",
                        "jumlah"            => $dataPekerjaan11,
                        // "jumlah"            => 3
                    ],
            "12"     => [
                        "jenisPekerjaan"   => "INDUSTRI",
                        "jumlah"            => $dataPekerjaan12,
                        // "jumlah"            => 0
                    ],
            "13"     => [
                        "jenisPekerjaan"   => "KONSTRUKSI",
                        "jumlah"            => $dataPekerjaan13,
                        // "jumlah"            => 0
                    ],
            "14"     => [
                        "jenisPekerjaan"   => "TRANSPORTASI",
                        "jumlah"            => $dataPekerjaan14,
                        // "jumlah"            => 14
                    ],
            "15"     => [
                        "jenisPekerjaan"   => "KARYAWAN SWASTA",
                        "jumlah"            => $dataPekerjaan15,
                        // "jumlah"            => 407
                    ],
            "16"     => [
                        "jenisPekerjaan"   => "KARYAWAN BUMN",
                        "jumlah"            => $dataPekerjaan16,
                        // "jumlah"            => 68
                    ],
            "17"     => [
                        "jenisPekerjaan"   => "KARYAWAN BUMD",
                        "jumlah"            => $dataPekerjaan17,
                        // "jumlah"            => 4
                    ],
            "18"     => [
                        "jenisPekerjaan"   => "KARYAWAN HONORER",
                        "jumlah"            => $dataPekerjaan18,
                        // "jumlah"            => 39
                    ],
            "19"     => [
                        "jenisPekerjaan"   => "BURUH HARIAN LEPAS",
                        "jumlah"            => $dataPekerjaan19,
                        // "jumlah"            => 552
                    ],
            "20"     => [
                        "jenisPekerjaan"   => "BURUH TANI/PERKEBUNAN",
                        "jumlah"            => $dataPekerjaan20,
                        // "jumlah"            => 24
                    ],
            "21"     => [
                        "jenisPekerjaan"   => "BURUH PETERNAKAN",
                        "jumlah"            => $dataPekerjaan21,
                        // "jumlah"            => 1
                    ],
            "22"     => [
                        "jenisPekerjaan"   => "PEMBANTU RUMAH TANGGA",
                        "jumlah"            => $dataPekerjaan22,
                        // "jumlah"            => 4
                    ],
            "23"     => [
                        "jenisPekerjaan"   => "TUKANG LISTRIK",
                        "jumlah"            => $dataPekerjaan23,
                        // "jumlah"            => 1
                    ],
            "24"     => [
                        "jenisPekerjaan"   => "TUKANG BATU",
                        "jumlah"            => $dataPekerjaan24,
                        // "jumlah"            => 21
                    ],
            "25"     => [
                        "jenisPekerjaan"   => "TUKANG KAYU",
                        // "jumlah"            => $dataPekerjaan25,
                        // "jumlah"            => 9
                    ],
        ];
        $dataDesa            = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        $dataKontak          = $modelData->getKontak($kodeKecamatan,$kodeDesa);
        return view('FE/pekerjaan',compact('rekapitulasiDataPekerjaan','dataDesa','dataKontak'));
    }
    public function dataAgama()
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
                        // "jumlah"            => 6238
                    ],
            "2"     => [
                        "jenisAgama"        => "Kristen",
                        "jumlah"            => $dataAgama2,
                        // "jumlah"            => 2205
                    ],
            "3"     => [
                        "jenisAgama"        => "Katolik",
                        "jumlah"            => $dataAgama3,
                        // "jumlah"            => 281
                    ],
            "4"     => [
                        "jenisAgama"        => "Hindu",
                        "jumlah"            => $dataAgama4,
                        // "jumlah"            => 20
                    ],
            "5"     => [
                        "jenisAgama"        => "Budha",
                        "jumlah"            => $dataAgama5,
                        // "jumlah"            => 641
            ],
            "6"     => [
                        "jenisAgama"        => "Konghucu",
                        "jumlah"            => $dataAgama6,
                        // "jumlah"            => 0
                    ]
        ];
        $dataDesa            = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        $dataKontak          = $modelData->getKontak($kodeKecamatan,$kodeDesa);
        return view('FE/agama',compact('rekapitulasidataAgama','dataDesa','dataKontak'));
    }
    public function dataJenisKelamin()
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
                        // "jumlah"            => 4620
                    ],
            "2"     => [
                        "jenisKelamin"      => "Perempuan",
                        "jumlah"            => $dataKelamin2,
                        // "jumlah"            => 4765
                    ]
        ];
        $dataDesa            = $modelData->getDesa($kodeKecamatan,$kodeDesa);
        $dataKontak          = $modelData->getKontak($kodeKecamatan,$kodeDesa);
        return view('FE/jenisKelamin',compact('rekapitulasidataKelamin','dataDesa','dataKontak'));
    }
    public function produkHukum()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/produkHukum',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function regulasi()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/regulasi',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function permohonanInformasiPublik()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/permohonanInformasiPublik',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function informasiPublikSetiapSaat()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiPublikSetiapSaat',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function informasiPublikBerkala()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiPublikBerkala',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function informasiPublikSertaMerta()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiPublikSertaMerta',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function informasiPublikDikecualikan()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataProdukHukum     = $modelData->getProdukHukum($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiPublikDikecualikan',compact('dataProdukHukum','dataDesa','dataKontak'));
    }
    public function informasiPublik()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataInformasiPublik = $modelData->getInformasiPublik($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiPublik',compact('dataInformasiPublik','dataDesa','dataKontak'));
    } 
    
    public function potensiUnggulan()
    {
        $modelData           = new Model_data();
        $session             = session();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $dataPotensiUnggulan = $modelData->getPotensi($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa            = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/potensiUnggulan',compact('dataPotensiUnggulan','dataDesa','dataKontak'));
    }   

    public function informasiKepemilikanTanah()
    {
        $modelData            = new Model_data();
        $session              = session();
        $kodeKecamatanLog     = $session->get('kodeKecamatan');
        $kodeDesaLog          = $session->get('kodeDesa');
        $dataKepemilikanTanah = $modelData->getPemilikTanah($kodeKecamatanLog,$kodeDesaLog);
        $dataDesa             = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $dataKontak          = $modelData->getKontak($kodeKecamatanLog,$kodeDesaLog);
        return view('FE/informasiKepemilikanTanah',compact('dataKepemilikanTanah','dataDesa','dataKontak'));
    }   
}
