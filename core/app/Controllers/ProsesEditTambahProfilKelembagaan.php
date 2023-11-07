<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_kelembagaan;
use App\Models\Model_log;

class ProsesEditTambahProfilKelembagaan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilKelembagaan   = new Model_profil_Kelembagaan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisLembaga        = $this->request->getPost('jenisLembaga');
        $jumlah              = $this->request->getPost('jumlah');
        $pengurus            = $this->request->getPost('pengurus');
        $kegiatan            = $this->request->getPost('kegiatan');
        $data = [
            'jenisLembaga'  => $jenisLembaga,
            'jumlah'        => $jumlah,
            'pengurus'      => $pengurus,
            'kegiatan'      => $kegiatan
        ];
        $profilKelembagaan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Kelembagaan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Kelembagaan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilKelembagaan');
    }
 
}