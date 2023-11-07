<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_permohonan_informasi;
use App\Models\Model_log;

class ProsesTambahPermohonanInformasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $permohonanInformasi    = new Model_permohonan_informasi();
        $log                    = new Model_log(); 
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');           
        $nikPemohon             = $this->request->getPost('nikPemohon');
        $namaPemohon            = $this->request->getPost('namaPemohon');
        $alamatPemohon          = $this->request->getPost('alamatPemohon');
        $pekerjaanPemohon       = $this->request->getPost('pekerjaanPemohon');
        $nomorTeleponPemohon    = $this->request->getPost('nomorTeleponPemohon');
        $emailPemohon           = $this->request->getPost('emailPemohon');
        $informasiPengajuan     = $this->request->getPost('informasiPengajuan');
        $alasanPengajuan        = $this->request->getPost('alasanPengajuan');
        $data = [
            'kodeKecamatan'         => $kodeKecamatanLog,
            'kodeDesa'              => $kodeDesaLog,
            'nikPemohon'            => $nikPemohon,
            'namaPemohon'           => $namaPemohon,
            'alamatPemohon'         => $alamatPemohon,
            'pekerjaanPemohon'      => $pekerjaanPemohon,
            'nomorTeleponPemohon'   => $nomorTeleponPemohon,
            'emailPemohon'          => $emailPemohon,
            'informasiPengajuan'    => $informasiPengajuan,
            'alasanPengajuan'       => $alasanPengajuan,
            'namaPemohon'           => $namaPemohon,
        ];
        $permohonanInformasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan permohonan informasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "permohonan informasi berhasil di tambah"
        ];
        $session->set($ses_data);
        // return redirect()->to(base_url().'/adminPermohonanInformasi');
        return redirect()->back();
    }

    public function hapusPermohonanInformasi($id=null)
    {
        $session                = session();
        $permohonanInformasi    = new Model_permohonan_informasi();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');  
        $data                   = $permohonanInformasi->where('idPermohonanInformasi',$id)->findAll();  
        $hapus                  = $permohonanInformasi->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Permohonan Informasi '.$data[0]['nikPemohon'],
        ];
        $log->insert($dataLog);    
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Permohonan Informasi berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPermohonanInformasi');
    } 
}