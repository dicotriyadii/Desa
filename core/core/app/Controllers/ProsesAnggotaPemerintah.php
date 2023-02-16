<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_log;

class ProsesAnggotaPemerintah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $anggotaPemerintah      = new Model_struktur_pemerintah_desa();
        $log                    = new Model_log();
        $cekAnggota             = $anggotaPemerintah->where('namaAnggota',$this->request->getPost('namaAnggota'))->findAll();
        $jumlahKades            = $anggotaPemerintah->where('jabatan','Kepala Desa')->countAllResults();
        $jumlahSekdes           = $anggotaPemerintah->where('jabatan','Sekretaris Desa')->countAllResults();
        $jumlahKaurUmum         = $anggotaPemerintah->where('jabatan','Kepala Urusan Umum')->countAllResults();
        $jumlahKaurKeuangan     = $anggotaPemerintah->where('jabatan','Kepala Urusan Keuangan')->countAllResults();
        $jumlahKaurPerencanaan  = $anggotaPemerintah->where('jabatan','Kepala Urusan Perencanaan')->countAllResults();
        $jumlahKasiKesra        = $anggotaPemerintah->where('jabatan','Kepala Seksi Kesejahteraan Masyarakat')->countAllResults();
        $jumlahKasiPelayanan    = $anggotaPemerintah->where('jabatan','Kepala Seksi Pelayanan')->countAllResults();
        $jumlahKasiPemerintah   = $anggotaPemerintah->where('jabatan','Kepala Seksi Pemerintah')->countAllResults();
        
        if($jumlahKades >= 2 || $jumlahSekdes >= 2 || $jumlahKaurUmum >= 2 || $jumlahKaurKeuangan >= 2 || $jumlahKaurPerencanaan >= 2 || $jumlahKasiKesra >= 2 || $jumlahKasiPelayanan >= 2 || $jumlahKasiPemerintah >= 2 ){
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
            return redirect()->to(base_url().'/formAnggotaPemerintah');
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
            return redirect()->to(base_url().'/formAnggotaPemerintah');
        }
        $foto         = $this->request->getFile('foto');
        // $namaFoto     = str_replace(' ','_',$foto->getName());
        $namaFoto     = "anggotaPemerintah_".$this->request->getPost('namaAnggota').'.jpg';
        // $path         = $this->request->getFile('foto')->store('foto/',$namaFoto );
        $foto->move('foto/', $namaFoto);
        $data = [
            'namaAnggota'   => $this->request->getPost('namaAnggota'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'gambar'        => $namaFoto,
            'keterangan'    => $this->request->getPost('keteranganAnggotaPemerintah'),
        ];
        $anggotaPemerintah->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah anggota Pemerintah baru dengan nama '. $this->request->getPost('namaAnggota'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data Anggota baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formAnggotaPemerintah');
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
            'keterangan'    => 'Penghapusan data Anggota Pemerintah dengan nama '.$data[0]['namaAnggota'],
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