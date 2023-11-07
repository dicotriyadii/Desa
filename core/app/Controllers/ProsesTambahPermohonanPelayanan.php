<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pelayanan;
use App\Models\Model_log;

class ProsesTambahPermohonanPelayanan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $pelayanan          = new Model_pelayanan();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $nama               = $this->request->getPost('nama');   
        $alamat             = $this->request->getPost('alamat');   
        $nomorTelepon       = $this->request->getPost('nomorTelepon');   
        $layanan            = $this->request->getPost('layanan');   
        $keterangan         = $this->request->getPost('keterangan');   
        $data = [
            'kodeKecamatanPelayanan' => $kodeKecamatanLog,
            'kodeDesaPelayanan'      => $kodeDesaLog,
            'tanggalPermohonan'      => date('Y-m-d'),
            'nama'                   => $nama,
            'alamat'                 => $alamat,
            'nomorTelepon'           => $nomorTelepon,
            'jenisLayanan'           => $layanan,
            'keterangan'             => $keterangan,
            'status'                 => "pending"
        ];
        $pelayanan->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => "warga",
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Ada nya permohonan pelayanan atau pelaporan dari '. $nama,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pelaporan dan Pelayanan berhasil di kirim "
        ];
        $session->set($ses_data);
        return redirect()->to(base_url());
    }

    public function hapusPelayanan($id=null)
    {
        $session            = session();
        $pelayanan          = new Model_pelayanan();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $data               = $pelayanan->where('idPelayanan',$id)->findAll();  
        $hapus              = $pelayanan->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Permohonan pelayanan dengan nama '.$data[0]['nama'],
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Permohonan Pelayanan berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/admin');
    }

    public function prosesPelayanan($id=null)
    {
        $session            = session();
        $pelayanan          = new Model_pelayanan();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $data               = $pelayanan->where('idPelayanan',$id)->findAll();  
        $updateData         = [
            'status' => "proses"
        ];
        $updateData         = $pelayanan->update($id,$updateData);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan status permohonan atas nama '.$data[0]['nama'],
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Permohonan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/admin');
    }

    public function selesaiPelayanan($id=null)
    {
        $session            = session();
        $pelayanan          = new Model_pelayanan();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $data               = $pelayanan->where('idPelayanan',$id)->findAll();  
        $updateData         = [
            'status' => "selesai"
        ];
        $updateData         = $pelayanan->update($id,$updateData);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan status permohonan atas nama '.$data[0]['nama'],
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Permohonan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/admin');
    }
 
}