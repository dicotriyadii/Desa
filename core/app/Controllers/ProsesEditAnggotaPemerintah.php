<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_log;

class ProsesEditAnggotaPemerintah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $pengguna       = new Model_struktur_pemerintah_desa();
        $log            = new Model_log();
        $idUser         = $this->request->getPost('idAnggotaPemerintah');
        $acak           = rand(10,500);
        $foto           = $this->request->getFile('foto');
        if(!$foto ->isValid()){
            $data = [
                'namaAnggota'  => $this->request->getPost('namaAnggota'),
                'jabatan'      => $this->request->getPost('jabatan'),
                'keterangan'   => $this->request->getPost('keteranganAnggotaPemerintah'),
            ];
            $pengguna->update($idUser,$data);        
        }else{
            $namaFoto       = "Pemerintah_".$this->request->getPost('namaAnggota')."_".$acak.".jpg";
            unlink('foto/'.$data[0]['gambar']);   
            $foto->move('foto/', $namaFoto);
            $data = [
                'namaAnggota'  => $this->request->getPost('namaAnggota'),
                'jabatan'      => $this->request->getPost('jabatan'),
                'gambar'       => $namaFoto,
                'keterangan'   => $this->request->getPost('keteranganAnggotaPemerintah'),
            ];
            $pengguna->update($idUser,$data);
        }

        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota Pemerintah ' . $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemerintahDesa');
    }
 
}