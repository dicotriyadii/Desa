<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_strukturPKK;
use App\Models\Model_log;

class ProsesEditAnggotaPKK extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $anggotaPKK     = new Model_strukturPKK();
        $data           = $anggotaPKK->getStrukturPKK();
        $log            = new Model_log();
        $idAnggota      = $this->request->getPost('idAnggotaPKK');
        $foto           = $this->request->getFile('foto');
        $namaFoto       = "anggotaPKK_".$this->request->getPost('namaAnggota').'.jpg';
        unlink('foto/'.$data[0]['gambar']);   
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'  => $this->request->getPost('namaAnggota'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'gambar'        => $namaFoto,
            'keterangan'   => $this->request->getPost('keteranganAnggotaPKK'),
        ];
        $anggotaPKK->update($idAnggota,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota PKK ' . $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPKK');
    }
 
}