<?php

namespace App\Controllers;

use App\Models\SumberAirKeluarga_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class SumberAirKeluarga extends BaseController
{

    protected $sumber_air_keluarga;
    protected $warga;
    protected $user;

    public function __construct()
    {
        $this->sumber_air_keluarga = new SumberAirKeluarga_Model();
        $this->warga = new Warga_Model();
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
            'title' => 'Sumber Air Keluarga - Dashboard Dasa Wisma',
        ];
        return view('auth/sumber-air-keluarga/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            // $nik = session()->get('nik');

            $kode_nik = session()->get('nik');
            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
            $nama_jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $nama_jabatan,
                'list' => $this->sumber_air_keluarga->list()
            ];

            $msg = [
                'data' => view('auth/sumber-air-keluarga/list', $data)
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
                'title' => 'Form Tambah Sumber Air Keluarga'
            ];

            $msg = [
                'data' => view('auth/sumber-air-keluarga/tambah', $data)
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
                'jenis_sumber_air' => [
                    'label' => 'Jenis Sumber Air',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_sumber_air'  => $validation->getError('jenis_sumber_air'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';

                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $jenis_sumber_air = $this->request->getVar('jenis_sumber_air');
                $data_jenis_sumber_air = [
                    'jenis_sumber_air' => $jenis_sumber_air
                ];

                // $this->sumber_air_keluarga->post_sumber_air($kode_nik, $kode_token, $jenis_sumber_air);
                $this->sumber_air_keluarga->insert($data_jenis_sumber_air);

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

                $this->sumber_air_keluarga->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Jenis Sumber Air Berhasil Dihapus"
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

            $this->sumber_air_keluarga->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function formedit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $data = [
                'title' => 'Form Edit Sumber Air Keluarga',
                'list' => $this->sumber_air_keluarga->where('id', $id)->get()->getRowArray()
            ];

            $msg = [
                'sukses' => view('auth/sumber-air-keluarga/edit', $data)
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
                'jenis_sumber_air' => [
                    'label' => 'Jenis Sumber Air',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_sumber_air'  => $validation->getError('jenis_sumber_air'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';

                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $id = $this->request->getVar('id');
                $jenis_sumber_air = $this->request->getVar('jenis_sumber_air');
                $data_jenis_sumber_air = [
                    'jenis_sumber_air' => $jenis_sumber_air
                ];

                // $this->sumber_air_keluarga->post_sumber_air($kode_nik, $kode_token, $jenis_sumber_air);
                $this->sumber_air_keluarga->update($id, $data_jenis_sumber_air);

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
