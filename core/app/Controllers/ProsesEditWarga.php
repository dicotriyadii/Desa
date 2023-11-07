<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;

class ProsesEditwarga extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $warga                  = new Model_warga();
        $log                    = new Model_log();
        $idWarga                = $this->request->getPost('idWarga');
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $tahunSaatIni           = date('Y');
        $namaWarga              = $this->request->getPost('namaWarga');
        $nik                    = $this->request->getPost('noKTP');
        $nomorKartuKeluarga     = $this->request->getPost('nomorKartuKeluarga');
        $jenisKelamin           = $this->request->getPost('jenisKelamin');
        $tempatLahir            = $this->request->getPost('tempatLahir');
        $tanggalLahir           = $this->request->getPost('tanggalLahir');
        $agama                  = $this->request->getPost('agama');
        $alamat                 = $this->request->getPost('alamat');
        $kodeKecamatan          = $this->request->getPost('kodeKecamatan');
        $kodeDesa               = $this->request->getPost('kodeDesa');
        $kodeDusun              = $this->request->getPost('dusun');
        $pendidikanTerakir      = $this->request->getPost('pendidikanTerakhir');
        $pendidikanDitempuh     = $this->request->getPost('pendidikanDitempuh');
        $pekerjaan              = $this->request->getPost('pekerjaan');
        $golDarah               = $this->request->getPost('golDarah');
        $statusKawin            = $this->request->getPost('statusKawin');
        $RT                     = $this->request->getPost('RT');
        $RW                     = $this->request->getPost('RW');
        $statusKeluarga         = $this->request->getPost('statusKeluarga');
        $bpjs                   = $this->request->getPost('bpjs');
        $penghasilan            = $this->request->getPost('penghasilan');
        $noTelpon               = $this->request->getPost('noTelp');
        $tahunSaatIni           = date('Y');
        $umur = $tahunSaatIni - date('Y',strtotime($this->request->getPost('tanggalLahir')));
        $data = [
            'namaWarga'                 => $namaWarga,
            'nomorIndukKependudukan'    => $nik,
            'nomorKartuKeluarga'        => $nomorKartuKeluarga,
            'jenisKelamin'              => $jenisKelamin,            
            'tempatLahir'               => $tempatLahir,
            'tanggalLahir'              => $tanggalLahir,
            'umur'                      => $umur,
            'agama'                     => $agama,
            'alamat'                    => $alamat,
            'kodeKecamatan'             => $kodeKecamatanLog,
            'kodeDesa'                  => $kodeDesaLog,
            'kodeDusun'                 => $kodeDusun,
            'pendidikanTerakhir'        => $pendidikanTerakir,
            'pendidikanDitempuh'        => $pendidikanDitempuh,
            'pekerjaan'                 => $pekerjaan,
            'golDarah'                  => $golDarah,            
            'statusKawin'               => $statusKawin,
            'RT'                        => $RT,
            'RW'                        => $RW,
            'statusKeluarga'            => $statusKeluarga,
            'status'                    => "hidup",
            'bpjs'                      => $bpjs,
            'penghasilan'               => $penghasilan,
            'noTelpon'                  => $noTelpon,
        ];
        $warga->update($idWarga,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Warga ' . $this->request->getPost('namaWarga'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Data Warga berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminWargaNegara');
    }
 
}