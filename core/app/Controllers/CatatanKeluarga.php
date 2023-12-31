<?php

namespace App\Controllers;

use App\Models\CatatanKeluarga_Model;
use App\Models\Desa_Model;
use App\Models\Dusun_Model;
use App\Models\JenisKegiatan_Model;
use App\Models\Kecamatan_Model;
use App\Models\KriteriaRumah_Model;
use App\Models\MakananPokok_Model;
use App\Models\SumberAirKeluarga_Model;
use App\Models\TempatSampah_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class CatatanKeluarga extends BaseController
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
    protected $data_dusun;

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
        $this->data_dusun = new Dusun_Model();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $kode_nik = session()->get('nik');
        $jabatan = $this->user->where('nik', $kode_nik)->get()->getRowArray();
        $nama_jabatan = $jabatan['jabatan'];

        $data = [
            'jabatan' => $nama_jabatan,
            'title' => 'Catatan Keluarga - Dashboard Dasa Wisma',
        ];
        return view('auth/catatan-keluarga/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
            $dasa_wisma = $kode_dasa_wisma['idDasawisma'];
            $nama_jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $nama_jabatan,
                'dasa_wisma' => $dasa_wisma,
                'list' => $this->catatan_keluarga->list()
            ];

            $msg = [
                'data' => view('auth/catatan-keluarga/list', $data)
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $dusun = $nama_dusun['kodeDusun'];

            // $get_kd_dusun = $this->data_dusun->where('namaDusun', $dusun)->first();
            // $kd_dusun = $get_kd_dusun['idDusun'];

            $data = [
                'title' => 'Form Tambah Catatan Keluarga',
                'nik' => $this->warga->get()->getResultArray(),
                'kriteria_rumah' => $this->kriteria_rumah->get()->getResultArray(),
                'sumber_air' => $this->sumber_air->get()->getResultArray(),
                'tempat_sampah' => $this->tempat_sampah->get()->getResultArray(),
                'jenis_kegiatan' => $this->jenis_kegiatan->get()->getResultArray(),
                'makanan_pokok' => $this->makanan_pokok->get()->getResultArray(),
                'dusun' => $dusun,
            ];

            $msg = [
                'data' => view('auth/catatan-keluarga/tambah', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function simpan()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tgl' => [
                    'label' => 'Tanggal Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nik' => [
                    'label' => 'Nomor Induk Kependudukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'berkebutuhan_khusus' => [
                    'label' => 'Berkebutuhan Khusus',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'kriteria_rumah' => [
                    'label' => 'Kriteria Rumah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'sumber_air' => [
                    'label' => 'Sumber Air Keluarga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tempat_sampah' => [
                    'label' => 'Tempat Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenis_kegiatan_id' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_kegiatan' => [
                    'label' => 'Nama Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'makanan_pokok' => [
                    'label' => 'Makanan Pokok',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'keterangan' => [
                    'label' => 'Keterangan Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_kk' => [
                    'label' => 'Jumlah KK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_total_laki_laki' => [
                    'label' => 'Jumlah Total Laki-Laki',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_total_perempuan' => [
                    'label' => 'Jumlah Total Perempuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_balita_laki_laki' => [
                    'label' => 'Jumlah Balita Laki-Laki',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_balita_perempuan' => [
                    'label' => 'Jumlah Balita Perempuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pus' => [
                    'label' => 'PUS',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'wus' => [
                    'label' => 'WUS',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_ibu_hamil' => [
                    'label' => 'Jumlah Ibu Hamil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jlmh_ibu_menyusui' => [
                    'label' => 'Jumlah Ibu Menyusui',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_lansia' => [
                    'label' => 'Jumlah Lansia',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_3_buta' => [
                    'label' => 'Jumlah 3 Buta',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_jamban_keluarga' => [
                    'label' => 'Jumlah Jamban Keluarga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tgl'  => $validation->getError('tgl'),
                        'nik'    => $validation->getError('nik'),
                        'berkebutuhan_khusus'    => $validation->getError('berkebutuhan_khusus'),
                        'kriteria_rumah' => $validation->getError('kriteria_rumah'),
                        'sumber_air' => $validation->getError('sumber_air'),
                        'tempat_sampah' => $validation->getError('tempat_sampah'),
                        'jenis_kegiatan_id' => $validation->getError('jenis_kegiatan_id'),
                        'nama_kegiatan' => $validation->getError('nama_kegiatan'),
                        'makanan_pokok' => $validation->getError('makanan_pokok'),
                        'keterangan' => $validation->getError('keterangan'),
                        'jmlh_kk' => $validation->getError('jmlh_kk'),
                        'jmlh_total_laki_laki' => $validation->getError('jmlh_total_laki_laki'),
                        'jmlh_total_perempuan' => $validation->getError('jmlh_total_perempuan'),
                        'jmlh_balita_laki_laki' => $validation->getError('jmlh_balita_laki_laki'),
                        'jmlh_balita_perempuan' => $validation->getError('jmlh_balita_perempuan'),
                        'pus' => $validation->getError('pus'),
                        'wus' => $validation->getError('wus'),
                        'jmlh_ibu_hamil' => $validation->getError('jmlh_ibu_hamil'),
                        'jlmh_ibu_menyusui' => $validation->getError('jlmh_ibu_menyusui'),
                        'jmlh_lansia' => $validation->getError('jmlh_lansia'),
                        'jmlh_3_buta' => $validation->getError('jmlh_3_buta'),
                        'jmlh_jamban_keluarga' => $validation->getError('jmlh_jamban_keluarga'),
                    ]
                ];
            } else {

                $kode_nik = session()->get('nik');

                // $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';
                $kecamatan = $get_token['kodeKecamatan'];
                $desa = $get_token['kodeDesa'];

                $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
                $dasa_wisma = $kode_dasa_wisma['idDasawisma'];

                $tgl = $this->request->getVar('tgl');
                $nik = $this->request->getVar('nik');
                $jmlh_kk = $this->request->getVar('jmlh_kk');
                $jmlh_total_laki_laki = $this->request->getVar('jmlh_total_laki_laki');
                $jmlh_total_perempuan = $this->request->getVar('jmlh_total_perempuan');
                $jmlh_balita_laki_laki = $this->request->getVar('jmlh_balita_laki_laki');
                $jmlh_balita_perempuan = $this->request->getVar('jmlh_balita_perempuan');
                $pus = $this->request->getVar('pus');
                $wus = $this->request->getVar('wus');
                $jmlh_ibu_hamil = $this->request->getVar('jmlh_ibu_hamil');
                $jlmh_ibu_menyusui = $this->request->getVar('jlmh_ibu_menyusui');
                $jmlh_lansia = $this->request->getVar('jmlh_lansia');
                $jmlh_3_buta = $this->request->getVar('jmlh_3_buta');
                $jmlh_jamban_keluarga = $this->request->getVar('jmlh_jamban_keluarga');
                $berkebutuhan_khusus = $this->request->getVar('berkebutuhan_khusus');
                $kriteria_rumah = $this->request->getVar('kriteria_rumah');
                $sumber_air = $this->request->getVar('sumber_air');
                $tempat_sampah = $this->request->getVar('tempat_sampah');
                $jenis_kegiatan_id = $this->request->getVar('jenis_kegiatan_id');
                $nama_kegiatan = $this->request->getVar('nama_kegiatan');
                $makanan_pokok = $this->request->getVar('makanan_pokok');
                $keterangan = $this->request->getVar('keterangan');


                $data_catatan_keluarga = [
                    'kode_kecamatan' => $kecamatan,
                    'kode_desa' => $desa,
                    'kode_dasa_wisma' => $dasa_wisma,
                    'nik' => $nik,
                    'jumlah_kk' => $jmlh_kk,
                    'jml_laki_laki' => $jmlh_total_laki_laki,
                    'jml_perempuan' => $jmlh_total_perempuan,
                    'balita_laki_laki' => $jmlh_balita_laki_laki,
                    'balita_perempuan' => $jmlh_balita_perempuan,
                    'pus' => $pus,
                    'wus' =>  $wus,
                    'ibu_hamil' => $jmlh_ibu_hamil,
                    'ibu_menyusui' => $jlmh_ibu_menyusui,
                    'lansia' =>  $jmlh_lansia,
                    '3_buta' =>  $jmlh_3_buta,
                    'jml_jamban_keluarga' => $jmlh_jamban_keluarga,
                    'berkebutuhan_khusus' => $berkebutuhan_khusus,
                    'kriteria_rumah' => $kriteria_rumah,
                    'sumber_air' => $sumber_air,
                    'tempat_sampah' => $tempat_sampah,
                    'jenis_kegiatan_id' => $jenis_kegiatan_id,
                    'nama_kegiatan' => $nama_kegiatan,
                    'makanan_pokok' => $makanan_pokok,
                    'keterangan' => $keterangan,
                    'tgl' => $tgl,
                ];

                // $data = $this->catatan_keluarga->post_catatan_keluarga($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik, $berkebutuhan_khusus, $kriteria_rumah, $sumber_air, $tempat_sampah, $jenis_kegiatan_id, $nama_kegiatan, $makanan_pokok, $keterangan);
                // print_r($data_catatan_keluarga);
                $this->catatan_keluarga->insert($data_catatan_keluarga);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapusall()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('idCatatanKeluarga');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->catatan_keluarga->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data Catatan Keluarga Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('idCatatanKeluarga');

            $this->catatan_keluarga->delete($id);

            $msg = [
                'sukses' => 'Data Catatan Keluarga Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function formupload()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Upload Data Keluarga',
            ];

            $msg = [
                'data' => view('auth/catatan-keluarga/upload', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function upload()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'file' => [
                    'label' => 'File',
                    'rules' => [
                        // 'required',
                        // 'mime_in[file,application/xlsx,text/csv]',
                        'max_size[file,5000]',
                    ], 'errors' => [
                        // 'required' => '{field} Tidak Boleh Kosong',
                        // 'mime_in' => '{field} harus berjenis excel Atau CSV',
                        'max_size' => '{field} Melebihi Batas Ukuran 5 MB'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'file'  => $validation->getError('file'),
                    ]
                ];
            } else {
                $kode_nik = session()->get('nik');

                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];

                $nama_kecamatan = $get_token['kecamatan'];
                $nama_desa = $get_token['desa'];

                $get_kd_kecamatan = $this->data_kecamatan->where('namaKecamatan', $nama_kecamatan)->first();
                $kecamatan = $get_kd_kecamatan['kodeKecamatan'];

                $get_kd_desa = $this->data_desa->where('namaDesa', $nama_desa)->first();
                $desa = $get_kd_desa['kodeDesa'];

                $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
                $dasa_wisma = $kode_dasa_wisma['idDasawisma'];

                // if ($ext) {
                //     $msg = [
                //         'sukses' => "Data Berhasil Disimpan $ext"
                //     ];
                // } else {
                //     $msg = [
                //         'sukses' => 'Gagal'
                //     ];
                // }
                $file_excel     = $this->request->getFile('file');
                $ext            = $file_excel->getClientExtension();
                if ($ext == 'xls') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                    $spreadsheet = $render->load($file_excel);
                    $data = $spreadsheet->getActiveSheet()->toArray();
                    $jumlahData = count($data);
                    die(print_r($jumlahData));
                    if ($jumlahData > 0) {
                        foreach ($data as $d) {
                            $result[] = array(
                                "kode_kecamatan" => $kecamatan,
                                "kode_desa" => $desa,
                                "kode_dasa_wisma" => $dasa_wisma,
                                "nik" => $d[0],
                                "jumlah_kk" => $d[1],
                                "jml_laki_laki" => $d[2],
                                "jml_perempuan" => $d[3],
                                "balita_laki_laki" => $d[4],
                                "balita_perempuan" => $d[5],
                                "pus" => $d[6],
                                "wus" => $d[7],
                                "ibu_hamil" => $d[8],
                                "ibu_menyusui" => $d[9],
                                "lansia" => $d[10],
                                "3_buta" => $d[11],
                                "jml_jamban_keluarga" => $d[12],
                                "berkebutuhan_khusus" => $d[13],
                                "kriteria_rumah" => $d[14],
                                "sumber_air" => $d[15],
                                "tempat_sampah" => $d[16],
                                "jenis_kegiatan_id" => $d[17],
                                "nama_kegiatan" => $d[18],
                                "makanan_pokok" => $d[19],
                                "keterangan" => $d[20],
                                "tgl" => $d[21],
                            );
                        }
                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_keluarga->insert($result[$i]);
                        }
                        $msg = [
                            'sukses' => 'Data Berhasil Disimpan'
                        ];
                    }
                } else if ($ext == 'xlsx') {
                    $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    $spreadsheet = $render->load($file_excel);
                    $data = $spreadsheet->getActiveSheet()->toArray();
                    $jumlahData = count($data);
                    if ($jumlahData > 0) {
                        foreach ($data as $d) {
                            $result[] = array(
                                "kode_kecamatan" => $kecamatan,
                                "kode_desa" => $desa,
                                "kode_dasa_wisma" => $dasa_wisma,
                                "nik" => $d[0],
                                "jumlah_kk" => $d[1],
                                "jml_laki_laki" => $d[2],
                                "jml_perempuan" => $d[3],
                                "balita_laki_laki" => $d[4],
                                "balita_perempuan" => $d[5],
                                "pus" => $d[6],
                                "wus" => $d[7],
                                "ibu_hamil" => $d[8],
                                "ibu_menyusui" => $d[9],
                                "lansia" => $d[10],
                                "3_buta" => $d[11],
                                "jml_jamban_keluarga" => $d[12],
                                "berkebutuhan_khusus" => $d[13],
                                "kriteria_rumah" => $d[14],
                                "sumber_air" => $d[15],
                                "tempat_sampah" => $d[16],
                                "jenis_kegiatan_id" => $d[17],
                                "nama_kegiatan" => $d[18],
                                "makanan_pokok" => $d[19],
                                "keterangan" => $d[20],
                                "tgl" => $d[21],
                            );
                        }
                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_keluarga->insert($result[$i]);
                        }
                        $msg = [
                            'sukses' => "Data Berhasil Disimpan"
                        ];
                    }
                } else {
                    $file = $this->request->getFile("file");
                    $file_name = $file->getTempName();
                    $result = array();
                    $csv_data = array_map('str_getcsv', file($file_name));
                    $jumlah = count($csv_data);
                    if (count($csv_data) > 0) {
                        $jumlah = 0;
                        foreach ($csv_data as $d) {
                            $result[] = array(
                                "kode_kecamatan" => $kecamatan,
                                "kode_desa" => $desa,
                                "kode_dasa_wisma" => $dasa_wisma,
                                "nik" => $d[0],
                                "jumlah_kk" => $d[1],
                                "jml_laki_laki" => $d[2],
                                "jml_perempuan" => $d[3],
                                "balita_laki_laki" => $d[4],
                                "balita_perempuan" => $d[5],
                                "pus" => $d[6],
                                "wus" => $d[7],
                                "ibu_hamil" => $d[8],
                                "ibu_menyusui" => $d[9],
                                "lansia" => $d[10],
                                "3_buta" => $d[11],
                                "jml_jamban_keluarga" => $d[12],
                                "berkebutuhan_khusus" => $d[13],
                                "kriteria_rumah" => $d[14],
                                "sumber_air" => $d[15],
                                "tempat_sampah" => $d[16],
                                "jenis_kegiatan_id" => $d[17],
                                "nama_kegiatan" => $d[18],
                                "makanan_pokok" => $d[19],
                                "keterangan" => $d[20],
                                "tgl" => $d[21],
                            );
                            $jumlah++;
                        }
                        for ($i = 0; $i < $jumlah; $i++) {
                            $this->catatan_keluarga->insert($result[$i]);
                        }
                        $msg = [
                            'sukses' => 'Data Berhasil Disimpan'
                        ];
                    }
                }
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('idCatatanKeluarga');

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $dusun = $nama_dusun['dusun'];

            $data = [
                'title' => 'Form Edit Catatan Keluarga',
                'nik' => $this->warga->get()->getResultArray(),
                'kriteria_rumah' => $this->kriteria_rumah->get()->getResultArray(),
                'sumber_air' => $this->sumber_air->get()->getResultArray(),
                'tempat_sampah' => $this->tempat_sampah->get()->getResultArray(),
                'jenis_kegiatan' => $this->jenis_kegiatan->get()->getResultArray(),
                'makanan_pokok' => $this->makanan_pokok->get()->getResultArray(),
                'list' => $this->catatan_keluarga->where('idCatatanKeluarga', $id)->get()->getRowArray(),
                'dusun' => $dusun
            ];

            $msg = [
                'sukses' => view('auth/catatan-keluarga/edit', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function proses_edit()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tgl' => [
                    'label' => 'Tanggal Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nik' => [
                    'label' => 'Nomor Induk Kependudukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'berkebutuhan_khusus' => [
                    'label' => 'Berkebutuhan Khusus',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'kriteria_rumah' => [
                    'label' => 'Kriteria Rumah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'sumber_air' => [
                    'label' => 'Sumber Air Keluarga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tempat_sampah' => [
                    'label' => 'Tempat Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenis_kegiatan_id' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_kegiatan' => [
                    'label' => 'Nama Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'makanan_pokok' => [
                    'label' => 'Makanan Pokok',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'keterangan' => [
                    'label' => 'Keterangan Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_kk' => [
                    'label' => 'Jumlah KK',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_total_laki_laki' => [
                    'label' => 'Jumlah Total Laki-Laki',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_total_perempuan' => [
                    'label' => 'Jumlah Total Perempuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_balita_laki_laki' => [
                    'label' => 'Jumlah Balita Laki-Laki',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_balita_perempuan' => [
                    'label' => 'Jumlah Balita Perempuan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pus' => [
                    'label' => 'PUS',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'wus' => [
                    'label' => 'WUS',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_ibu_hamil' => [
                    'label' => 'Jumlah Ibu Hamil',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jlmh_ibu_menyusui' => [
                    'label' => 'Jumlah Ibu Menyusui',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_lansia' => [
                    'label' => 'Jumlah Lansia',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_3_buta' => [
                    'label' => 'Jumlah 3 Buta',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jmlh_jamban_keluarga' => [
                    'label' => 'Jumlah Jamban Keluarga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tgl'  => $validation->getError('tgl'),
                        'nik'    => $validation->getError('nik'),
                        'berkebutuhan_khusus'    => $validation->getError('berkebutuhan_khusus'),
                        'kriteria_rumah' => $validation->getError('kriteria_rumah'),
                        'sumber_air' => $validation->getError('sumber_air'),
                        'tempat_sampah' => $validation->getError('tempat_sampah'),
                        'jenis_kegiatan_id' => $validation->getError('jenis_kegiatan_id'),
                        'nama_kegiatan' => $validation->getError('nama_kegiatan'),
                        'makanan_pokok' => $validation->getError('makanan_pokok'),
                        'keterangan' => $validation->getError('keterangan'),
                        'jmlh_kk' => $validation->getError('jmlh_kk'),
                        'jmlh_total_laki_laki' => $validation->getError('jmlh_total_laki_laki'),
                        'jmlh_total_perempuan' => $validation->getError('jmlh_total_perempuan'),
                        'jmlh_balita_laki_laki' => $validation->getError('jmlh_balita_laki_laki'),
                        'jmlh_balita_perempuan' => $validation->getError('jmlh_balita_perempuan'),
                        'pus' => $validation->getError('pus'),
                        'wus' => $validation->getError('wus'),
                        'jmlh_ibu_hamil' => $validation->getError('jmlh_ibu_hamil'),
                        'jlmh_ibu_menyusui' => $validation->getError('jlmh_ibu_menyusui'),
                        'jmlh_lansia' => $validation->getError('jmlh_lansia'),
                        'jmlh_3_buta' => $validation->getError('jmlh_3_buta'),
                        'jmlh_jamban_keluarga' => $validation->getError('jmlh_jamban_keluarga'),
                    ]
                ];
            } else {

                $kode_nik = session()->get('nik');

                // $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';
                $nama_kecamatan = $get_token['kecamatan'];
                $nama_desa = $get_token['desa'];

                $get_kd_kecamatan = $this->data_kecamatan->where('namaKecamatan', $nama_kecamatan)->first();
                $kecamatan = $get_kd_kecamatan['kodeKecamatan'];

                $get_kd_desa = $this->data_desa->where('namaDesa', $nama_desa)->first();
                $desa = $get_kd_desa['kodeDesa'];

                $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
                $dasa_wisma = $kode_dasa_wisma['idDasawisma'];

                $id = $this->request->getVar('idCatatanKeluarga');
                $tgl = $this->request->getVar('tgl');
                $nik = $this->request->getVar('nik');
                $jmlh_kk = $this->request->getVar('jmlh_kk');
                $jmlh_total_laki_laki = $this->request->getVar('jmlh_total_laki_laki');
                $jmlh_total_perempuan = $this->request->getVar('jmlh_total_perempuan');
                $jmlh_balita_laki_laki = $this->request->getVar('jmlh_balita_laki_laki');
                $jmlh_balita_perempuan = $this->request->getVar('jmlh_balita_perempuan');
                $pus = $this->request->getVar('pus');
                $wus = $this->request->getVar('wus');
                $jmlh_ibu_hamil = $this->request->getVar('jmlh_ibu_hamil');
                $jlmh_ibu_menyusui = $this->request->getVar('jlmh_ibu_menyusui');
                $jmlh_lansia = $this->request->getVar('jmlh_lansia');
                $jmlh_3_buta = $this->request->getVar('jmlh_3_buta');
                $jmlh_jamban_keluarga = $this->request->getVar('jmlh_jamban_keluarga');
                $berkebutuhan_khusus = $this->request->getVar('berkebutuhan_khusus');
                $kriteria_rumah = $this->request->getVar('kriteria_rumah');
                $sumber_air = $this->request->getVar('sumber_air');
                $tempat_sampah = $this->request->getVar('tempat_sampah');
                $jenis_kegiatan_id = $this->request->getVar('jenis_kegiatan_id');
                $nama_kegiatan = $this->request->getVar('nama_kegiatan');
                $makanan_pokok = $this->request->getVar('makanan_pokok');
                $keterangan = $this->request->getVar('keterangan');


                $data_catatan_keluarga = [
                    'kode_kecamatan' => $kecamatan,
                    'kode_desa' => $desa,
                    'kode_dasa_wisma' => $dasa_wisma,
                    'nik' => $nik,
                    'jumlah_kk' => $jmlh_kk,
                    'jml_laki_laki' => $jmlh_total_laki_laki,
                    'jml_perempuan' => $jmlh_total_perempuan,
                    'balita_laki_laki' => $jmlh_balita_laki_laki,
                    'balita_perempuan' => $jmlh_balita_perempuan,
                    'pus' => $pus,
                    'wus' =>  $wus,
                    'ibu_hamil' => $jmlh_ibu_hamil,
                    'ibu_menyusui' => $jlmh_ibu_menyusui,
                    'lansia' =>  $jmlh_lansia,
                    '3_buta' =>  $jmlh_3_buta,
                    'jml_jamban_keluarga' => $jmlh_jamban_keluarga,
                    'berkebutuhan_khusus' => $berkebutuhan_khusus,
                    'kriteria_rumah' => $kriteria_rumah,
                    'sumber_air' => $sumber_air,
                    'tempat_sampah' => $tempat_sampah,
                    'jenis_kegiatan_id' => $jenis_kegiatan_id,
                    'nama_kegiatan' => $nama_kegiatan,
                    'makanan_pokok' => $makanan_pokok,
                    'keterangan' => $keterangan,
                    'tgl' => $tgl,
                ];

                // $data = $this->catatan_keluarga->post_catatan_keluarga($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik, $berkebutuhan_khusus, $kriteria_rumah, $sumber_air, $tempat_sampah, $jenis_kegiatan_id, $nama_kegiatan, $makanan_pokok, $keterangan);

                $this->catatan_keluarga->update($id, $data_catatan_keluarga);

                $msg = [
                    'sukses' => 'Data Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }
}
