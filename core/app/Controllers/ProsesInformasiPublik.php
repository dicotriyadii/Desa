<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi_publik;
use App\Models\Model_log;

class ProsesInformasiPublik extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $informasiPublik     = new Model_informasi_publik();
        $log                 = new Model_log();        
        $file                = $this->request->getFile('file');
        $namaInformasiPublik = "informasiPublik_".$this->request->getPost('informasiPublik').'.pdf';
        $cekBerkas           = $informasiPublik->where('berkasInformasiPublik',$namaInformasiPublik)->findAll();
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formInformasiPublik');
        }
        $periksaBerkas = $this->validate([
            'file' => [
            'uploaded[file]',
            'mime_in[file,application/pdf]',
            'max_size[file,210]',
            ],
        ]);
        if($periksaBerkas != true){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Berkas tidak sesuai dengan format yang di tentukan, silahkan coba lagi"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formProdukHukum');   
        }
        $file->move('informasiPublik/', $namaInformasiPublik);
        $data = [
            'namaInformasiPublik'   => $this->request->getPost('informasiPublik'),
            'berkasInformasiPublik' => $namaInformasiPublik,
            'keterangan'            => $this->request->getPost('keterangan'),
            'authorInformasiPublik' => $session->get('nama'),
            'tanggalUpload'         => date('Y-m-d')
        ];
        $informasiPublik->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah informasi publik '. $this->request->getPost('produkHukum'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Informasi Publik berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formInformasiPublik');
    }

    public function hapusInformasiPublik($id=null)
    {
        $session                = session();
        $informasiPublik        = new Model_informasi_publik();
        $log                    = new Model_log();
        $data                   = $informasiPublik->where('idInformasiPublik',$id)->findAll();  
        $hapus                  = $informasiPublik->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data informasi Publik '.$data[0]['namaInformasiPublik'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('informasiPublik/'.$data[0]['berkasInformasiPublik']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Informasi Publik berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiPublik');
    }
 
}