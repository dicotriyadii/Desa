<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bpd;
use App\Models\Model_log;

class ProsesAnggotaBPD extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $anggotaBPD             = new Model_struktur_bpd();
        $log                    = new Model_log();
        $cekAnggota             = $anggotaBPD->where('namaAnggota',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKetua            = $anggotaBPD->where('jabatan','Ketua')->countAllResults();
        $jumlahSekretaris       = $anggotaBPD->where('jabatan','Sekretaris')->countAllResults();
        $jumlahBendahara        = $anggotaBPD->where('jabatan','Bendahara')->countAllResults();

        
        if($jumlahKetua > 1 || $jumlahSekretaris > 1 ||  $jumlahBendahara > 1){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data anggota baru',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Posisi sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/formAnggotaLPM');
        }
        
        if($cekAnggota != null){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data anggota baru',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Anggota sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/formAnggotaLPM');
        }
        $acak = rand(10,500);
        $foto         = $this->request->getFile('foto');
        $namaFoto     = "BPD_".$this->request->getPost('namaAnggota')."_".$acak.".jpg";
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'   => $this->request->getPost('namaAnggota'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'gambar'        => $namaFoto,
            'keterangan'    => $this->request->getPost('keterangan'),
        ];
        $anggotaBPD->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota PKK baru dengan nama '. $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Anggota baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBPD');
    }

    public function hapusAnggotaBPD($id=null)
    {
        $session                = session();
        $anggotaBPD             = new Model_struktur_bpd();
        $log                    = new Model_log();
        $data                   = $anggotaBPD->where('idAnggotaBPD',$id)->findAll();  
        $hapus                  = $anggotaBPD->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota LPM dengan nama '.$data[0]['namaAnggota'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('foto/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Anggota BPD berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBPD');
    }
 
}