<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;

class ProsesTambahWarga extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $warga          = new Model_warga();
        $log            = new Model_log();
        $tahunSaatIni   = date('Y');
        $cekAnggota     = $warga->where('nomorIndukKependudukan',$this->request->getPost('noKTP'))->findAll();        
        if($cekAnggota != null){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah data warga negara',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "warga sudah terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/formTambahWarga');
        }
        $umur = $tahunSaatIni - date('Y',strtotime($this->request->getPost('tanggalLahir')));
        $data = [
            'nomorKartuKeluarga'        => $this->request->getPost('nomorKK'),
            'nomorIndukKependudukan'    => $this->request->getPost('noKTP'),
            'namaWarga'                 => $this->request->getPost('namaWarga'),
            'tempatLahir'               => $this->request->getPost('tempatLahir'),
            'tanggalLahir'              => $this->request->getPost('tanggalLahir'),
            'jenisKelamin'              => $this->request->getPost('jenisKelamin'),            
            'golDarah'                  => $this->request->getPost('golDarah'),            
            'agama'                     => $this->request->getPost('agama'),
            'statusKawin'               => $this->request->getPost('statusKawin'),
            'pendidikanTerakhir'        => $this->request->getPost('pendidikanTerakhir'),
            'pendidikanDitempuh'        => $this->request->getPost('statusPendidikan'),
            'pekerjaan'                 => $this->request->getPost('pekerjaan'),
            'statusKeluarga'            => $this->request->getPost('statusKeluarga'),
            'alamat'                    => $this->request->getPost('alamat'),
            'umur'                      => $umur,
            'RT'                        => $this->request->getPost('RT'),
            'RW'                        => $this->request->getPost('RW'),
            'dusun'                     => $this->request->getPost('dusun'),
            'desa'                      => $this->request->getPost('desa'),
            'kecamatan'                 => $this->request->getPost('kecamatan'),
            'bpjs'                      => $this->request->getPost('bpjs'),
            'penghasilan'               => $this->request->getPost('penghasilan'),
            'status'                    => "hidup",
        ];
        $warga->insert($data);
        
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
        return redirect()->to(base_url().'/formTambahWarga');
    }

    public function hapusWarga($id=null)
    {
        $session        = session();
        $warga          = new Model_warga();
        $log            = new Model_log();
        $data           = $warga->where('idWarga',$id)->findAll();  
        $hapus          = $warga->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data warga dengan nama '.$data[0]['namaWarga'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "data warga berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminWargaNegara');
    }
 
}