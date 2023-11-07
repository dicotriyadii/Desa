<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_dasawisma;
use App\Models\Model_log;

class ProsesTambahDasawisma extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $dasawisma          = new Model_dasawisma();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $namaDasawisma      = $this->request->getPost('namaDasaWisma');
        $RT                 = $this->request->getPost('RT');
        $RW                 = $this->request->getPost('RW');
        $kodeDusun          = $this->request->getPost('kodeDusun');
        $cekDasawisma       = $dasawisma->where('nama_dasa_wisma',$namaDasawisma)->findAll();  
        if($cekDasawisma != null){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data dasawisma',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "dasawisma sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminDasawisma');
        }
        $data = [
            'kode_kecamatan'     => $kodeKecamatanLog,
            'kode_desa'          => $kodeDesaLog,
            'kode_dusun'         => $kodeDusun,
            'RT'                 => $RT,
            'RW'                 => $RW,
            'nama_dasa_wisma'    => $namaDasawisma,
        ];
        $dasawisma->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah data dasawisma dengan nama '. $namaDasawisma,
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Dasawisma baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDasawisma');
    }

    public function hapusDasawisma($id=null)
    {
        $session        = session();
        $dasawisma      = new Model_dasawisma();
        $log            = new Model_log();
        $dataDasawisma  = $dasawisma->where('id',$id)->findAll();  
        $hapus          = $dasawisma->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data dasawisma '.$dataDasawisma[0]['nama_dasa_wisma'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Dasawisma berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDasawisma');
    }
 
}