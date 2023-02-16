<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_strukturPKK;
use App\Models\Model_log;

class ProsesAnggotaPKK extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $anggotaPKK             = new Model_strukturPKK();
        $log                    = new Model_log();
        $cekAnggota             = $anggotaPKK->where('namaAnggota',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKetua            = $anggotaPKK->where('jabatan','Ketua')->countAllResults();
        $jumlahWakilKetua       = $anggotaPKK->where('jabatan','Wakil Ketua')->countAllResults();
        $jumlahSekretaris       = $anggotaPKK->where('jabatan','Sekretaris')->countAllResults();
        $jumlahWakilSekretaris  = $anggotaPKK->where('jabatan','Wakil Sekretaris')->countAllResults();
        $jumlahBendahara        = $anggotaPKK->where('jabatan','Bendahara')->countAllResults();
        $jumlahWakilBendahara   = $anggotaPKK->where('jabatan','Wakil Bendahara')->countAllResults();
        $jumlahKetuaPokjaI      = $anggotaPKK->where('jabatan','Ketua Pokja I')->countAllResults();
        $jumlahKetuaPokjaII     = $anggotaPKK->where('jabatan','Ketua Pokja II')->countAllResults();
        $jumlahKetuaPokjaIII    = $anggotaPKK->where('jabatan','Ketua Pokja III')->countAllResults();
        $jumlahKetuaPokjaIV     = $anggotaPKK->where('jabatan','Ketua Pokja IV')->countAllResults();

        
        if($jumlahKetua > 1 || $jumlahWakilKetua > 1 || $jumlahSekretaris > 1 || $jumlahWakilSekretaris > 1 || $jumlahBendahara > 1 || $jumlahWakilBendahara > 1 || $jumlahKetuaPokjaI > 1 || $jumlahKetuaPokjaII > 1 || $jumlahKetuaPokjaIII > 1|| $jumlahKetuaPokjaIV > 1 ){
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
            return redirect()->to(base_url().'/formAnggotaPKK');
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
            return redirect()->to(base_url().'/formAnggotaPKK');
        }
        $acak         = rand(10,500);
        $foto         = $this->request->getFile('foto');
        $namaFoto     = "PKK_".$this->request->getPost('namaAnggota')."_".$acak.".jpg";
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'   => $this->request->getPost('namaAnggota'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'gambar'        => $namaFoto,
            'keterangan'    => $this->request->getPost('keteranganAnggotaPKK'),
        ];
        $anggotaPKK->insert($data);
        
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
        return redirect()->to(base_url().'/formAnggotaPKK');
    }

    public function hapusAnggotaPKK($id=null)
    {
        $session                = session();
        $anggotaPKK      = new Model_strukturPKK();
        $log                    = new Model_log();
        $data                   = $anggotaPKK->where('idAnggotaPKK',$id)->findAll();  
        $hapus                  = $anggotaPKK->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota PKK dengan nama '.$data[0]['namaAnggota'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('foto/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Anggota PKK berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPKK');
    }
 
}