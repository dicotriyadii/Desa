<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_dusun;
use App\Models\Model_log;

class ProsesTambahDusun extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $dusun          = new Model_dusun();
        $log            = new Model_log();
        $cekDusun       = $dusun->where('namaDusun',$this->request->getPost('namaDusun'))->findAll();        
        if($cekDusun != null){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data dusun',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "dusun sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/formTambahDusun');
        }
        $data = [
            'namaDusun'                 => $this->request->getPost('namaDusun'),
        ];
        $dusun->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah data dusun dengan nama '. $this->request->getPost('namaDusun'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Dusun baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formTambahDusun');
    }

    public function hapusDusun($id=null)
    {
        $session    = session();
        $dusun      = new Model_dusun();
        $log        = new Model_log();
        $dataDusun  = $dusun->where('idDusun',$id)->findAll();  
        $hapus      = $dusun->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data dusun '.$dataDusun[0]['namaDusun'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Dusun berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formTambahDusun');
    }
 
}