<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_permohonan;
use App\Models\Model_log;

class ProsesUploadSurat extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $permohonan     = new Model_permohonan();
        $log            = new Model_log(); 
        $file           = $this->request->getFile('file');
        // $namaFile       = str_replace(' ','_',$file->getName());
        $namaFile       = 'Selesai_'.mt_rand(1,10000)."_".$this->request->getPost('nomorIndukKependudukan')."_".date("Y-d-m")."_".$this->request->getPost('jenisPermohonan').".pdf";
        $validasiData   = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,application/pdf]',
                'max_size[file,210]',
            ],
        ]); 
        if($validasiData == null){
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'   => "Berkas tidak sesuai dengan ketentuan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url()."/adminLayananDesa");
        }
        $file->move('berkasPermohonanSelesai/', $namaFile);
        $data = [
            'status'         => "Selesai",
            'berkas'         => $namaFile,
            'tanggalSelesai' => date("Y-d-m H:i:s")
        ];
        $permohonan->update($this->request->getPost('idPermohonan'),$data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Proses permohonan Selesai',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Permohonan Selesai"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminLayananDesa');
    }
 
}