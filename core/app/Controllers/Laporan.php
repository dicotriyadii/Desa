<?php

namespace App\Controllers;

use App\Models\CatatanKelahiran_Model;
use App\Models\CatatanKeluarga_Model;
use App\Models\CatatanKematian_Model;
use App\Models\CatatanStatusIbu_Model;
use App\Models\DasaWisma_Model;
use App\Models\Desa_Model;
use App\Models\Inventaris_Model;
use App\Models\JenisKegiatan_Model;
use App\Models\Kecamatan_Model;
use App\Models\KriteriaRumah_Model;
use App\Models\Laporan_Model;
use App\Models\MakananPokok_Model;
use App\Models\SumberAirKeluarga_Model;
use App\Models\TempatSampah_Model;
use App\Models\User_Model;
use App\Models\userModel;
use App\Models\Warga_Model;
use Dompdf\Dompdf;

class Laporan extends BaseController
{

    protected $catatan_keluarga;
    protected $warga;
    protected $data_kecamatan;
    protected $data_desa;
    protected $kriteria_rumah;
    protected $sumber_air;
    protected $tempat_sampah;
    protected $jenis_kegiatan;
    protected $makanan_pokok;
    protected $user;
    protected $inventaris;
    protected $laporan;
    protected $dasa_wisma;
    protected $catatan_status_ibu;
    protected $catatan_melahirkan;
    protected $catatan_meninggal;

    public function __construct()
    {
        $this->catatan_keluarga = new CatatanKeluarga_Model();
        $this->warga = new Warga_Model();
        $this->data_kecamatan = new Kecamatan_Model();
        $this->data_desa = new Desa_Model();
        $this->kriteria_rumah = new KriteriaRumah_Model();
        $this->sumber_air = new SumberAirKeluarga_Model();
        $this->tempat_sampah = new TempatSampah_Model();
        $this->jenis_kegiatan = new JenisKegiatan_Model();
        $this->makanan_pokok = new MakananPokok_Model();
        $this->user = new User_Model();
        $this->inventaris = new Inventaris_Model();
        $this->laporan = new Laporan_Model();
        $this->dasa_wisma = new DasaWisma_Model();
        $this->catatan_status_ibu = new CatatanStatusIbu_Model();
        $this->catatan_melahirkan = new CatatanKelahiran_Model();
        $this->catatan_meninggal = new CatatanKematian_Model();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $kode_nik = session()->get('nik');
        $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
        $dasa_wisma = $kode_dasa_wisma['dasa_wisma_id'];

        $nama_jabatan = $kode_dasa_wisma['jabatan'];

        $data = [
            'jabatan' => $nama_jabatan,
            'title' => 'Laporan - Dashboard Dasa Wisma',
            'nama_kk' => $this->catatan_keluarga->list(),
            'dasa_wisma' => $dasa_wisma,
        ];


        return view('auth/laporan/index', $data);
    }

    public function daftar_anggota_pkk()
    {
        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();


        $data = [
            'title' => 'Daftar Anggota Dasa Wisma',
            'list' => $this->user->list(),
            'kabupaten' => 'Deli Serdang',
            'provinsi' => 'Sumatera Utara',
            'kecamatan' => $data_user['kecamatan'],
            'desa' => $data_user['desa']

        ];

        $filename = date('y-m-d-H-i-s') . '' . 'Daftar Anggota Dasa Wisma';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/Buku_daftar_anggota_pkk', $data));
        $dompdf->setPaper('legal', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));

