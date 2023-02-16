<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_catatanKeluarga;
use App\Models\Model_dasawisma;
 
class CatatanKeluarga extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga              = new Model_warga();
        $catatanKeluarga    = new Model_catatanKeluarga();
        $dasawisma          = new Model_dasawisma();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $kodeKecamatan      = $this->request->getVar('kodeKecamatan');
        $kodeDesa           = $this->request->getVar('kodeDesa');
        $nikWarga           = $this->request->getVar('nikWarga');
        $berkebutuhanKhusus = $this->request->getVar('berkebutuhanKhusus');
        $kriteriaRumahId    = $this->request->getVar('kriteriaRumahId');
        $sumberAirId        = $this->request->getVar('sumberAirId');
        $tempatSampahId     = $this->request->getVar('tempatSampahId');
        $jenisKegiatanId    = $this->request->getVar('jenisKegiatanId');
        $namaKegiatan       = $this->request->getVar('namaKegiatan');
        $makananPokokId     = $this->request->getVar('makananPokokId');
        $keterangan         = $this->request->getVar('keterangan');
        $tgl                = $this->request->getVar('tgl');
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
            return $this->respond($response);          
        }else{
            // Proses Data
            $cekKeluarga = $catatanKeluarga->where('nik',$nik)->findAll();
            $dataKode = [
                'kode_kecamatan' => $cekTokenWarga[0]['kodeKecamatan'],
                'kode_desa' => $cekTokenWarga[0]['kodeDesa'],
            ];
            $cekKodeDasawisma = $dasawisma->where($dataKode)->findAll();
            if($cekKeluarga != null) {
              $response = [
                'status'    => 400,
                'messages'  => "Nomor Induk Kependudukan Sudah terdaftar"
            ];  
            return $this->respond($response);  
            }
            $data = [
                'kode_kecamatan'        => $cekTokenWarga[0]['kodeKecamatan'],
                'kode_desa'             => $cekTokenWarga[0]['kodeDesa'],
                'kode_dasa_wisma'       => $cekKodeDasawisma[0]['id'],
                'nik'                   => $nikWarga,
                'berkebutuhan_khusus'   => $berkebutuhanKhusus,
                'kriteria_rumah'        => $kriteriaRumahId,
                'sumber_air'            => $sumberAirId,
                'tempat_sampah'         => $tempatSampahId,
                'jenis_kegiatan_id'     => $jenisKegiatanId,
                'nama_kegiatan'         => $namaKegiatan,
                'makanan_pokok'         => $makananPokokId,
                'keterangan'            => $keterangan,
                'tgl'                   => $tgl,
            ];
            $catatanKeluarga->insert($data);
            $response = $data;
            return $this->respond($response);    
        }  
    }
}