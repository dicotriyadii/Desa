<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_catatanStatusIbu;
use App\Models\Model_catatanKelahiran;
use App\Models\Model_catatanKematian;
use App\Models\Model_dasawisma;
 
class CatatanStatusIbu extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga              = new Model_warga();
        $catatanStatusIbu   = new Model_catatanStatusIbu();
        $catatanKelahiran   = new Model_catatanKelahiran();
        $catatanKematian    = new Model_catatanKematian();
        $dasawisma          = new Model_dasawisma();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $kodeKecamatan      = $this->request->getVar('kodeKecamatan');
        $kodeDesa           = $this->request->getVar('kodeDesa');
        $tgl                = $this->request->getVar('tgl');
        $nikIbu             = $this->request->getVar('nikIbu');
        $namaSuami          = $this->request->getVar('namaSuami');
        $status             = $this->request->getVar('status');
        $namaBayi           = $this->request->getVar('namaBayi');
        $jenisKelamin       = $this->request->getVar('jenisKelamin');
        $tglLahir           = $this->request->getVar('tglLahir');
        $akte               = $this->request->getVar('akte');
        $tglMeninggal       = $this->request->getVar('tglMeninggal');
        $sebabMeninggal     = $this->request->getVar('sebabMeninggal');
        $keterangan         = $this->request->getVar('keterangan');
        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $nik,
            'token' => $token
        ];
        $cekTokenWarga  = $warga->where($dataValidasi)->findAll();
        if($cekTokenWarga == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response,400);
        }else{
            // Proses Data
            $cekDataWarga = $warga->where('nomorIndukKependudukan',$nikIbu)->findAll();
            $dataKode = [
                'kode_kecamatan' => $cekDataWarga[0]['kodeKecamatan'],
                'kode_desa' => $cekDataWarga[0]['kodeDesa'],
            ];
            $cekKodeDasawisma = $dasawisma->where($dataKode)->findAll();

            if($cekDataWarga == null){
                $response []= [
                    'status'    => 400,
                    'messages'  => "Data Ibu Tidak di temukan di sistem"
                ];  
                return $this->respond($response,400);   
            }
            $data = [
                'kode_kecamatan'    => $cekDataWarga[0]['kodeKecamatan'],
                'kode_desa'         => $cekDataWarga[0]['kodeDesa'],
                'kode_dasa_wisma'   => $cekKodeDasawisma[0]['id'],
                'tgl'               => $tgl,
                'nik_ibu'           => $nikIbu,
                'nama_ibu'          => $cekDataWarga[0]['namaWarga'],
                'nama_suami'        => $namaSuami,
                'status'            => $status,
            ];
            $catatanStatusIbu->insert($data);
            if(strtolower($status) == 'lahir'){ 
                $filterStatus = [
                    'nik_ibu' => $nikIbu,
                    'status'  => 'lahir'
                ];
                $dataStatusIbu = $catatanStatusIbu->where($filterStatus)->orderBy('id','DESC')->findAll(); 
                $cekDataLahir = $catatanKelahiran->where('akte',$akte)->findAll();
                if($cekDataLahir != null){
                    $catatanStatusIbu->delete($dataStatusIbu[0]['id']);
                    $response [] = [
                        'status'    => 400,
                        'messages'  => "Data Anak / Akte sudah terdaftar"
                    ];  
                    return $this->respond($response,400);
                }
                $dataLahir = [
                    'catatan_status_ibu_id' => $dataStatusIbu[0]['id'],
                    'catatan_status_ibu'    => $status,
                    'nama_bayi'             => $namaBayi,
                    'jenis_kelamin'         => $jenisKelamin,
                    'tgl_lahir'             => $tglLahir,
                    'akte'                  => $akte,
                ];
                $catatanKelahiran->insert($dataLahir);
                $response = [
                    'status'    => 200,
                    'messages'  => "Data berhasil di tambah"
                ];
            }else if(strtolower($status) == 'mati'){
                $filterStatus = [
                    'nik_ibu' => $nikIbu,
                    'status'  => 'mati'
                ];
                $dataStatusIbu = $catatanStatusIbu->where($filterStatus)->orderBy('id','DESC')->findAll(); 
                $dataMati = [
                    'catatan_status_ibu_id'         => $dataStatusIbu[0]['id'],
                    'catatan_status_ibu_meninggal'  => $status,
                    'nama_bayi_meninggal'           => $namaBayi,
                    'jenis_kelamin_meninggal'       => $jenisKelamin,
                    'tgl_meninggal'                 => $tglMeninggal,
                    'sebab_meninggal'               => $sebabMeninggal,
                    'keterangan_meninggal'          => $keterangan,
                ];
                $catatanKematian->insert($dataMati);
                $response = [
                    'status'    => 200,
                    'messages'  => "Data berhasil di tambah"
                ]; 
            }
            return $this->respond($response);    
        }  
    }
}