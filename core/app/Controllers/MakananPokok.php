<?php

namespace App\Controllers;

use App\Models\MakananPokok_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class MakananPokok extends BaseController
{

    protected $makanan_pokok;
    protected $warga;
    protected $user;

    public function __construct()
    {
        $this->makanan_pokok = new MakananPokok_Model();
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
            'title' => 'Makanan Pokok - Dashboard Dasa Wisma',
        ];
        return view('auth/makanan-pokok/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            $nik = session()->get('nik');

            $kode_nik = session()->get('nik');
            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
            $nama_jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $nama_jabatan,
                'list' => $this->makanan_pokok->list()
            ];

            $msg = [
                'data' => view('auth/makanan-pokok/list', $data)
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
                'title' => 'Form Tambah Makanan Pokok'
            ];

            $msg = [
                'data' => view('auth/makanan-pokok/tambah', $data)
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
                'jenis_makanan_pokok' => [
                    'label' => 'Makanan Pokok',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_makanan_pokok'  => $validation->getError('jenis_makanan_pokok'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $jenis_makanan_pokok = $this->request->getVar('jenis_makanan_pokok');

                $data_makanan_pokok = [
                    'makanan_pokok' => $jenis_makanan_pokok
                ];

                // $this->makanan_pokok->post_makanan_pokok($kode_nik, $kode_token, $jenis_makanan_pokok);
                $this->makanan_pokok->insert($data_makanan_pokok);

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

                $this->makanan_pokok->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Makanan Pokok Berhasil Dihapus"
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

            $this->makanan_pokok->delete($id);

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
                'list' => $this->makanan_pokok->where('id', $id)->get()->getRowArray(),
                'title' => 'Form Edit Makanan Pokok'
            ];

            $msg = [
                'sukses' => view('auth/makanan-pokok/edit', $data)
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
                'jenis_makanan_pokok' => [
                    'label' => 'Makanan Pokok',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_makanan_pokok'  => $validation->getError('jenis_makanan_pokok'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $id = $this->request->getVar('id');
                $jenis_makanan_pokok = $this->request->getVar('jenis_makanan_pokok');

                $data_makanan_pokok = [
                    'makanan_pokok' => $jenis_makanan_pokok
                ];

                // $this->makanan_pokok->post_makanan_pokok($kode_nik, $kode_token, $jenis_makanan_pokok);
                $this->makanan_pokok->update($id, $data_makanan_pokok);

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
