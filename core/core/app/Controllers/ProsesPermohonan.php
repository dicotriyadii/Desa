<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_permohonan;
use App\Models\Model_log;

class ProsesPermohonan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $permohonan     = new Model_permohonan();
        $log            = new Model_log(); 
        $file           = $this->request->getFile('file');
        // $namaFile       = str_replace(' ','_',$file->getName());
        $namaFile       = mt_rand(1,10000)."_".$session->get('nik')."_".date("Y-d-m")."_".$this->request->getPost('jenisPermohonan').".pdf";
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
            return redirect()->to(base_url()."/permohonanSurat");
        }
        $file->move('berkasPermohonan/', $namaFile);
        $data = [
            'jenisPermohonan'           => $this->request->getPost('jenisPermohonan'),
            'nomorIndukKependudukan'    => $session->get('nik'),
            'berkasPemohon'             => $namaFile,
            'keterangan'                => $this->request->getPost('keterangan'),
            'status'                    => "Belum Proses",
            'berkas'                    => "",
            'tanggalPermohonan'         => date("Y-d-m H:i:s"),
            'tanggalSelesao'            => "0000-00-00"
        ];
        $permohonan->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Proses permohonan',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Permohonan berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/permohonanSurat');
    }
 
}