        //    return view('auth/laporan/Buku_daftar_anggota_pkk', $data);
    }

    public function catatan_keluarga()
    {

        $nama_kepala_keluarga = $this->request->getVar('nama_kepala_keluarga');
        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_keluarga');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_keluarga');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

        $data_warga = $this->warga->where('nomorIndukKependudukan', $nama_kepala_keluarga)->first();

        $data = [
            'title' => 'Laporan Catatan Keluarga',
            'nama_user' => $data_user['namaWarga'],
            'nama_warga' => $data_warga['namaWarga'],
            'data_warga' => $this->catatan_keluarga->list_per_warga($nama_kepala_keluarga),
            'list' => $this->catatan_keluarga->list_catatan_keluarga($tgl_mulai, $tgl_akhir),
            'nomor_kk' =>  $data_warga['nomorKartuKeluarga']

        ];

        $filename = date('y-m-d-H-i-s') . '' . $data_warga['namaWarga'];
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/catatan_keluarga', $data));
        $dompdf->setPaper('sra2', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));

        // return view('auth/laporan/catatan_keluarga', $data);
    }


    // public function catatan_keluarga()
    // {

    //     $nama_kepala_keluarga = $this->request->getVar('nama_kepala_keluarga');
    //     $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_keluarga');
    //     $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_keluarga');

    //     $nik = session()->get('nik');
    //     $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

    //     $data_warga = $this->warga->where('nomorIndukKependudukan', $nama_kepala_keluarga)->first();

    //     $data = [
    //         'title' => 'Laporan Catatan Keluarga',
    //         'nama_user' => $data_user['namaWarga'],
    //         'nama_warga' => $data_warga['namaWarga'],
    //         'data_warga' => $this->catatan_keluarga->list_per_warga($nama_kepala_keluarga),
    //         'list' => $this->catatan_keluarga->list_catatan_keluarga($tgl_mulai, $tgl_akhir),
    //         'nomor_kk' =>  $data_warga['nomorKartuKeluarga']

    //     ];

    //     $filename = date('y-m-d-H-i-s') . '' . $data_warga['namaWarga'];
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml(view('auth/laporan/catatan_keluarga', $data));
    //     $dompdf->setPaper('sra2', 'landscape');

    //     // render html as PDF
    //     $dompdf->render();

    //     // output the generated pdf
    //     $dompdf->stream($filename, array("Attachment" => false));

    //     // return view('auth/laporan/catatan_keluarga', $data);
    // }

    public function catatan_keluarga_kelompok_dasa_wisma()
    {
        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_data_kelompok_dasa_wisma');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_data_kelompok_dasa_wisma');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

        $data_dasa_wisma = $this->user->where('nik', $nik)->get()->getRowArray();
        $data_anggota = $data_dasa_wisma['dasa_wisma_id'];

        $dasa_wisma = $this->dasa_wisma->where('id', $data_anggota)->get()->getRowArray();


        $data = [
            'title' => 'REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA KELOMPOK DASA WISMA',
            'list' => $this->catatan_keluarga->list_catatan_keluarga_kelompok_dasa_wisma($tgl_mulai, $tgl_akhir),
            'desa' => $data_user['desa'],
            'rt' => $data_user['RT'],
            'rw' => $data_user['RW'],
            'dasa_wisma' => $dasa_wisma['nama_dasa_wisma']
        ];

        $filename = date('y-m-d-H-i-s') . '' . 'REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA KELOMPOK DASA WISMA';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/Catatan_data_keluarga_kelompok_dasa_wisma', $data));
        $dompdf->setPaper('sra2', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));


        // return view('auth/laporan/Catatan_data_keluarga_kelompok_dasa_wisma', $data);
    }

    public function catatan_keluarga_tp_pkk_desa()
    {

        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_data_tp_pkk_desa');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_data_tp_pkk_desa');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

        $data = [
            'title' => 'REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA TP PKK DESA',
            'list' => $this->catatan_keluarga->list_catatan_keluarga_tp_pkk_desa($tgl_mulai, $tgl_akhir),
            'desa' => $data_user['desa'],
            'kecamatan' => $data_user['kecamatan'],
            'kabupaten' => 'Deli Serdang',
            'provinsi' => 'Sumatera&nbsp;Utara'
        ];

        $filename = date('y-m-d-H-i-s') . '' . 'REKAPITULASI CATATAN DATA DAN KEGIATAN WARGA TP PKK DESA';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/Catatan_data_keluarga_tp_pkk_desa', $data));
        $dompdf->setPaper('sra2', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));


        // return view('auth/laporan/Catatan_data_keluarga_tp_pkk_desa', $data);
    }





    public function catatan_status_ibu_kelompok_dasa_wisma()
    {

        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_status_ibu_kelompok_dasa_wisma');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_status_ibu_kelompok_dasa_wisma');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

        $data_dasa_wisma = $this->user->where('nik', $nik)->get()->getRowArray();
        $data_anggota = $data_dasa_wisma['dasa_wisma_id'];

        $dasa_wisma = $this->dasa_wisma->where('id', $data_anggota)->get()->getRowArray();

        $cari_jumlah_ibu_hamil = $this->catatan_melahirkan->where('catatan_status_ibu', 'HAMIL')->get()->getResultArray();
        $jumlah_ibu_hamil = count(array($cari_jumlah_ibu_hamil['catatan_status_ibu']));

        $cari_jumlah_ibu_melahirkan = $this->catatan_melahirkan->where('catatan_status_ibu', 'MELAHIRKAN')->get()->getResultArray();
        $jumlah_ibu_melahirkan = count(array($cari_jumlah_ibu_melahirkan['catatan_status_ibu']));

        $cari_jumlah_ibu_nifas = $this->catatan_melahirkan->where('catatan_status_ibu', 'NIFAS')->get()->getResultArray();
        $jumlah_ibu_nifas = count(array($cari_jumlah_ibu_nifas['catatan_status_ibu']));

        $cari_jumlah_ibu_meninggal = $this->catatan_meninggal->where('catatan_status_ibu_meninggal', 'MENINGGAL')->get()->getResultArray();
        $jumlah_ibu_meninggal = count(array($cari_jumlah_ibu_meninggal['catatan_status_ibu_meninggal']));

        $data = [
            'title' => 'Laporan Catatan Status Ibu Kelompok Dasa Wisma',
            'list' => $this->catatan_status_ibu->list_catatan_status_ibu_kelompok_dasa_wisma($tgl_mulai, $tgl_akhir),
            'dusun' => $data_user['dusun'],
            'desa' => $data_user['desa'],
            'kecamatan' => $data_user['kecamatan'],
            'kabupaten' => 'Deli Serdang',
            'provinsi' => 'Sumatera&nbsp;Utara',
            'dasa_wisma' => $dasa_wisma['nama_dasa_wisma'],
            'ibu_hamil' => $jumlah_ibu_hamil,
            'ibu_melahirkan' => $jumlah_ibu_melahirkan,
            'ibu_nifas' => $jumlah_ibu_nifas,
            'ibu_meninggal' => $jumlah_ibu_meninggal
        ];

        $filename = date('y-m-d-H-i-s') . '' . 'Laporan Catatan Status Ibu Kelompok Dasa Wisma';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/catatan_status_ibu_kelompok_dasa_wisma', $data));
        $dompdf->setPaper('legal', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));


        // return view('auth/laporan/catatan_status_ibu_kelompok_dasa_wisma', $data);
    }

    public function catatan_status_ibu_tingkat_dusun()
    {

        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_status_ibu_tingkat_dusun');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_status_ibu_tingkat_dusun');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();
        $dusun = $data_user['dusun'];

        $data_dasa_wisma = $this->user->where('nik', $nik)->get()->getRowArray();
        $data_anggota = $data_dasa_wisma['dasa_wisma_id'];

        $dasa_wisma = $this->dasa_wisma->where('id', $data_anggota)->get()->getRowArray();

        $data = [
            'title' => 'Laporan Catatan Status Ibu Tingkat Dusun',
            'list' => $this->catatan_status_ibu->list_catatan_status_ibu_tingkat_dusun($dusun, $tgl_mulai, $tgl_akhir),
            'dusun' => $data_user['dusun'],
            'desa' => $data_user['desa'],
            'kecamatan' => $data_user['kecamatan'],
            'kabupaten' => 'Deli Serdang',
            'provinsi' => 'Sumatera&nbsp;Utara',
            'dasa_wisma' => $dasa_wisma['nama_dasa_wisma']
        ];

        $filename = date('y-m-d-H-i-s') . '' . 'Laporan Catatan Status Ibu Tingkat Dusun';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/catatan_status_ibu_tingkat_dusun', $data));
        $dompdf->setPaper('legal', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));

        // return view('auth/laporan/catatan_status_ibu_tingkat_dusun', $data);
    }

    public function catatan_status_ibu_tingkat_desa()
    {
        $tgl_mulai = $this->request->getVar('tgl_mulai_catatan_status_ibu_tingkat_desa');
        $tgl_akhir = $this->request->getVar('tgl_akhir_catatan_status_ibu_tingkat_desa');

        $nik = session()->get('nik');
        $data_user = $this->warga->where('nomorIndukKependudukan', $nik)->first();

        $data_dasa_wisma = $this->user->where('nik', $nik)->get()->getRowArray();
        $data_anggota = $data_dasa_wisma['dasa_wisma_id'];

        $dasa_wisma = $this->dasa_wisma->where('id', $data_anggota)->get()->getRowArray();

        $data = [
            'title' => 'Laporan Catatan Status Ibu Tingkat Desa',
            'list' => $this->user->list(),
            'list' => $this->catatan_status_ibu->list_catatan_status_ibu_tingkat_desa($tgl_mulai, $tgl_akhir),
            'dusun' => $data_user['dusun'],
            'desa' => $data_user['desa'],
            'kecamatan' => $data_user['kecamatan'],
            'kabupaten' => 'Deli Serdang',
            'provinsi' => 'Sumatera&nbsp;Utara',
            'dasa_wisma' => $dasa_wisma['nama_dasa_wisma']
        ];

        $filename = date('y-m-d-H-i-s') . '' . 'Laporan Catatan Status Ibu Tingkat Desa';
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('auth/laporan/catatan_status_ibu_tingkat_desa', $data));
        $dompdf->setPaper('legal', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => false));

        // return view('auth/laporan/catatan_status_ibu_tingkat_desa', $data);
    }


    // public function laporan_inventaris()
    // {
    //     $data = [
    //         'title' => 'Buku Inventaris PKK',
    //         'list' => $this->inventaris->list()
    //     ];

    //     return view('auth/laporan/buku_inventaris', $data);
    // }
    // public function pemasukan_keuangan()
    // {
    //     $data = [
    //         'title' => 'Laporan Pemasukan Keuangan ',
    //         'list' => $this->user->list()
    //     ];

    //     return view('auth/laporan/Buku_keuangan', $data);
    // }
    // public function pengeluaran_keuangan()
    // {
    //     $data = [
    //         'title' => 'Laporan Pengeluaran Keuangan',
    //         'list' => $this->user->list()
    //     ];

    //     return view('auth/laporan/Buku_keuangan', $data);
    // }




}
