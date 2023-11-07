<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_log;

class ProsesTambahPemerintahDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        // inisialisasi variable
        $session                = session();
        $anggotaPemerintah      = new Model_struktur_pemerintah_desa();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $gambar                 = $this->request->getFile('gambar');
        $jabatan                = $this->request->getPost('jabatan');
        $nik                    = $this->request->getPost('nik');
        $keterangan             = $this->request->getPost('keterangan');
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
            return redirect()->to(base_url().'/adminPemerintahDesa');    
        }
    
        // validasi
        $cekAnggota             = $anggotaPemerintah->where('nik',$nik)->findAll();
        $jumlahKades            = $anggotaPemerintah->where('jabatan','Kepala Desa')->countAllResults();
        $jumlahSekdes           = $anggotaPemerintah->where('jabatan','Sekretaris Desa')->countAllResults();
        $jumlahKaurUmum         = $anggotaPemerintah->where('jabatan','Kepala Urusan Umum')->countAllResults();
        $jumlahKaurKeuangan     = $anggotaPemerintah->where('jabatan','Kepala Urusan Keuangan')->countAllResults();
        $jumlahKaurPerencanaan  = $anggotaPemerintah->where('jabatan','Kepala Urusan Perencanaan')->countAllResults();
        $jumlahKasiKesra        = $anggotaPemerintah->where('jabatan','Kepala Seksi Kesejahteraan Masyarakat')->countAllResults();
        $jumlahKasiPelayanan    = $anggotaPemerintah->where('jabatan','Kepala Seksi Pelayanan')->countAllResults();
        $jumlahKasiPemerintah   = $anggotaPemerintah->where('jabatan','Kepala Seksi Pemerintah')->countAllResults();

        // if($jumlahKades >= 2 || $jumlahSekdes >= 2 || $jumlahKaurUmum >= 2 || $jumlahKaurKeuangan >= 2 || $jumlahKaurPerencanaan >= 2 || $jumlahKasiKesra >= 2 || $jumlahKasiPelayanan >= 2 || $jumlahKasiPemerintah >= 2 ){
        //     $dataLog = [
        //         'kodeKecamatan' => $kodeKecamatanLog,
        //         'kodeDesa'      => $kodeDesaLog,
        //         'nama'          => $usernameLog,
        //         'waktu'         => date('Y-m-d H:i:s'),
        //         'keterangan'    => 'gagal menambah data anggota baru',
        //     ];
        //     $log->insert($dataLog);
        //     $ses_data = [
        //         'statusTambah' => "Gagal",
        //         'keterangan'=> "Posisi sudah terdaftar"
        //     ];    
        //     $session->set($ses_data);
        //     return redirect()->to(base_url().'/adminPemerintahDesa');
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
                'statusTambah' => "Gagal",
                'keterangan'=> "Anggota sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminPemerintahDesa');
        }
        $acak         = rand(10,500);
        $gambar       = $gambar;
        $namaFoto     = "pemerintah_".$nik."_".$acak.".jpg";
        $gambar->move('foto/', $namaFoto);
        $data = [
            'nik'           => $nik,
            'jabatan'       => $jabatan,
            'gambar'        => $namaFoto,
            'keterangan'    => $keterangan
        ];
        $anggotaPemerintah->insert($data);  
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota Pemerintah baru dengan nama '. $this->request->getPost('namaAnggota'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Anggota baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemerintahDesa');
    }

    public function hapusAnggotaPemerintah($id=null)
    {
        $session                = session();
        $anggotaPemerintah      = new Model_struktur_pemerintah_desa();
        $log                    = new Model_log();
        $data                   = $anggotaPemerintah->where('idAnggotaPemerintah',$id)->findAll();  
        $hapus                  = $anggotaPemerintah->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Anggota Pemerintah dengan nama '.$data[0]['nik'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('foto/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Anggota pemerintah berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemerintahDesa');
    }
 
}