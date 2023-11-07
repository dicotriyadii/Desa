<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bpd;
use App\Models\Model_log;

class ProsesTambahBPD extends ResourceController
{
    use ResponseTrait;

    public function create() 
    {
        $session                = session();
        $anggotaBPD             = new Model_struktur_bpd();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $gambar                 = $this->request->getFile('gambar');
        $jabatan                = $this->request->getPost('jabatan');
        $nik                    = $this->request->getPost('nik');
        // validasi file
        $validationRule = [
            'gambar' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[gambar]',
                    'is_image[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[gambar,5120]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data jpg/jpeg"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminBPD');    
        }
        $cekAnggota             = $anggotaBPD->where('nik',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKetua            = $anggotaBPD->where('jabatan','Ketua')->countAllResults();
        $jumlahSekretaris       = $anggotaBPD->where('jabatan','Sekretaris')->countAllResults();
        $jumlahBendahara        = $anggotaBPD->where('jabatan','Bendahara')->countAllResults();

        
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
            return redirect()->to(base_url().'/adminBPD');
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
            return redirect()->to(base_url().'/adminLPM');
        }
        $acak = rand(10,500);
        $namaGambar     = "BPD_".$nik."_".$acak.".jpg";
        $gambar->move('foto/', $namaGambar);
        $data = [
            'nik'           => $nik,
            'jabatan'       => $jabatan,
            'gambar'        => $namaGambar,
        ];
        $anggotaBPD->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota PKK baru dengan nomor'. $nik,
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
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $data                   = $anggotaBPD->where('idAnggotaBPD',$id)->findAll();  
        $hapus                  = $anggotaBPD->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota LPM dengan nomor '.$data[0]['nik'],
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