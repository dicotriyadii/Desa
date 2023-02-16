<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Libraries\Pdfgenerator;
use App\Models\Model_surat;
use App\Models\Model_warga;


class ProsesSurat extends ResourceController
{
    public function surat($nik=null,$idSurat=null)
    {
    	// variable
        $warga      = new Model_warga();
        $surat      = new Model_surat();
        // Proses
        $dataWarga      = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        $dataSurat      = $surat->where('idSurat',$idSurat)->findAll();
        $namaJenisSurat = strtolower($dataSurat[0]['jenisSurat']);
        if($namaJenisSurat == "surat keterangan domisili"){
            $Pdfgenerator   = new Pdfgenerator();
            $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
            $file_pdf = 'laporan_penjualan_toko_kita';
            $paper = 'A4';
            $orientation = "portrait";
            $html = view('suratDomisili',compact('dataWarga','dataSurat'));
            $tes = $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);        

        }else {
            die("Surat Lain nya sedang dalam pengembangan");
        }
    }
}