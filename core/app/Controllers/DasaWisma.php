<?php

namespace App\Controllers;

use App\Models\DasaWisma_Model;
use App\Models\Desa_Model;
use App\Models\Dusun_Model;
use App\Models\Kecamatan_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class DasaWisma extends BaseController
{
    protected $dasa_wisma;
    protected $warga;
    protected $data_kecamatan;
    protected $data_desa;
    protected $data_dusun;
    protected $user;

    public function __construct()
    {
        $this->dasa_wisma = new DasaWisma_Model();
        $this->warga = new Warga_Model();
        $this->data_kecamatan = new Kecamatan_Model();
        $this->data_desa = new Desa_Model();
        $this->data_dusun = new Dusun_Model();
        $this->user = new User_Model();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $kode_nik = session()->get('nik');
        $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
        $nama_jabatan = $kode_dasa_wisma['jabatan'];

        $data = [
            'jabatan' => $nama_jabatan,
            'title' => 'Dasa Wisma - Dashboard Dasa Wisma',
        ];
        return view('auth/dasaWisma/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

            $nama_dusun = $get_token['dusun'];

            $get_kd_dusun = $this->data_dusun->where('namaDusun', $nama_dusun)->first();
            $dusun = $get_kd_dusun['idDusun'];

            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
            $nama_jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $nama_jabatan,
                'dusun' => $dusun,
                'list' => $this->dasa_wisma->list()
            ];

            $msg = [

                'data' => view('auth/dasaWisma/list', $data)
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Tambah Dasa Wisma'
            ];

            $msg = [
                'data' => view('auth/dasaWisma/tambah', $data)
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
                'nama_kecamatan' => [
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_desa' => [
                    'label' => 'Desa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_dusun' => [
                    'label' => 'Dusun',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'rt' => [
                    'label' => 'RT',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'rw' => [
                    'label' => 'RW',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_dasa_wisma' => [
                    'label' => 'Dasa Wisma',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kecamatan'  => $validation->getError('nama_kecamatan'),
                        'nama_desa'    => $validation->getError('nama_desa'),
                        'nama_dusun'    => $validation->getError('nama_dusun'),
                        'rt' => $validation->getError('rt'),
                        'rw' => $validation->getError('rw'),
                        'nama_dasa_wisma' => $validation->getError('nama_dasa_wisma'),
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
                $nama_dusun = $get_token['dusun'];

                $get_kd_kecamatan = $this->data_kecamatan->where('namaKecamatan', $nama_kecamatan)->first();
                $kecamatan = $get_kd_kecamatan['kodeKecamatan'];

                $get_kd_desa = $this->data_desa->where('namaDesa', $nama_desa)->first();
                $desa = $get_kd_desa['kodeDesa'];

                $get_kd_dusun = $this->data_dusun->where('namaDusun', $nama_dusun)->first();
                $dusun = $get_kd_dusun['idDusun'];


                $rt = $this->request->getVar('rt');
                $rw = $this->request->getVar('rw');
                $nama_dasa_wisma = $this->request->getVar('nama_dasa_wisma');

                // $this->dasa_wisma->post_dasa_wisma($kode_nik, $kode_token, $kecamatan, $desa, $dusun, $rt, $rw, $nama_dasa_wisma);

                $data = [
                    'kode_kecamatan' => $kecamatan,
                    'kode_desa' => $desa,
                    'kode_dusun' => $dusun,
                    'RT' => $rt,
                    'RW' => $rw,
                    'nama_dasa_wisma' => $nama_dasa_wisma,
                ];

                $this->dasa_wisma->insert($data);


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

            $id = $this->request->getVar('id');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->dasa_wisma->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data Dasa Wisma Berhasil Dihapus"
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

            $this->dasa_wisma->delete($id);

            $msg = [
                'sukses' => 'Data Dasa Wisma Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data = [
                'list' => $this->dasa_wisma->where('id', $id)->get()->getRowArray(),
                'title' => 'Form Edit Dasa Wisma'
            ];

            $msg = [
                'sukses' => view('auth/dasaWisma/edit', $data)
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
                'nama_kecamatan' => [
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_desa' => [
                    'label' => 'Desa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_dusun' => [
                    'label' => 'Dusun',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'rt' => [
                    'label' => 'RT',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'rw' => [
                    'label' => 'RW',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nama_dasa_wisma' => [
                    'label' => 'Dasa Wisma',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kecamatan'  => $validation->getError('nama_kecamatan'),
                        'nama_desa'    => $validation->getError('nama_desa'),
                        'nama_dusun'    => $validation->getError('nama_dusun'),
                        'rt' => $validation->getError('rt'),
                        'rw' => $validation->getError('rw'),
                        'nama_dasa_wisma' => $validation->getError('nama_dasa_wisma'),
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
                $nama_dusun = $get_token['dusun'];

                $get_kd_kecamatan = $this->data_kecamatan->where('namaKecamatan', $nama_kecamatan)->first();
                $kecamatan = $get_kd_kecamatan['kodeKecamatan'];

                $get_kd_desa = $this->data_desa->where('namaDesa', $nama_desa)->first();
                $desa = $get_kd_desa['kodeDesa'];

                $get_kd_dusun = $this->data_dusun->where('namaDusun', $nama_dusun)->first();
                $dusun = $get_kd_dusun['idDusun'];

                $id = $this->request->getVar('id');
                $rt = $this->request->getVar('rt');
                $rw = $this->request->getVar('rw');
                $nama_dasa_wisma = $this->request->getVar('nama_dasa_wisma');

                // $this->dasa_wisma->post_dasa_wisma($kode_nik, $kode_token, $kecamatan, $desa, $dusun, $rt, $rw, $nama_dasa_wisma);

                $data = [
                    'RT' => $rt,
                    'RW' => $rw,
                    'nama_dasa_wisma' => $nama_dasa_wisma,
                ];

                $this->dasa_wisma->update($id, $data);


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
