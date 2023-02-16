<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_lpm;
use App\Models\Model_log;

class ProsesEditAnggotaLPM extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $anggotaLPM     = new Model_struktur_lpm();
        $data           = $anggotaLPM->getStrukturLPM();
        $log            = new Model_log();
        $idAnggota      = $this->request->getPost('idAnggotaLPM');
        $foto           = $this->request->getFile('foto');
        $namaFoto       = "anggotaLPM_".$this->request->getPost('namaAnggota').'.jpg';
        unlink('foto/'.$data[0]['gambar']);   
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'  => $this->request->getPost('namaAnggota'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'keterangan'   => $this->request->getPost('keteranganAnggotaLPM'),
        ];
        $anggotaLPM->update($idAnggota,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota LPM ' . $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminLPM');
    }
 
}