<?php

namespace App\Controllers;

use App\Models\DasaWisma_Model;
use App\Models\Dusun_Model;
use App\Models\User_Model;
use App\Models\Warga_Model;
use App\Models\Model_log;

class Users extends BaseController
{

    protected $user;
    protected $warga;
    protected $dasa_wisma;
    protected $data_dusun;
    protected $log;

    public function __construct()
    {
        $this->user = new User_Model();
        $this->warga = new Warga_Model();
        $this->dasa_wisma = new DasaWisma_Model();
        $this->data_dusun = new Dusun_Model();
        $this->log = new Model_log();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $kode_nik = session()->get('nik');
        // $dataWarga      = $this->warga->where('nomorIndukKependudukan', $kode_nik)->findAll();
        $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();
        $nama_jabatan = $kode_dasa_wisma['jabatan'];

        $data = [
            'jabatan' => $nama_jabatan,
            'title' => 'Pengaturan Users - Dashboard Dasa Wisma',
        ];

        // $dataLog_dasawisma = [
        //     'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
        //     'kodeDesa'      => $dataWarga[0]['kodeDesa'],
        //     'nama'          => $dataWarga[0]['namaWarga'],
        //     'waktu'         => date('Y-m-d H:i:s'),
        //     'keterangan'    => 'User Pindah Ke Menu User Dasa Wisma',
        // ];
        // $this->log->insert($dataLog_dasawisma);

        return view('auth/user/index', $data);
    }

    public function getuser()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $dusun = $nama_dusun['kodeDusun'];
            $desa = $nama_dusun['kodeDesa'];
            $kecamatan = $nama_dusun['kodeKecamatan'];

            $kode_dasa_wisma = $this->user->where('nik', $kode_nik)->get()->getRowArray();

            $nama_jabatan = $kode_dasa_wisma['jabatan'];

            $data = [
                'jabatan' => $nama_jabatan,
                'dusun' => $dusun,
                'list' => $this->user->list($desa,$kecamatan)
            ];

