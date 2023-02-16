<?php

namespace App\Controllers;

use App\Models\KriteriaRumah_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class KriteriaRumah extends BaseController
{

    protected $kriteria_rumah;
    protected $warga;
    protected $user;

    public function __construct()
    {
        $this->kriteria_rumah = new KriteriaRumah_Model();
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
            'title' => 'Kriteria Rumah - Dashboard Dasa Wisma',
        ];
        return view('auth/kriteria-rumah/index', $data);
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
                'list' => $this->kriteria_rumah->list()
            ];

            $msg = [
                'data' => view('auth/kriteria-rumah/list', $data)
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
                'title' => 'Form Tambah Kriteria Rumah'
            ];

            $msg = [
                'data' => view('auth/kriteria-rumah/tambah', $data)
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
                'kriteria_rumah' => [
                    'label' => 'Kriteria Rumah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'kriteria_rumah'  => $validation->getError('kriteria_rumah'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $kriteria_rumah = $this->request->getVar('kriteria_rumah');

                $data_kriteria_rumah = [
                    'jenis_kriteria_rumah' => $kriteria_rumah
                ];

                // $this->kriteria_rumah->post_kriteriarumah($kode_nik, $kode_token, $kriteria_rumah);
                $this->kriteria_rumah->insert($data_kriteria_rumah);

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

                $this->kriteria_rumah->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Kriteria Rumah Berhasil Dihapus"
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

            $this->kriteria_rumah->delete($id);

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
                'list' => $this->kriteria_rumah->where('id', $id)->get()->getRowArray(),
                'title' => 'Form Edit Kriteria Rumah'
            ];

            $msg = [
                'sukses' => view('auth/kriteria-rumah/edit', $data)
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
                'kriteria_rumah' => [
                    'label' => 'Kriteria Rumah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'kriteria_rumah'  => $validation->getError('kriteria_rumah'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';


                $id = $this->request->getVar('id');
                $kriteria_rumah = $this->request->getVar('kriteria_rumah');

                $data_kriteria_rumah = [
                    'jenis_kriteria_rumah' => $kriteria_rumah
                ];

                // $this->kriteria_rumah->post_kriteriarumah($kode_nik, $kode_token, $kriteria_rumah);
                $this->kriteria_rumah->update($id, $data_kriteria_rumah);

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
