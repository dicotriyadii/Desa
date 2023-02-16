<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Libraries\Pdfgenerator;
use App\Models\Model_warga;
use App\Models\Model_surat;
use App\Models\Model_struktur_pemerintah_desa;
 
class PersetujuanSurat extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $session            = session();
        $surat              = new Model_surat();
        $warga              = new Model_warga();
        $pemdes             = new Model_struktur_pemerintah_desa();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $idSurat            = $this->request->getVar('idSurat');
        $passphrase         = $this->request->getVar('passphrase');
        
        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $nik,
            'token' => $token
        ];
        $cekToken   = $warga->where($dataValidasi)->findAll();
        if($cekToken == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response);          
        }

        // Proses Persetujuan
        $cekJabatan = $pemdes->where('nik',$nik)->findAll();
        $jabatan    = strtolower($cekJabatan[0]['jabatan']);
        $validasiSuratSebelumnya    = [
            'bulanSurat' => date('m'),
            'idSurat' => $idSurat - 1,
        ];
        $cekSuratSebelumnya         = $surat->where($validasiSuratSebelumnya)->findAll();
        if($cekSuratSebelumnya != null){
            $nomorSurat = $cekSuratSebelumnya[0]['nomorSurat'] + 1;
        }else if($cekSuratSebelumnya == null){
            $nomorSurat = 1;
        }
        $cekDataSurat = $surat->where('idSurat',$idSurat)->findAll();
        if($jabatan == "operator desa"){
            $updateData = [
                'operator'      => "1",
                'nomorSurat'    => $nomorSurat,
                'bulanSurat'    => date('m'),
                'tanggalSurat'  => date('Y-m-d'),
            ];
            $surat->update($idSurat,$updateData);
            $response = [
                'status'    => 200,
                'messages'  => "Berkas sudah Telah disetujui ".$jabatan
            ];            
        }else if($jabatan == "kepala desa"){
            //Proses TTE
            $dataSurat      = $surat->where('idSurat',$idSurat)->findAll();
            $dataWarga      = $warga->where('nomorIndukKependudukan',$dataSurat[0]['nikPemohon'])->findAll();
            $namaJenisSurat = strtolower($dataSurat[0]['jenisSurat']);
            $nilaiAcak = rand(10,100);
            $namaFile  = 'Surat Domisili-'.$dataSurat[0]['nikPemohon'].'-'.$nilaiAcak;
            $updateData = [
                    'kades' => "1",
                    'status' => "1",
                    'link'  => $namaFile
                ];
            $surat->update($idSurat,$updateData);
            if($namaJenisSurat == "surat keterangan domisili"){
                $Pdfgenerator   = new Pdfgenerator();
                $this->data['title_pdf'] = 'Surat Domisili '.$dataSurat[0]['nikPemohon'];
                $file_pdf = $namaFile;
                $paper = 'A4';
                $orientation = "portrait";
                $html = view('suratDomisili',compact('dataWarga','dataSurat'));
                $ses_data = [
                    'namaBerkas'  => $file_pdf,
                    'passphrase'  => $passphrase,
                    'nik'         => $nik
                ];
                $session->set($ses_data);
                $tes = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);        
            }else {
                die("Surat Lain nya sedang dalam pengembangan");
            }
            $response = [
                'status'    => 200,
                'messages'  => "Berkas sudah disetujui ".$jabatan
            ];            
        }
        return $this->respond($response);
    }
}