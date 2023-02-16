<?php

namespace App\Controllers;

use App\Models\TempatSampah_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class TempatSampah extends BaseController
{

    protected $tempat_sampah;
    protected $warga;
    protected $user;

    public function __construct()
    {
        $this->tempat_sampah = new TempatSampah_Model();
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
            'title' => 'Tempat Sampah - Dashboard Dasa Wisma',
        ];
        return view('auth/tempat-sampah/index', $data);
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
                'list' => $this->tempat_sampah->list()
            ];

            $msg = [
                'data' => view('auth/tempat-sampah/list', $data)
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
                'title' => 'Form Tambah Jenis Tempat Sampah'
            ];

            $msg = [
                'data' => view('auth/tempat-sampah/tambah', $data)
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
                'jenis_tempat_sampah' => [
                    'label' => 'Jenis Tempat Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_tempat_sampah'  => $validation->getError('jenis_tempat_sampah'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $jenis_tempat_sampah = $this->request->getVar('jenis_tempat_sampah');
                $data_jenis_tempat_sampah = [
                    'jenis_tempat_sampah' => $jenis_tempat_sampah
                ];

                // $this->tempat_sampah->post_tempat_sampah($kode_nik, $kode_token, $jenis_tempat_sampah);
                $this->tempat_sampah->insert($data_jenis_tempat_sampah);

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

                $this->tempat_sampah->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Jenis Tempat Sampah Berhasil Dihapus"
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

            $this->tempat_sampah->delete($id);

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
                'list' => $this->tempat_sampah->where('id', $id)->get()->getRowArray(),
                'title' => 'Form Edit Jenis Tempat Sampah'
            ];

            $msg = [
                'sukses' => view('auth/tempat-sampah/edit', $data)
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
                'jenis_tempat_sampah' => [
                    'label' => 'Jenis Tempat Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_tempat_sampah'  => $validation->getError('jenis_tempat_sampah'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $id = $this->request->getVar('id');
                $jenis_tempat_sampah = $this->request->getVar('jenis_tempat_sampah');
                $data_jenis_tempat_sampah = [
                    'jenis_tempat_sampah' => $jenis_tempat_sampah
                ];

                // $this->tempat_sampah->post_tempat_sampah($kode_nik, $kode_token, $jenis_tempat_sampah);
                $this->tempat_sampah->update($id, $data_jenis_tempat_sampah);

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
