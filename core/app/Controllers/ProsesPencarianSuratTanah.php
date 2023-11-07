<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_data;
use App\Models\Model_log;

class ProsesPencarianSuratTanah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $modelData           = new Model_data();
        $log                 = new Model_log();    
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $nomorSurat          = $this->request->getPost('nomorSurat');
        $cekBerkas           = $modelData->cekKepemilikanSurat($nomorSurat);
        if($cekBerkas == null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Mohon Maaf, data yang anda cari tidak ditemukan, silahkan hubungi admin website kelurahan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/informasiKepemilikanTanah');    
        }
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "<h3>Data berhasil ditemukan</h3><div align='center'><table width='100%'><tr><td style='align:left;' width='39%'>Nomor Surat</td><td width='1%'>:</td><td align='left' width='60%'>".$cekBerkas[0]['pemilikSebelumnya']."</td></tr><tr><td style='align:left;' width='39%'>Pemilik Sebelumnya</td><td width='1%'>:</td><td align='left' width='60%'>".$cekBerkas[0]['pemilikSebelumnya']."</td></tr><tr><td style='align:left;' width='39%'>Pemilik Sekarang</td><td width='1%'>:</td><td align='left' width='60%'>".$cekBerkas[0]['pemilikSekarang']."</td></tr><tr><td style='align:left;' width='39%'>Luas tanah</td><td width='1%'>:</td><td align='left' width='60%'>".$cekBerkas[0]['luasTanah']."</td></tr><tr><td style='align:left;' width='39%'>Alamat</td><td width='1%'>:</td><td align='left' width='60%'>".$cekBerkas[0]['alamat']."</td></tr></table><br><p align='left'>Silahkan Hubungi Admin Kelurahan Untuk Mendapatkan SoftCopy Surat Keterangan Tanah Tersebut</p></div>"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/informasiKepemilikanTanah');
    }
}