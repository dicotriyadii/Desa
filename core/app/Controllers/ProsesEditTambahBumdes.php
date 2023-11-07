<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bumdes;
use App\Models\Model_log;

class ProsesEditTambahBumdes extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $anggotaBumdes  = new Model_struktur_bumdes();
        $log            = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $gambar             = $this->request->getFile('gambar');
        $jabatan            = $this->request->getPost('jabatan');
        $nik                = $this->request->getPost('nik');
        $idAnggota      = $this->request->getPost('idAnggotaBumdes');
        $acak           = rand(10,500);
        if(!$gambar ->isValid()){
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
            ];
            $anggotaBumdes->update($idAnggota,$data);
        }else{
            $data = $anggotaBumdes->where('nik',$nik)->findAll();
            $namaFoto       = "PKK_".$nik."_".$acak.".jpg";
            unlink('foto/'.$data[0]['gambar']);   
            $gambar->move('foto/', $namaFoto);
            $data = [
                'namaAnggota'  => $this->request->getPost('nama'),
                'jabatan'      => $this->request->getPost('jabatan'),
                'gambar'       => $namaFoto,
                'keterangan'   => $this->request->getPost('keterangan'),
            ];
        $anggotaBumdes->update($idAnggota,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota BPD ' . $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBumdes');
    }
 
}