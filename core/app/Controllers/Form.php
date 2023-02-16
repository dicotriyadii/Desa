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

class Form extends BaseController
{
    public function formPengguna()
    {
        return view('adminFormPengguna');
    }
    public function formAnggotaPemerintah()
    {
        return view('adminFormAnggotaPemerintah');
    }
    public function formAnggotaPKK()
    {
        return view('adminFormAnggotaPKK');
    }
    public function formAnggotaLPM()
    {
        return view('adminFormAnggotaLPM');
    }
    public function formTambahWarga()
    {
        $session = session();
        $pekerjaan              = new Model_pekerjaan();
        $dusun                  = new Model_dusun();
        $pendidikanTerakhir     = new Model_pendidikanTerakhir();
        $pendidikanDitempuh     = new Model_pendidikanDitempuh();
        $agama                  = new Model_agama();
        $desa                   = new Model_desa();
        $dataDusun              = $dusun->getDusun();
        if($dataDusun == null){
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Data dusun di tambah terlebih dahulu"
            ];    
            $session->set($ses_data);
            return redirect()->back();
        }
        $dataDesa               = $desa->getDesa();
        $dataPendidikanTerakhir = $pendidikanTerakhir->getPendidikanTerakhir();
        $dataPendidikanDitempuh = $pendidikanDitempuh->getPendidikanDitempuh();
        $dataAgama              = $agama->getAgama();
        $data                   = $pekerjaan->getPekerjaan();
        return view('adminFormTambahWarga',compact('data','dataDusun','dataPendidikanTerakhir','dataPendidikanDitempuh','dataAgama','dataDesa'));
    }
    public function formTambahDusun()
    {
        $dusun                  = new Model_dusun();
        $dataDusun              = $dusun->getDusun();
        return view('adminFormTambahDusun',compact('dataDusun'));
    }    
    public function formProdukHukum()
    {
        return view('adminFormProdukHukum');
    }
    public function formArtikel()
    {
        return view('adminFormArtikel');
    }
    public function formBerita()
    {
        $kategori       = new Model_kategori();
        $dataKategori   = $kategori->getKategori();
        return view('adminFormBerita',compact('dataKategori'));
    }
    public function formGaleri()
    {
        return view('adminFormGaleri');
    }
    public function formInformasiPublik()
    {
        return view('adminFormInformasiPublik');
    }
    public function formTambahCarousel()
    {
        return view('adminFormTambahCarousel');
    }
    public function formRubahTema()
    {
        return view('adminFormRubahTema');
    }
    public function formEditPengguna($id=null)
    {
        $pengguna   = new Model_user();
        $data = $pengguna->where('idUser',$id)->findAll();
        return view('adminFormEditPengguna',compact('data'));
    }
    public function formEditAnggotaPemerintah($id=null)
    {
        $anggotaPemerintah   = new Model_struktur_pemerintah_desa();
        $data = $anggotaPemerintah->where('idAnggotaPemerintah',$id)->findAll();
        return view('adminFormEditAnggotaPemerintah',compact('data'));
    }
    public function formEditAnggotaPKK($id=null)
    {
        $anggotaPKK   = new Model_strukturPKK();
        $data = $anggotaPKK->where('idAnggotaPKK',$id)->findAll();
        return view('adminFormEditAnggotaPKK',compact('data'));
    }
    public function formEditAnggotaLPM($id=null)
    {
        $anggotaLPM   = new Model_struktur_lpm();
        $data = $anggotaLPM->where('idAnggotaLPM',$id)->findAll();
        return view('adminFormEditAnggotaLPM',compact('data'));
    }
    public function formEditProfilDesa($id=null)
    {
        $profilDesa   = new Model_profil_desa();
        $data = $profilDesa->where('idProfilDesa',$id)->findAll();
        return view('adminFormEditProfilDesa',compact('data'));
    }
    public function formEditSejarahDesa($id=null)
    {
        $sejarahDesa   = new Model_sejarah_desa();
        $data = $sejarahDesa->where('idSejarahDesa',$id)->findAll();
        return view('adminFormEditSejarahDesa',compact('data'));
    }
    public function formEditVisiMisi($id=null)
    {
        $visiMisi   = new Model_visiMisi();
        $data = $visiMisi->where('idVisiMisi',$id)->findAll();
        return view('adminFormEditVisiMisi',compact('data'));
    }
    public function formEditKontak($id=null)
    {
        $kontak     = new Model_kontak();
        $data       = $kontak->where('idKontak',$id)->findAll();
        return view('adminFormEditKontak',compact('data'));
    }
    public function formEditProdukHukum($id=null)
    {
        $produkHukum    = new Model_produk_hukum();
        $data           = $produkHukum->where('idProdukHukum',$id)->findAll();
        return view('adminFormEditProdukHukum',compact('data'));
    }
    public function formEditInformasiPublik($id=null)
    {
        $informasiPublik    = new Model_informasi_publik();
        $data           = $informasiPublik->where('idInformasiPublik',$id)->findAll();
        return view('adminFormEditInformasiPublik',compact('data'));
    }
    public function formEditArtikel($id=null)
    {
        $artikel    = new Model_artikel();
        $data       = $artikel->where('idArtikel',$id)->findAll();
        return view('adminFormEditArtikel',compact('data'));
    }
    public function formEditBerita($id=null)
    {
        $berita     = new Model_berita();
        $kategori       = new Model_kategori();
        $data       = $berita->where('idBerita',$id)->findAll();
        $dataKategori   = $kategori->getKategori();
        return view('adminFormEditBerita',compact('data','dataKategori'));
    }
    public function formEditGaleri($id=null)
    {
        $galeri     = new Model_galeri_foto();
        $data       = $galeri->where('idGaleri',$id)->findAll();
        return view('adminFormEditGaleri',compact('data'));
    }
    public function formEditWarga($id=null)
    {
        $warga                  = new Model_warga();
        $pekerjaan              = new Model_pekerjaan();
        $dusun                  = new Model_dusun();
        $pendidikanTerakhir     = new Model_pendidikanTerakhir();
        $pendidikanDitempuh     = new Model_pendidikanDitempuh();
        $agama                  = new Model_agama();
        $dataDusun              = $dusun->getDusun();
        $dataPendidikanTerakhir = $pendidikanTerakhir->getPendidikanTerakhir();
        $dataPendidikanDitempuh = $pendidikanDitempuh->getPendidikanDitempuh();
        $dataAgama              = $agama->getAgama();
        $dataPekerjaan          = $pekerjaan->getPekerjaan();
        $data                   = $warga->where('idWarga',$id)->findAll();
        return view('adminFormEditWarga',compact('data','dataDusun','dataPendidikanTerakhir','dataPendidikanDitempuh','dataAgama','dataPekerjaan'));
    }
    public function formEditDataDesa($id=null)
    {
        $desa       = new Model_desa();
        $dataDesa   = $desa->where('idDesa',$id)->findAll();
        return view('adminFormEditDataDesa',compact('dataDesa'));
    }

}
