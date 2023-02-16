<?php

namespace App\Controllers;

use App\Models\JenisKegiatan_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;

class JenisKegiatan extends BaseController
{

    protected $jenis_kegiatan;
    protected $warga;
    protected $user;

    public function __construct()
    {
        $this->jenis_kegiatan = new JenisKegiatan_Model();
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
            'title' => 'Jenis Kegiatan - Dashboard Dasa Wisma',
        ];
        return view('auth/jenis-kegiatan/index', $data);
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
                'list' => $this->jenis_kegiatan->list()
            ];

            $msg = [
                'data' => view('auth/jenis-kegiatan/list', $data)
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
                'title' => 'Form Tambah Jenis Kegiatan PKK'
            ];

            $msg = [
                'data' => view('auth/jenis-kegiatan/tambah', $data)
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
                'jenis_kegiatan' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_kegiatan'  => $validation->getError('jenis_kegiatan'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $jenis_kegiatan = $this->request->getVar('jenis_kegiatan');

                $data_jk = [
                    'jenis_kegiatan' => $jenis_kegiatan
                ];

                // $this->jenis_kegiatan->post_jenisKegiatan($kode_nik, $kode_token, $jenis_kegiatan);
                $this->jenis_kegiatan->insert($data_jk);

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

                $this->jenis_kegiatan->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Jenis Kegiatan Berhasil Dihapus"
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

            $this->jenis_kegiatan->delete($id);

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
                'list' => $this->jenis_kegiatan->where('id', $id)->get()->getRowArray(),
                'title' => 'Form Edit Jenis Kegiatan PKK'
            ];

            $msg = [
                'sukses' => view('auth/jenis-kegiatan/edit', $data)
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
                'jenis_kegiatan' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_kegiatan'  => $validation->getError('jenis_kegiatan'),
                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();

                $kode_token = $get_token['token'];
                // $kode_token = '494';

                $jenis_kegiatan = $this->request->getVar('jenis_kegiatan');
                $id = $this->request->getVar('id');

                $data_jk = [
                    'jenis_kegiatan' => $jenis_kegiatan
                ];

                // $this->jenis_kegiatan->post_jenisKegiatan($kode_nik, $kode_token, $jenis_kegiatan);
                $this->jenis_kegiatan->update($id, $data_jk);

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
