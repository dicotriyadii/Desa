<?php

namespace App\Controllers;

use App\Models\Desa_Model;
use App\Models\Kecamatan_Model;
use App\Models\Pemasukan_Keuangan_Model;
use App\Models\Pengeluaran_Keuangan_Model;
use App\Models\Warga_Model;

class Keuangan extends BaseController
{

    protected $pemasukkan_keuangan;
    protected $pengeluaran_keuangan;
    protected $warga;
    protected $data_kecamatan;
    protected $data_desa;

    public function __construct()
    {
        $this->pemasukkan_keuangan = new Pemasukan_Keuangan_Model();
        $this->pengeluaran_keuangan = new Pengeluaran_Keuangan_Model();
        $this->warga = new Warga_Model();
        $this->data_kecamatan = new Kecamatan_Model();
        $this->data_desa = new Desa_Model();
    }

    public function index()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $data = [
            'title' => 'Pemasukan Keuangan - Dashboard Dasa Wisma',
        ];
        return view('auth/pemasukan-keuangan/index', $data);
    }

    public function getdata_pemasukan_keuangan()
    {
        if ($this->request->isAJAX()) {
            // $nik = session()->get('nik');

            $data = [
                'list' => $this->pemasukkan_keuangan->list()
            ];

            $msg = [
                'data' => view('auth/pemasukan-keuangan/list', $data)
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formtambah_pemasukkan_keuangan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Tambah Pemasukan Keuangan'
            ];

            $msg = [
                'data' => view('auth/pemasukan-keuangan/tambah', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function simpan_pemasukan_keuangan()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'sumber_dana_pemasukan' => [
                    'label' => 'Sumber Dana Pemasukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'uraian_pemasukan' => [
                    'label' => 'Uraian Pemasukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nomor_bukti_kas_pemasukan' => [
                    'label' => 'Nomor Bukti Kas Pemasukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah_penerimaan' => [
                    'label' => 'Jumlah Penerimaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl' => [
                    'label' => 'Tanggal Penerimaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'sumber_dana_pemasukan'  => $validation->getError('sumber_dana_pemasukan'),
                        'uraian_pemasukan'    => $validation->getError('uraian_pemasukan'),
                        'nomor_bukti_kas_pemasukan'    => $validation->getError('nomor_bukti_kas_pemasukan'),
                        'jumlah_penerimaan' => $validation->getError('jumlah_penerimaan'),
                        'tgl' => $validation->getError('tgl')
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

                $dasa_wisma = '1';

                $sumber_dana_pemasukan = $this->request->getVar('sumber_dana_pemasukan');
                $uraian_pemasukan = $this->request->getVar('uraian_pemasukan');
                $nomor_bukti_kas_pemasukan = $this->request->getVar('nomor_bukti_kas_pemasukan');
                $jumlah_penerimaan = $this->request->getVar('jumlah_penerimaan');
                $tgl = $this->request->getVar('tgl');

                $this->pemasukkan_keuangan->post_pemasukan_keuangan($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $sumber_dana_pemasukan, $uraian_pemasukan, $nomor_bukti_kas_pemasukan, $jumlah_penerimaan, $tgl);


                $msg = [
                    'sukses' => 'Data Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapusall_pemasukan_keuangan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->pemasukkan_keuangan->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data Pemasukan Keuangan Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapus_pemasukan_keuangan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->pemasukkan_keuangan->delete($id);

            $msg = [
                'sukses' => 'Data Pemasukan Keuangan Berhasil Dihapus'
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function pengeluaran_keuangan()
    {
        if (!session()->get('nik')) {
            return redirect()->to(base_url() . '/loginAdmin');
        }

        $data = [
            'title' => 'Pengeluaran Keuangan - Dashboard Dasa Wisma',
        ];
        return view('auth/pengeluaran-keuangan/index', $data);
    }

    public function getdata_pengeluaran_keuangan()
    {
        if ($this->request->isAJAX()) {
            // $nik = session()->get('nik');

            $data = [
                'list' => $this->pengeluaran_keuangan->list()
            ];

            $msg = [
                'data' => view('auth/pengeluaran-keuangan/list', $data)
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function formtambah_pengeluaran_keuangan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Form Tambah Pengeluaran Keuangan'
            ];

            $msg = [
                'data' => view('auth/pengeluaran-keuangan/tambah', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function simpan_pengeluaran_keuangan()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'sumber_dana_pengeluaran' => [
                    'label' => 'Sumber Dana pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'uraian_pengeluaran' => [
                    'label' => 'Uraian pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'nomor_bukti_kas_pengeluaran' => [
                    'label' => 'Nomor Bukti Kas pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah_pengeluaran' => [
                    'label' => 'Jumlah pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl' => [
                    'label' => 'Tanggal pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'sumber_dana_pengeluaran'  => $validation->getError('sumber_dana_pengeluaran'),
                        'uraian_pengeluaran'    => $validation->getError('uraian_pengeluaran'),
                        'nomor_bukti_kas_pengeluaran'    => $validation->getError('nomor_bukti_kas_pengeluaran'),
                        'jumlah_pengeluaran' => $validation->getError('jumlah_pengeluaran'),
                        'tgl' => $validation->getError('tgl')
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

                $dasa_wisma = '1';

                $sumber_dana_pengeluaran = $this->request->getVar('sumber_dana_pengeluaran');
                $uraian_pengeluaran = $this->request->getVar('uraian_pengeluaran');
                $nomor_bukti_kas_pengeluaran = $this->request->getVar('nomor_bukti_kas_pengeluaran');
                $jumlah_pengeluaran = $this->request->getVar('jumlah_pengeluaran');
                $tgl = $this->request->getVar('tgl');

                $this->pengeluaran_keuangan->post_pengeluaran_keuangan($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $sumber_dana_pengeluaran, $uraian_pengeluaran, $nomor_bukti_kas_pengeluaran, $jumlah_pengeluaran, $tgl);


                $msg = [
                    'sukses' => 'Data Berhasil Disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapusall_pengeluaran_keuangan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');
            $jmldata = count($id);
            for ($i = 0; $i < $jmldata; $i++) {

                $this->pengeluaran_keuangan->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data Pengeluaran Keuangan Berhasil Dihapus"
            ];
            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }

    public function hapus_pengeluaran_keuangan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->pengeluaran_keuangan->delete($id);

            $msg = [
                'sukses' => 'Data Pengeluaran Keuangan Berhasil Dihapus'
            ];

            echo json_encode($msg);
        } else {
            return view('errors/404');
        }
    }
}
