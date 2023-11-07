<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bumdes;
use App\Models\Model_log;

class ProsesTambahBumdes extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $anggotaBumdes          = new Model_struktur_bumdes();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $gambar                 = $this->request->getFile('gambar');
        $jabatan                = $this->request->getPost('jabatan');
        $nik                    = $this->request->getPost('nik');

        $cekAnggota             = $anggotaBumdes->where('namaAnggota',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKetua            = $anggotaBumdes->where('jabatan','Ketua')->countAllResults();
        $jumlahSekretaris       = $anggotaBumdes->where('jabatan','Sekretaris')->countAllResults();
        $jumlahBendahara        = $anggotaBumdes->where('jabatan','Bendahara')->countAllResults();

        
        if($jumlahKetua > 1 || $jumlahSekretaris > 1 ||  $jumlahBendahara > 1){
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data anggota baru',
            ]; 
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Posisi sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminBumdes');
        }
        
        if($cekAnggota != null){
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data anggota baru',
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Anggota sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminBumdes');
        }
        $acak = rand(10,500);
        $namaGambar     = "BUMDES_".$this->request->getPost('namaGambar')."_".$acak.".jpg";
        $gambar->move('foto/', $namaGambar);
        $data = [
            'nik'           => $nik,
            'jabatan'       => $jabatan,
            'gambar'        => $namaGambar,
        ];
        $anggotaBumdes->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota PKK baru dengan nama '. $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Anggota baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBumdes');
    }

    public function hapusAnggotaBumdes($id=null)
    {
        $session                = session();
        $anggotaBumdes          = new Model_struktur_bumdes();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $data                   = $anggotaBumdes->where('idAnggotaBumdes',$id)->findAll();  
        $hapus                  = $anggotaBumdes->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota Bumdes dengan nomor '.$data[0]['nik'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('foto/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Anggota Bumdes berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBumdes');
    }
 
}