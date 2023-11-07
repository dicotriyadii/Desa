<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;
use App\Models\Model_data;
use App\Models\Model_struktur_pemerintah_desa;

use App\Models\User_Model;

class ProsesLogin extends ResourceController
{
    use ResponseTrait;
    public function create()
    {
        // inisialisasi variable
        $session    = session();
        $ses_data = [
            'kodeKecamatan' => "120715",
            'kodeDesa'      => "1207242008",
        ];
        $session->set($ses_data);
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $log                 = new Model_log();
        $data                = new Model_data();
        $warga               = new Model_warga();
        $user_dasawisma      = new User_Model();
        $pemerintahDesa      = new Model_struktur_pemerintah_desa();
        $nik                 = $this->request->getPost('nik');
        $password            = $this->request->getPost('password');
        // Pengecekan Desa
        $dataWarga      = $warga->where('nomorIndukKependudukan', $nik)->findAll();
        $dataDesa       = $data->getDesa($kodeKecamatanLog,$kodeDesaLog);
        // if($dataWarga[0]['kodeDesa'] != $kodeDesaLog && $dataWarga[0]['kodeKecamatan'] != $kodeKecamatanLog){
        //     $ses_data = [
        //         'statusTambah'  => "Gagal",
        //         'keterangan'    => "Akun tidak terdaftar pada sistem Desa ".$dataDesa[0]['namaDesa']
        //     ];
        //     $session->set($ses_data);
        //     return redirect()->to(base_url() . '/loginAdmin');
        // }
        // Masuk Sebagai Anggota PKK / DASAWISMA
        $cekUserDasawisma = $user_dasawisma->where('nik',$nik)->get()->getRowArray();
        if ($cekUserDasawisma != null) {
            $dataWarga      = $warga->where('nomorIndukKependudukan', $nik)->findAll();
            $cekPassword    = password_verify($password, $dataWarga[0]['password']);
            if ($cekPassword == false) {
                $ses_data = [
                    'statusTambah'  => "Gagal",
                    'keterangan'    => "Password salah, silahkan coba lagi"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/loginAdmin');
            } else {
                $ses_data = [
                    'nik' => $nik
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/dasaWisma');
            }
        }
        $cekPerangkatDesa = $pemerintahDesa->where('nik',$nik)->findAll();
        if ($cekPerangkatDesa != null) {
            $dataWarga     = $warga->where('nomorIndukKependudukan',$nik)->findAll();
            $cekPassword   = password_verify($password, $dataWarga[0]['password']);
            if ($cekPassword != false) {
                $dataLog = [
                    'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                    'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                    'nama'          => $dataWarga[0]['namaWarga'],
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'Login Akun',
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'kodeKecamatan' => $dataWarga[0]['kodeKecamatan'],
                    'kodeDesa'      => $dataWarga[0]['kodeDesa'],
                    'nama'          => $dataWarga[0]['namaWarga'],
                    'jabatan'       => $cekPerangkatDesa[0]['jabatan'],
                    'status'        => "login",
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/admin');
            }else{
                $ses_data = [
                    'statusTambah'  => "Gagal",
                    'keterangan'    => "Password salah, silahkan coba lagi"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/loginAdmin');
            }
        } else {
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Nomor induk kependudukan tidak terdaftar di sistem desa digital"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url() . '/loginAdmin');
        }
    }
}
