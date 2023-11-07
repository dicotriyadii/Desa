<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_strukturPKK;
use App\Models\User_Model;
use App\Models\Model_userDasawisma;
use App\Models\Model_log;
use App\Models\Model_warga;

class ProsesTambahPKK extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        // inisialisasi
        $session                = session();
        $anggotaPKK             = new Model_strukturPKK();
        $dasawwisma             = new User_Model();
        $log                    = new Model_log();
        $warga                  = new Model_warga();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $gambar                 = $this->request->getFile('gambar');
        $jabatan                = $this->request->getPost('jabatan');
        $nik                    = $this->request->getPost('nik');
        $kodeDasawisma          = $this->request->getPost('kodeDasawisma');
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
            return redirect()->to(base_url().'/adminPKK');    
        }
        // validasi
        // $cekDusun               = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        // $cekAnggota             = $anggotaPKK->where('nik',$nik)->findAll();
        // $jumlahKetua            = $anggotaPKK->where('jabatan','Ketua')->countAllResults();
        // $jumlahWakilKetua       = $anggotaPKK->where('jabatan','Wakil Ketua')->countAllResults();
        // $jumlahSekretaris       = $anggotaPKK->where('jabatan','Sekretaris')->countAllResults();
        // $jumlahWakilSekretaris  = $anggotaPKK->where('jabatan','Wakil Sekretaris')->countAllResults();
        // $jumlahBendahara        = $anggotaPKK->where('jabatan','Bendahara')->countAllResults();
        // $jumlahWakilBendahara   = $anggotaPKK->where('jabatan','Wakil Bendahara')->countAllResults();
        // $jumlahKetuaPokjaI      = $anggotaPKK->where('jabatan','Ketua Pokja I')->countAllResults();
        // $jumlahKetuaPokjaII     = $anggotaPKK->where('jabatan','Ketua Pokja II')->countAllResults();
        // $jumlahKetuaPokjaIII    = $anggotaPKK->where('jabatan','Ketua Pokja III')->countAllResults();
        // $jumlahKetuaPokjaIV     = $anggotaPKK->where('jabatan','Ketua Pokja IV')->countAllResults();

        // if($jumlahKetua > 1 || $jumlahWakilKetua > 1 || $jumlahSekretaris > 1 || $jumlahWakilSekretaris > 1 || $jumlahBendahara > 1 || $jumlahWakilBendahara > 1 || $jumlahKetuaPokjaI > 1 || $jumlahKetuaPokjaII > 1 || $jumlahKetuaPokjaIII > 1|| $jumlahKetuaPokjaIV > 1 ){
        //     $dataLog = [
        //         'kodeKecamatan' => $kodeKecamatanLog,
        //         'kodeDesa'      => $kodeDesaLog,
        //         'nama'          => $usernameLog,
        //         'waktu'         => date('Y-m-d H:i:s'),
        //         'keterangan'    => 'gagal menambah data anggota baru',
        //     ];
        //     $log->insert($dataLog);
        //     $ses_data = [
        //         'statusTambah'  => "Gagal",
        //         'keterangan'    => "Posisi sudah terdaftar"
        //     ];    
        //     $session->set($ses_data);
        //     return redirect()->to(base_url().'/adminPKK');
        // }
        
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
                'statusTambah'  => "Gagal",
                'keterangan'    => "Anggota sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminPKK');
        }
        if($cekDusun[0]['kodeDusun'] == 0){
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah anggpta baru dikarenakan Kode Dusun belum ada',
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Nama dusun belum diperbarui"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminPKK');
        }

        $acak         = rand(10,500);
        $gambar       = $this->request->getFile('gambar');
        $namaGambar   = "PKK_".$nik."_".$acak.".jpg";
        $gambar->move('foto/', $namaGambar);
        $data = [
            'nik'           => $nik,
            'jabatan'       => $jabatan,
            'gambar'        => $namaGambar,
        ];
        $anggotaPKK->insert($data);

        if($jabatan == 'dasawisma'){
            $data = [
                'kodeKecamatanDasawisma' =>  $kodeKecamatanLog,
                'kodeDesaDasawisma'      =>  $kodeDesaLog,
		        'kodeDusunDasawisma' 	 =>  $cekDusun[0]['kodeDusun'],
                'nik'                    =>  $nik,
                'idDasawisma'            =>  $kodeDasawisma,
                'jabatan'                =>  "Ketua"
            ];
        $dasawwisma->insert($data);
        }
        
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota PKK baru dengan nik '. $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Anggota baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPKK');
    }

    public function hapusAnggotaPKK($id=null)
    {
        $session                = session();
        $anggotaPKK             = new Model_strukturPKK();
        $anggotaDasawisma       = new Model_userDasawisma();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $data                   = $anggotaPKK->where('idAnggotaPKK',$id)->findAll();  
        $dataDasawisma          = $anggotaDasawisma->where('nik',$data[0]['nik'])->findAll();  
        $anggotaDasawisma->delete($dataDasawisma[0]['idUserDasawisma']);
        $anggotaPKK->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota PKK dengan nik '.$data[0]['nik'],
        ];
        $log->insert($dataLog);
        unlink('foto/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Anggota PKK berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPKK');
    }
 
}