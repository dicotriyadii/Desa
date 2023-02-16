<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;

class ProsesEditwarga extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $warga      = new Model_warga();
        $log        = new Model_log();
        $idWarga    = $this->request->getPost('idWarga');
        $tahunSaatIni   = date('Y');
        $umur = $tahunSaatIni - date('Y',strtotime($this->request->getPost('tanggalLahir')));
        $data = [
            'nomorKartuKeluarga'        => $this->request->getPost('nomorKK'),
            'nomorIndukKependudukan'    => $this->request->getPost('noKTP'),
            'namaWarga'                 => $this->request->getPost('namaWarga'),
            'tanggalLahir'              => $this->request->getPost('tanggalLahir'),
            'jenisKelamin'              => $this->request->getPost('jenisKelamin'),            
            'golDarah'                  => $this->request->getPost('golDarah'),            
            'agama'                     => $this->request->getPost('agama'),
            'statusKawin'               => $this->request->getPost('statusKawin'),
            'pendidikanTerakhir'        => $this->request->getPost('pendidikanTerakhir'),
            'pendidikanDitempuh'        => $this->request->getPost('statusPendidikan'),
            'pekerjaan'                 => $this->request->getPost('pekerjaan'),
            'statusKeluarga'            => $this->request->getPost('statusKeluarga'),
            'alamat'                    => $this->request->getPost('alamat'),
            'umur'                      => $umur,
            'RT'                        => $this->request->getPost('RT'),
            'RW'                        => $this->request->getPost('RW'),
            'dusun'                     => $this->request->getPost('dusun'),
            'desa'                      => $this->request->getPost('desa'),
            'kecamatan'                 => $this->request->getPost('kecamatan'),
            'status'                    => $this->request->getPost('status'),
            'bpjs'                      => $this->request->getPost('bpjs'),
            'penghasilan'               => $this->request->getPost('penghasilan'),
        ];
        $warga->update($idWarga,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Warga ' . $this->request->getPost('namaWarga'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Data Warga berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminWargaNegara');
    }
 
}