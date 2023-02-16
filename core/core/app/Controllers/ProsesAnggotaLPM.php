<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_lpm;
use App\Models\Model_log;

class ProsesAnggotaLPM extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $anggotaLPM             = new Model_struktur_lpm();
        $log                    = new Model_log();
        $cekAnggota             = $anggotaLPM->where('namaAnggota',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKetua            = $anggotaLPM->where('jabatan','Ketua')->countAllResults();
        $jumlahSekretaris       = $anggotaLPM->where('jabatan','Sekretaris')->countAllResults();
        $jumlahBendahara        = $anggotaLPM->where('jabatan','Bendahara')->countAllResults();

        
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
        $foto         = $this->request->getFile('foto');
        // $namaFoto     = str_replace(' ','_',$foto->getName());
        $namaFoto     = "anggotaLPM_".$this->request->getPost('namaAnggota').'.jpg';
        // $path         = $this->request->getFile('foto')->store('foto/',$namaFoto );
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'   => $this->request->getPost('namaAnggota'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'gambar'        => $namaFoto,
            'keterangan'    => $this->request->getPost('keteranganAnggotaLPM'),
        ];
        $anggotaLPM->insert($data);
        
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

    public function hapusAnggotaLPM($id=null)
    {
        $session                = session();
        $anggotaLPM             = new Model_struktur_lpm();
        $log                    = new Model_log();
        $data                   = $anggotaLPM->where('idAnggotaLPM',$id)->findAll();  
        $hapus                  = $anggotaLPM->delete($id);
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
            'keterangan'=> "Anggota LPM berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminLPM');
    }
 
}