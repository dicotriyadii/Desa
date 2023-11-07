<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_desa;
use App\Models\Model_log;

class ProsesEditTambahProfilDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilDesa          = new Model_profil_desa();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $idProfilDesa        = $this->request->getPost('idProfilDesa');
        $tahun               = $this->request->getPost('tahun');
        $tahunPembentukan    = $this->request->getPost('tahunPembentukan');
        $luasDesa            = $this->request->getPost('luasDesa');
        $penetapanBatas      = $this->request->getPost('penetapanBatas');
        $dasarHukumPerdes    = $this->request->getPost('dasarHukumPerdes');
        $dasarHukumPerda     = $this->request->getPost('dasarHukumPerda');
        $petaWilayah         = $this->request->getPost('petaWilayah');
        $koordinat           = $this->request->getPost('koordinat');
        $tipologi            = $this->request->getPost('tipologi');
        $klasifikasi         = $this->request->getPost('klasifikasi');
        $kategori            = $this->request->getPost('kategori');
        $batasWilayahUtara   = $this->request->getPost('batasWilayahUtara');
        $batasWilayahSelatan = $this->request->getPost('batasWilayahSelatan');
        $batasWilayahTimur   = $this->request->getPost('batasWilayahTimur');
        $batasWilayahBarat   = $this->request->getPost('batasWilayahBarat');
        $data = [
            'tahun'                 => $tahun,
            'tahunPembentukan'      => $tahunPembentukan,
            'luasDesa'              => $luasDesa,
            'penetapanBatas'        => $penetapanBatas,
            'dasarHukumPerdes'      => $dasarHukumPerdes,
            'dasarHukumPerda'       => $dasarHukumPerda,
            'petaWilayah'           => $petaWilayah,
            'koordinat'             => $koordinat,
            'tipologi'              => $tipologi,
            'klasifikasi'           => $klasifikasi,
            'kategori'              => $kategori,
            'batasWilayahUtara'     => $batasWilayahUtara,
            'batasWilayahSelatan'   => $batasWilayahSelatan,
            'batasWilayahTimur'     => $batasWilayahTimur,
            'batasWilayahBarat'     => $batasWilayahBarat,
        ];
        $profilDesa->update($idProfilDesa,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Desa',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilDesa');
    }
 
}