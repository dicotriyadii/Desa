<?php

namespace App\Controllers;
use App\Models\Model_user;
use App\Models\Model_profil_desa;
use App\Models\Model_sejarah_desa;
use App\Models\Model_visiMisi;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_strukturPKK;
use App\Models\Model_struktur_lpm;
use App\Models\Model_pekerjaan;
use App\Models\Model_dusun;
use App\Models\Model_pendidikanTerakhir;
use App\Models\Model_pendidikanDitempuh;
use App\Models\Model_agama;
use App\Models\Model_kontak;
use App\Models\Model_produk_hukum;
use App\Models\Model_informasi_publik;
use App\Models\Model_artikel;
use App\Models\Model_berita;
use App\Models\Model_galeri_foto;
use App\Models\Model_warga;
use App\Models\Model_desa;
use App\Models\Model_kategori;
use App\Models\Model_data;

class Form extends BaseController
{
    public function formTambahWarga()
    {
        $session = session();
        $modelData              = new Model_data();
        $dataDusun              = $modelData->getDusun();
        $dataDesa               = $modelData->getDesa();
        $dataPendidikanTerakhir = $modelData->getPendidikanTerakhir();
        $dataPendidikanDitempuh = $modelData->getPendidikanDitempuh();
        $dataAgama              = $modelData->getAgama();
        $data                   = $modelData->getPekerjaan();
        return view('adminFormTambahWarga',compact('data','dataDusun','dataPendidikanTerakhir','dataPendidikanDitempuh','dataAgama','dataDesa'));
    }
    
    public function formTambahWargaEdit($id=null)
    {
        $session                = session();
        $modelData              = new Model_data();
        $kodeKecamatan          = $session->get('kodeKecamatan');
        $kodeDesa               = $session->get('kodeDesa');   
        $dataDusun              = $modelData->getDusun();
        $dataDesa               = $modelData->getDesa();
        $dataPendidikanTerakhir = $modelData->getPendidikanTerakhir();
        $dataPendidikanDitempuh = $modelData->getPendidikanDitempuh();
        $dataAgama              = $modelData->getAgama();
        $data                   = $modelData->getPekerjaan();
        $dataWarga              = $modelData->getWargaDetail($kodeKecamatan,$kodeDesa,$id);
        return view('adminFormTambahWargaEdit',compact('data','dataDusun','dataPendidikanTerakhir','dataPendidikanDitempuh','dataAgama','dataDesa','dataWarga'));
    }
}