            $msg = [
                'data' => view('auth/user/list', $data)
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formuser()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $id_dusun = $nama_dusun['kodeDusun'];
            $id_kecamatan = $nama_dusun['kodeKecamatan'];
            $id_desa = $nama_dusun['kodeDesa'];


            $get_kd_dusun = $this->data_dusun->where('idDusun', $id_dusun)->first();
            $nama_dusun = $get_kd_dusun['namaDusun'];

            $data = [
                'title' => 'Form Tambah Users',
                'nik' => $this->warga->where('kodeDusun', $id_dusun)->where('kodeKecamatan', $id_kecamatan)->where('kodeDesa', $id_desa)->get()->getResultArray(),
                'dasa_wisma' => $this->dasa_wisma->get()->getResultArray(),
                'dusun' => $nama_dusun,
                'kd_dusun' => $id_dusun
            ];

            $msg = [
                'data' => view('auth/user/tambah', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function simpanuser()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nik' => [
                    'label' => 'Nama Anggota',
                    'rules' => 'required|is_unique[tbl_user_dasawisma.nik]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah Ada'
                    ]
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'dasa_wisma_id' => [
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
                        'nik'  => $validation->getError('nik'),
                        'jabatan'  => $validation->getError('jabatan'),
                        'dasa_wisma_id'  => $validation->getError('dasa_wisma_id'),
                        'password'  => $validation->getError('password'),

                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();
                $dataWarga      = $this->warga->where('nomorIndukKependudukan', $kode_nik)->findAll();

                // $kode_token = $get_token['token'];
                $kodeKecamatan = $get_token['kodeKecamatan'];
                $kode_desa = $get_token['kodeDesa'];
                // $kode_token = '494';
                // var_dump($kodeKecamatan);
                // var_dump($kode_desa);
                // dd($get_token);

                $nik = $this->request->getVar('nik');
                $jabatan = $this->request->getVar('jabatan');
                $dasa_wisma_id = $this->request->getVar('dasa_wisma_id');
                // tbl_warga
                $data_password = [

                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

                ];

                $data_anggota = [
                    'kodeKecamatan' => $kodeKecamatan,
                    'kodeDesa' => $kode_desa,
                    'nik' => $nik,
                    'jabatan' => $jabatan,
                    'idDasawisma' => $dasa_wisma_id
                ];

                $get_id_warga = $this->warga->where('nomorIndukKependudukan', $nik)->first();
                $id_warga = $get_id_warga['idWarga'];

                $dataLog_dasawisma = [
                    'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                    'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                    'nama'          => $dataWarga[0]['namaWarga'],
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'User Melakukan Tambah User Baru',
                ];
                $this->log->insert($dataLog_dasawisma);


                // $this->user->post_anggota_pkk($kode_nik, $kode_token, $nik, $jabatan);
                $this->user->insert($data_anggota);

                $this->warga->update($id_warga, $data_password);


                $msg = [
                    'sukses' => 'User Berhasil Disimpan'
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

            $id = $this->request->getVar('idUserDasawisma');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->user->delete($id[$i]);
            }
            $kode_nik = session()->get('nik');
            $dataWarga      = $this->warga->where('nomorIndukKependudukan', $kode_nik)->findAll();
            $dataLog_dasawisma = [
                'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                'nama'          => $dataWarga[0]['namaWarga'],
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'User menghapus Data Semua Anggota/admin',
            ];
            $this->log->insert($dataLog_dasawisma);

            $msg = [
                'sukses' => "$jmldata User Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('idUserDasawisma');

            $this->user->delete($id);

            $kode_nik = session()->get('nik');
            $dataWarga      = $this->warga->where('nomorIndukKependudukan', $kode_nik)->findAll();
            $dataLog_dasawisma = [
                'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                'nama'          => $dataWarga[0]['namaWarga'],
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'User menghapus Data Anggota/admin',
            ];
            $this->log->insert($dataLog_dasawisma);

            $msg = [
                'sukses' => 'Data Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }

    public function formedituser()
    {
        if ($this->request->isAJAX()) {

            $kode_nik = session()->get('nik');
            $nama_dusun = $this->warga->where('nomorIndukKependudukan', $kode_nik)->get()->getRowArray();
            $dusun = $nama_dusun['kodeDusun'];

            $get_kd_dusun = $this->data_dusun->where('idDusun', $dusun)->first();
            $nama_dusun = $get_kd_dusun['namaDusun'];

            $id = $this->request->getVar('idUserDasawisma');

            $data = [
                'list' => $this->user->where('idUserDasawisma', $id)->get()->getRowArray(),
                'title' => 'Form Edit Users',
                'nik' => $this->warga->get()->getResultArray(),
                'dasa_wisma' => $this->dasa_wisma->get()->getResultArray(),
                'dusun' => $nama_dusun,
                'kd_dusun' => $dusun
            ];

            $msg = [
                'sukses' => view('auth/user/edit', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function edituser()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nik' => [
                    'label' => 'Nama Anggota',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'password_konfirmasi' => [
                    'label' => 'Konfirmasi Password',
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'matches' => '{field} Harus sama dengan Password Baru'
                    ]
                ],
                'dasa_wisma_id' => [
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
                        'nik'  => $validation->getError('nik'),
                        'jabatan'  => $validation->getError('jabatan'),
                        'dasa_wisma_id'  => $validation->getError('dasa_wisma_id'),
                        'password'  => $validation->getError('password'),
                        'password_konfirmasi'  => $validation->getError('password_konfirmasi'),

                    ]
                ];
            } else {

                // $kode_nik = '1234567890';


                $kode_nik = session()->get('nik');
                $get_token = $this->warga->where('nomorIndukKependudukan', $kode_nik)->first();
                $dataWarga      = $this->warga->where('nomorIndukKependudukan', $kode_nik)->findAll();

                $kode_token = $get_token['token'];
                // $kode_token = '494';


                $idUserDasawisma = $this->request->getVar('idUserDasawisma');
                $nik = $this->request->getVar('nik');
                $jabatan = $this->request->getVar('jabatan');
                $dasa_wisma_id = $this->request->getVar('dasa_wisma_id');
                // tbl_warga
                $data_password = [

                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

                ];

                $data_anggota = [
                    'nik' => $nik,
                    'jabatan' => $jabatan,
                    'idDasawisma' => $dasa_wisma_id,
                    'gambar' => 'PKK__430.jpg'
                ];

                $get_id_warga = $this->warga->where('nomorIndukKependudukan', $nik)->first();
                $id_warga = $get_id_warga['idWarga'];


                // $this->user->post_anggota_pkk($kode_nik, $kode_token, $nik, $jabatan);
                $this->user->update($idUserDasawisma, $data_anggota);

                $this->warga->update($id_warga, $data_password);
                $dataLog_dasawisma = [
                    'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                    'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                    'nama'          => $dataWarga[0]['namaWarga'],
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'User mengedit Data Anggota/admin',
                ];
                $this->log->insert($dataLog_dasawisma);


                $msg = [
                    'sukses' => 'User Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }
}
