<?php

namespace App\Controllers;

use App\Models\CatatanKelahiran_Model;
use App\Models\CatatanKematian_Model;
use App\Models\CatatanStatusIbu_Model;
use App\Models\Desa_Model;
use App\Models\Kecamatan_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class CatatanStatusIbu extends BaseController
{

    protected $catatan_status_ibu;
    protected $warga;
    protected $data_kecamatan;
    protected $data_desa;
    protected $catatan_kelahiran;
    protected $catatan_kematian;
    protected $user;

    public function __construct()
    {
        $this->catatan_status_ibu = new CatatanStatusIbu_Model();
        $this->warga = new Warga_Model();
        $this->data_kecamatan = new Kecamatan_Model();
        $this->data_desa = new Desa_Model();
        $this->catatan_kelahiran = new CatatanKelahiran_Model();
        $this->catatan_kematian = new CatatanKematian_Model();
        $this->user = new User_Model();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $kode_nik = session()->get('nik');
        $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
        $jabatan = $kode_dasa_wisma['jabatan'];

        $data = [
            'jabatan' => $jabatan,
            'title' => 'Catatan Status Ibu - Dashboard Dasa Wisma',
        ];
        return view('auth/catatan-status-ibu/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
            $dasa_wisma = $kode_dasa_wisma['idDasawisma'];
            $jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $jabatan,
                'dasa_wisma' => $dasa_wisma,
                'list' => $this->catatan_status_ibu->list(),
                'list_kematian' => $this->catatan_status_ibu->list_kematian()
            ];

            $msg = [
                'data' => view('auth/catatan-status-ibu/list', $data)
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

            $data = [
                'title' => 'Form Tambah Dasa Wisma',
                'nik_ibu' => $this->warga->get()->getResultArray(),
                'dusun' => $dusun
            ];

            $msg = [
                'data' => view('auth/catatan-status-ibu/tambah', $data)
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

            $status = $this->request->getVar('status');

            if ($status == '1') {
                $valid = $this->validate([
                    'tgl' => [
                        'label' => 'Tanggal Pencatatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nik_ibu' => [
                        'label' => 'Nama Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_suami' => [
                        'label' => 'Nama Suami',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'status' => [
                        'label' => 'Status Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'catatan_status_ibu' => [
                        'label' => 'Status Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_bayi' => [
                        'label' => 'Nama Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'jenis_kelamin' => [
                        'label' => 'Jenis Kelamin Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'tgl_lahir' => [
                        'label' => 'Tanggal Lahir Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'akte' => [
                        'label' => 'Akte',
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
                            'nik_ibu'    => $validation->getError('nik_ibu'),
                            'nama_suami'    => $validation->getError('nama_suami'),
                            'status' => $validation->getError('status'),
                            'catatan_status_ibu' => $validation->getError('catatan_status_ibu'),
                            'nama_bayi' => $validation->getError('nama_bayi'),
                            'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                            'tgl_lahir' => $validation->getError('tgl_lahir'),
                            'akte' => $validation->getError('akte'),
                        ]
                    ];
                } else {

                    // $kode_nik = '1234567890';


                    $kode_nik = session()->get('nik');
                    $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                    $kode_token = $get_token['token'];
                    // $kode_token = '494';
                    $kecamatan = $get_token['kodeKecamatan'];
                    $desa = $get_token['kodeDesa'];

                    $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
                    $dasa_wisma = $kode_dasa_wisma['idDasawisma'];

                    $nik_ibu = $this->request->getVar('nik_ibu');

                    $get_nama = $this->warga->where('nomorIndukKependudukan', $nik_ibu)->get()->getRowArray();
                    $nama_ibu = $get_nama['namaWarga'];

                    $tgl = $this->request->getVar('tgl');
                    $nama_suami = $this->request->getVar('nama_suami');
                    $status = $this->request->getVar('status');
                    //tb_catatan_lahir
                    $catatan_status_ibu = $this->request->getVar('catatan_status_ibu');
                    $nama_bayi = $this->request->getVar('nama_bayi');
                    $jenis_kelamin = $this->request->getVar('jenis_kelamin');
                    $tgl_lahir = $this->request->getVar('tgl_lahir');
                    $akte = $this->request->getVar('akte');

                    $data_catatan_status_ibu = [
                        'kode_kecamatan' => $kecamatan,
                        'kode_desa' => $desa,
                        'kode_dasa_wisma' => $dasa_wisma,
                        'tgl' => $tgl,
                        'nik_ibu' => $nik_ibu,
                        'nama_ibu' => $nama_ibu,
                        'nama_suami' => $nama_suami,
                        'status' => $status,
                    ];

                    $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                    $id_status_ibu = $ambil_id_status_ibu['id'] + 1;

                    $data_catatan_kelahiran = [
                        'catatan_status_ibu_id' =>  $id_status_ibu,
                        'catatan_status_ibu' => $catatan_status_ibu,
                        'nama_bayi' => $nama_bayi,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tgl_lahir' => $tgl_lahir,
                        'akte' => $akte,
                    ];

                    // $this->catatan_status_ibu->post_catatan_status_ibu($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik_ibu, $nama_suami, $status, $catatan_status_ibu, $nama_bayi, $jenis_kelamin, $tgl_lahir, $akte);

                    $this->catatan_status_ibu->insert($data_catatan_status_ibu);
                    $this->catatan_kelahiran->insert($data_catatan_kelahiran);

                    $msg = [
                        'sukses' => 'Data Berhasil Disimpan'
                    ];
                }
            } else if ($status == '2') {
                $valid = $this->validate([
                    'tgl' => [
                        'label' => 'Tanggal Pencatatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nik_ibu' => [
                        'label' => 'Nama Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_suami' => [
                        'label' => 'Nama Suami',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'status' => [
                        'label' => 'Status Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'catatan_status_ibu_meninggal' => [
                        'label' => 'Status Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_bayi_meninggal' => [
                        'label' => 'Nama Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'jenis_kelamin_bayi' => [
                        'label' => 'Jenis Kelamin Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'tgl_meninggal' => [
                        'label' => 'Tanggal Lahir Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'sebab_meninggal' => [
                        'label' => 'Sebab Meninggal',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'keterangan' => [
                        'label' => 'Keterangan',
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
                            'nik_ibu'    => $validation->getError('nik_ibu'),
                            'nama_suami'    => $validation->getError('nama_suami'),
                            'status' => $validation->getError('status'),
                            'catatan_status_ibu_meninggal' => $validation->getError('catatan_status_ibu_meninggal'),
                            'nama_bayi_meninggal' => $validation->getError('nama_bayi_meninggal'),
                            'jenis_kelamin_bayi' => $validation->getError('jenis_kelamin_bayi'),
                            'tgl_meninggal' => $validation->getError('tgl_meninggal'),
                            'sebab_meninggal' => $validation->getError('sebab_meninggal'),
                            'keterangan' => $validation->getError('keterangan'),
                        ]
                    ];
                } else {

                    // $kode_nik = '1234567890';


                    $kode_nik = session()->get('nik');
                    $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                    $kode_token = $get_token['token'];
                    // $kode_token = '494';
                    $kecamatan = $get_token['kodeKecamatan'];
                    $desa = $get_token['kodeDesa'];

                    $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
                    $dasa_wisma = $kode_dasa_wisma['idDasawisma'];

                    $nik_ibu = $this->request->getVar('nik_ibu');
                    $get_nama = $this->warga->where('nomorIndukKependudukan', $nik_ibu)->get()->getRowArray();
                    $nama_ibu = $get_nama['namaWarga'];

                    $tgl = $this->request->getVar('tgl');

                    $nama_suami = $this->request->getVar('nama_suami');
                    $status = $this->request->getVar('status');
                    //tb_catatan_meninggal
                    $catatan_status_ibu_meninggal = $this->request->getVar('catatan_status_ibu_meninggal');
                    $nama_bayi_meninggal = $this->request->getVar('nama_bayi_meninggal');
                    $jenis_kelamin_bayi = $this->request->getVar('jenis_kelamin_bayi');
                    $tgl_meninggal = $this->request->getVar('tgl_meninggal');
                    $sebab_meninggal = $this->request->getVar('sebab_meninggal');
                    $keterangan = $this->request->getVar('keterangan');

                    $data_catatan_status_ibu = [
                        'kode_kecamatan' => $kecamatan,
                        'kode_desa' => $desa,
                        'kode_dasa_wisma' => $dasa_wisma,
                        'tgl' => $tgl,
                        'nik_ibu' => $nik_ibu,
                        'nama_ibu' => $nama_ibu,
                        'nama_suami' => $nama_suami,
                        'status' => $status,
                    ];

                    $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                    $id_status_ibu = $ambil_id_status_ibu['id'] + 1;

                    $data_catatan_kematian = [
                        'catatan_status_ibu_id' =>  $id_status_ibu,
                        'catatan_status_ibu_meninggal' => $catatan_status_ibu_meninggal,
                        'nama_bayi_meninggal' => $nama_bayi_meninggal,
                        'jenis_kelamin_meninggal' => $jenis_kelamin_bayi,
                        'tgl_meninggal' => $tgl_meninggal,
                        'sebab_meninggal' => $sebab_meninggal,
                        'keterangan_meninggal' => $keterangan,
                    ];

                    // $this->catatan_status_ibu->post_dasa_wisma($kode_nik, $kode_token, $kecamatan, $dasa_wisma, $dasa_wisma, $tgl, $nik_ibu, $nama_suami, $status, $catatan_status_ibu_meninggal, $nama_bayi_meninggal, $jenis_kelamin_bayi, $tgl_meninggal, $sebab_meninggal, $keterangan);

                    $this->catatan_status_ibu->insert($data_catatan_status_ibu);
                    $this->catatan_kematian->insert($data_catatan_kematian);

                    $msg = [
                        'sukses' => 'Data Berhasil Disimpan'
                    ];
                }
            } else {
                $msg = [
                    'error' => [
                        'data' => 'Silahkan Pilih Status Bayi'
                    ],
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

            $id = $this->request->getVar('id');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->catatan_kelahiran->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Catatan Status Ibu Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapusall_kematian()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->catatan_kematian->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Catatan Status Ibu Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->catatan_kelahiran->delete($id);

            $msg = [
                'sukses' => 'Catatan Status Ibu Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function hapus_kematian()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->catatan_kematian->delete($id);

            $msg = [
                'sukses' => 'Catatan Status Ibu Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function formupload()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Upload Catatan Status Ibu',
            ];

            $msg = [
                'data' => view('auth/catatan-status-ibu/upload', $data)
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
                    if ($jumlahData > 0) {
                        foreach ($data as $d) {

                            $result[] = array(
                                "kode_kecamatan" => $kecamatan,
                                "kode_desa" => $desa,
                                "kode_dasa_wisma" => $dasa_wisma,
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($data as $dc) {
                            $result_catatan_kelahiran[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu" => $dc[5],
                                "nama_bayi" => $dc[6],
                                "jenis_kelamin" =>  $dc[7],
                                "tgl_lahir" => $dc[8],
                                "akte" => $dc[9],
                            );
                        }

                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kelahiran->insert($result_catatan_kelahiran[$i]);
                        }

                        $msg = [
                            'sukses' => "Data Berhasil Disimpan"
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
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($data as $dc) {
                            $result_catatan_kelahiran[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu" => $dc[5],
                                "nama_bayi" => $dc[6],
                                "jenis_kelamin" =>  $dc[7],
                                "tgl_lahir" => $dc[8],
                                "akte" => $dc[9],
                            );
                        }

                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kelahiran->insert($result_catatan_kelahiran[$i]);
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
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($csv_data as $dc) {
                            $result_catatan_kelahiran[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu" => $dc[5],
                                "nama_bayi" => $dc[6],
                                "jenis_kelamin" =>  $dc[7],
                                "tgl_lahir" => $dc[8],
                                "akte" => $dc[9],
                            );
                        }

                        for ($i = 0; $i < $jumlah; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kelahiran->insert($result_catatan_kelahiran[$i]);
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

    public function formupload_kematian()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Upload Catatan Status Ibu',
            ];

            $msg = [
                'data' => view('auth/catatan-status-ibu/upload_kematian', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function upload_kematian()
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
                    if ($jumlahData > 0) {
                        foreach ($data as $d) {

                            $result[] = array(
                                "kode_kecamatan" => $kecamatan,
                                "kode_desa" => $desa,
                                "kode_dasa_wisma" => $dasa_wisma,
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($data as $dc) {
                            $result_catatan_kematian[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu_meninggal" => $dc[5],
                                "nama_bayi_meninggal" => $dc[6],
                                "jenis_kelamin_meninggal" =>  $dc[7],
                                "tgl_meninggal" => $dc[8],
                                "sebab_meninggal" => $dc[9],
                                "keterangan_meninggal" => $dc[10],
                            );
                        }

                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kematian->insert($result_catatan_kematian[$i]);
                        }
                        $msg = [
                            'sukses' => "Data Berhasil Disimpan"
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
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($data as $dc) {
                            $result_catatan_kematian[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu_meninggal" => $dc[5],
                                "nama_bayi_meninggal" => $dc[6],
                                "jenis_kelamin_meninggal" =>  $dc[7],
                                "tgl_meninggal" => $dc[8],
                                "sebab_meninggal" => $dc[9],
                                "keterangan_meninggal" => $dc[10],
                            );
                        }

                        for ($i = 0; $i < $jumlahData; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kematian->insert($result_catatan_kematian[$i]);
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
                                "tgl" =>  $d[0],
                                "nik_ibu" => $d[1],
                                "nama_ibu" => $d[2],
                                "nama_suami" => $d[3],
                                "status" => $d[4],
                            );
                        }
                        $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                        $id_status_ibu = $ambil_id_status_ibu['id'] + 1;
                        foreach ($csv_data as $dc) {
                            $result_catatan_kematian[] = array(
                                "catatan_status_ibu_id" => $id_status_ibu++,
                                "catatan_status_ibu_meninggal" => $dc[5],
                                "nama_bayi_meninggal" => $dc[6],
                                "jenis_kelamin_meninggal" =>  $dc[7],
                                "tgl_meninggal" => $dc[8],
                                "sebab_meninggal" => $dc[9],
                                "keterangan_meninggal" => $dc[10],
                            );
                        }

                        for ($i = 0; $i < $jumlah; $i++) {
                            $this->catatan_status_ibu->insert($result[$i]);
                            $this->catatan_kematian->insert($result_catatan_kematian[$i]);
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

            $id_kelahiran = $this->request->getVar('id_kelahiran');
            $id_kematian = $this->request->getVar('id_kematian');

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $dusun = $nama_dusun['dusun'];

            $data = [
                'title' => 'Form Edit Dasa Wisma',
                'nik_ibu' => $this->warga->get()->getResultArray(),
                'list_kematian' => $this->catatan_status_ibu->list_per_user_kematian($id_kelahiran),
                'list_kelahiran' => $this->catatan_status_ibu->list_per_user_kelahiran($id_kematian),
                'dusun' => $dusun
            ];

            $msg = [
                'sukses' => view('auth/catatan-status-ibu/edit', $data)
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

            $status = $this->request->getVar('status');

            if ($status == '1') {
                $valid = $this->validate([
                    'tgl' => [
                        'label' => 'Tanggal Pencatatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nik_ibu' => [
                        'label' => 'Nama Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_suami' => [
                        'label' => 'Nama Suami',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'status' => [
                        'label' => 'Status Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'catatan_status_ibu' => [
                        'label' => 'Status Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_bayi' => [
                        'label' => 'Nama Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'jenis_kelamin' => [
                        'label' => 'Jenis Kelamin Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'tgl_lahir' => [
                        'label' => 'Tanggal Lahir Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'akte' => [
                        'label' => 'Akte',
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
                            'nik_ibu'    => $validation->getError('nik_ibu'),
                            'nama_suami'    => $validation->getError('nama_suami'),
                            'status' => $validation->getError('status'),
                            'catatan_status_ibu' => $validation->getError('catatan_status_ibu'),
                            'nama_bayi' => $validation->getError('nama_bayi'),
                            'jenis_kelamin' => $validation->getError('jenis_kelamin'),
                            'tgl_lahir' => $validation->getError('tgl_lahir'),
                            'akte' => $validation->getError('akte'),
                        ]
                    ];
                } else {

                    // $kode_nik = '1234567890';


                    $kode_nik = session()->get('nik');
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

                    $nik_ibu = $this->request->getVar('nik_ibu');


                    $get_nama = $this->warga->where('nomorIndukKependudukan', $nik_ibu)->first();
                    $nama_ibu = $get_nama['namaWarga'];

                    $tgl = $this->request->getVar('tgl');
                    $nama_suami = $this->request->getVar('nama_suami');
                    $status = $this->request->getVar('status');
                    //tb_catatan_lahir
                    $catatan_status_ibu = $this->request->getVar('catatan_status_ibu');
                    $nama_bayi = $this->request->getVar('nama_bayi');
                    $jenis_kelamin = $this->request->getVar('jenis_kelamin');
                    $tgl_lahir = $this->request->getVar('tgl_lahir');
                    $akte = $this->request->getVar('akte');

                    $data_catatan_status_ibu = [
                        'kode_kecamatan' => $kecamatan,
                        'kode_desa' => $desa,
                        'kode_dasa_wisma' => $dasa_wisma,
                        'tgl' => $tgl,
                        'nik_ibu' => $nik_ibu,
                        'nama_ibu' => $nama_ibu,
                        'nama_suami' => $nama_suami,
                        'status' => $status,
                    ];

                    $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                    $id_status_ibu = $ambil_id_status_ibu['id'] + 1;

                    $data_catatan_kelahiran = [
                        'catatan_status_ibu_id' =>  $id_status_ibu,
                        'catatan_status_ibu' => $catatan_status_ibu,
                        'nama_bayi' => $nama_bayi,
                        'jenis_kelamin' => $jenis_kelamin,
                        'tgl_lahir' => $tgl_lahir,
                        'akte' => $akte,
                    ];

                    // $this->catatan_status_ibu->post_catatan_status_ibu($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik_ibu, $nama_suami, $status, $catatan_status_ibu, $nama_bayi, $jenis_kelamin, $tgl_lahir, $akte);

                    $this->catatan_status_ibu->insert($data_catatan_status_ibu);
                    $this->catatan_kelahiran->insert($data_catatan_kelahiran);

                    $msg = [
                        'sukses' => 'Data Berhasil Disimpan'
                    ];
                }
            } else if ($status == '2') {
                $valid = $this->validate([
                    'tgl' => [
                        'label' => 'Tanggal Pencatatan',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nik_ibu' => [
                        'label' => 'Nama Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_suami' => [
                        'label' => 'Nama Suami',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'status' => [
                        'label' => 'Status Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'catatan_status_ibu_meninggal' => [
                        'label' => 'Status Ibu',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'nama_bayi_meninggal' => [
                        'label' => 'Nama Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'jenis_kelamin_bayi' => [
                        'label' => 'Jenis Kelamin Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'tgl_meninggal' => [
                        'label' => 'Tanggal Lahir Bayi',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'sebab_meninggal' => [
                        'label' => 'Sebab Meninggal',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} tidak boleh kosong'
                        ]
                    ],
                    'keterangan' => [
                        'label' => 'Keterangan',
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
                            'nik_ibu'    => $validation->getError('nik_ibu'),
                            'nama_suami'    => $validation->getError('nama_suami'),
                            'status' => $validation->getError('status'),
                            'catatan_status_ibu_meninggal' => $validation->getError('catatan_status_ibu_meninggal'),
                            'nama_bayi_meninggal' => $validation->getError('nama_bayi_meninggal'),
                            'jenis_kelamin_bayi' => $validation->getError('jenis_kelamin_bayi'),
                            'tgl_meninggal' => $validation->getError('tgl_meninggal'),
                            'sebab_meninggal' => $validation->getError('sebab_meninggal'),
                            'keterangan' => $validation->getError('keterangan'),
                        ]
                    ];
                } else {

                    // $kode_nik = '1234567890';


                    $kode_nik = session()->get('nik');
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

                    $nik_ibu = $this->request->getVar('nik_ibu');
                    $get_nama = $this->warga->where('nomorIndukKependudukan', $nik_ibu)->first();
                    $nama_ibu = $get_nama['namaWarga'];

                    $tgl = $this->request->getVar('tgl');

                    $nama_suami = $this->request->getVar('nama_suami');
                    $status = $this->request->getVar('status');
                    //tb_catatan_meninggal
                    $catatan_status_ibu_meninggal = $this->request->getVar('catatan_status_ibu_meninggal');
                    $nama_bayi_meninggal = $this->request->getVar('nama_bayi_meninggal');
                    $jenis_kelamin_bayi = $this->request->getVar('jenis_kelamin_bayi');
                    $tgl_meninggal = $this->request->getVar('tgl_meninggal');
                    $sebab_meninggal = $this->request->getVar('sebab_meninggal');
                    $keterangan = $this->request->getVar('keterangan');

                    $data_catatan_status_ibu = [
                        'kode_kecamatan' => $kecamatan,
                        'kode_desa' => $desa,
                        'kode_dasa_wisma' => $dasa_wisma,
                        'tgl' => $tgl,
                        'nik_ibu' => $nik_ibu,
                        'nama_ibu' => $nama_ibu,
                        'nama_suami' => $nama_suami,
                        'status' => $status,
                    ];

                    $ambil_id_status_ibu = $this->catatan_status_ibu->orderBy('id', 'desc')->get()->getRowArray();
                    $id_status_ibu = $ambil_id_status_ibu['id'] + 1;

                    $data_catatan_kematian = [
                        'catatan_status_ibu_id' =>  $id_status_ibu,
                        'catatan_status_ibu_meninggal' => $catatan_status_ibu_meninggal,
                        'nama_bayi_meninggal' => $nama_bayi_meninggal,
                        'jenis_kelamin_meninggal' => $jenis_kelamin_bayi,
                        'tgl_meninggal' => $tgl_meninggal,
                        'sebab_meninggal' => $sebab_meninggal,
                        'keterangan_meninggal' => $keterangan,
                    ];

                    // $this->catatan_status_ibu->post_dasa_wisma($kode_nik, $kode_token, $kecamatan, $dasa_wisma, $dasa_wisma, $tgl, $nik_ibu, $nama_suami, $status, $catatan_status_ibu_meninggal, $nama_bayi_meninggal, $jenis_kelamin_bayi, $tgl_meninggal, $sebab_meninggal, $keterangan);

                    $this->catatan_status_ibu->insert($data_catatan_status_ibu);
                    $this->catatan_kematian->insert($data_catatan_kematian);

                    $msg = [
                        'sukses' => 'Data Berhasil Disimpan'
                    ];
                }
            } else {
                $msg = [
                    'error' => [
                        'data' => 'Silahkan Pilih Status Bayi'
                    ],
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }
}
