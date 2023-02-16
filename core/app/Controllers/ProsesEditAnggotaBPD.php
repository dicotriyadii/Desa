<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bpd;
use App\Models\Model_log;

class ProsesEditAnggotaBPD extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $anggotaBPD     = new Model_struktur_bpd();
        $data           = $anggotaBPD->getStrukturBPD();
        $log            = new Model_log();
        $foto           = $this->request->getFile('foto');
        $idAnggota      = $this->request->getPost('idAnggotaPKK');
        $acak           = rand(10,500);
        if(!$foto ->isValid()){
            $data = [
                'namaAnggota'  => $this->request->getPost('nama'),
                'jabatan'      => $this->request->getPost('jabatan'),
                'keterangan'   => $this->request->getPost('keterangan'),
            ];
            $anggotaBPD->update($idAnggota,$data);
        }else{
            $foto           = $this->request->getFile('foto');
            $namaFoto       = "PKK_".$this->request->getPost('namaAnggota')."_".$acak.".jpg";
            unlink('foto/'.$data[0]['gambar']);   
            $foto->move('foto/', $namaFoto);
            $data = [
                'namaAnggota'  => $this->request->getPost('nama'),
                'jabatan'      => $this->request->getPost('jabatan'),
                'gambar'       => $namaFoto,
                'keterangan'   => $this->request->getPost('keterangan'),
            ];
        $anggotaBPD->update($idAnggota,$data);
        }
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota BPD ' . $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBPD');
    }
 
}