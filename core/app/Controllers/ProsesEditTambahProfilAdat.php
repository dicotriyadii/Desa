<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_Adat;
use App\Models\Model_log;

class ProsesEditTambahProfilAdat extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilAdat          = new Model_profil_adat();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisLembagaAdat    = $this->request->getPost('jenisLembaga');
        $status              = $this->request->getPost('status');
        $data = [
            'jenisLembagaAdat'  => $jenisLembagaAdat,
            'status'            => $status,
        ];
        $profilAdat->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Adat',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Adat berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilKelembagaan');
    }
 
}