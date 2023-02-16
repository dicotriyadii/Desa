<?php

namespace App\Controllers;


use App\Models\Inventaris_Model;
use App\Models\Kecamatan_Model;
use App\Models\Warga_Model;
use App\Models\DasaWisma_Model;
use App\Models\Desa_Model;

class Inventaris extends BaseController
{

    protected $dasa_wisma;
    protected $warga;
    protected $data_kecamatan;
    protected $data_desa;
    protected $inventaris;

    public function __construct()
    {
        $this->inventaris = new Inventaris_Model();
        $this->dasa_wisma = new DasaWisma_Model();
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
            'title' => 'Inventaris - Dashboard Dasa Wisma',
        ];
        return view('auth/inventaris/index', $data);
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {
            // $nik = session()->get('nik');

            $data = [
                'list' => $this->inventaris->list()
            ];

            $msg = [
                'data' => view('auth/inventaris/list', $data)
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
                'title' => 'Form Tambah Inventaris'
            ];

            $msg = [
                'data' => view('auth/inventaris/tambah', $data)
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
                'nama_barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'asal_barang' => [
                    'label' => 'Asal Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl' => [
                    'label' => 'Tanggal Penerimaan / Pembelian',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah' => [
                    'label' => 'Jumlah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tempat_penyimpanan' => [
                    'label' => 'Tempat Penyimpanan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'kondisi_barang' => [
                    'label' => 'Kondisi Barang',
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
                        'nama_barang'  => $validation->getError('nama_barang'),
                        'asal_barang'    => $validation->getError('asal_barang'),
                        'tgl'    => $validation->getError('tgl'),
                        'jumlah' => $validation->getError('jumlah'),
                        'tempat_penyimpanan' => $validation->getError('tempat_penyimpanan'),
                        'kondisi_barang' => $validation->getError('kondisi_barang'),
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

                $dasa_wisma = 'dmsakda';

                $nama_barang = $this->request->getVar('nama_barang');
                $asal_barang = $this->request->getVar('asal_barang');
                $tgl = $this->request->getVar('tgl');
                $jumlah = $this->request->getVar('jumlah');
                $tempat_penyimpanan = $this->request->getVar('tempat_penyimpanan');
                $kondisi_barang = $this->request->getVar('kondisi_barang');
                $keterangan = $this->request->getVar('keterangan');

                $data = $this->inventaris->post_inventaris($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $nama_barang, $asal_barang, $tgl, $jumlah, $tempat_penyimpanan, $kondisi_barang, $keterangan);


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

                $this->inventaris->delete($id[$i]);
            }

            $msg = [
                'sukses' => "$jmldata Data Inventaris Berhasil Dihapus"
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

            $this->inventaris->delete($id);

            $msg = [
                'sukses' => 'Data Inventaris Berhasil Dihapus'
            ];

            echo json_encode($msg);
        }
    }
}
