<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pengumuman;
use App\Models\Model_log;

class ProsesTambahPengumuman extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pengumuman          = new Model_pengumuman();
        $log                 = new Model_log(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $isiPengumuman       = $this->request->getPost('pengumuman');
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'tanggalPengumuman' => date('y-m-d'),
            'pengumuman'        => $isiPengumuman,
        ];
        $pengumuman->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan pengumuman',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pengumuman berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    }

    public function hapusPengumuman($id=null)
    {
        $session                = session();
        $pengumuman             = new Model_pengumuman();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');  
        $data                   = $pengumuman->where('idPengumuman',$id)->findAll();  
        $hapus                  = $pengumuman->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Pengumuman '.$data[0]['pengumuman'],
        ];
        $log->insert($dataLog);    
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "pengumuman berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    } 
}