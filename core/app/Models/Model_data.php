<?php namespace App\Models;
 
use CodeIgniter\Model;
class Model_data extends Model
{   
    // Data untuk tampilan admin
    public function getTotalWarga($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->countAllResults();
    }

    public function getTotalLaki($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('jenisKelamin','LAKI - LAKI');
        return $builder->countAllResults();
    }
    
    public function getTotalPerempuan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('jenisKelamin','PEREMPUAN');
        return $builder->countAllResults();
    }

    public function getTotalKartuKeluarga ($kodeKecamatan=null,$kodeDesa=null){
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
		return $builder->groupBy('nomorKartuKeluarga')->countAllResults();    	
    }

    public function getTotalMenjalankanPendidikan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('pendidikanDitempuh !=','TIDAK SEDANG SEKOLAH');
        return $builder->countAllResults();
    }

    public function getTotalBekerja($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('penghasilan !=','0');
        return $builder->countAllResults();
    }

    public function getTotalTidakBekerja($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('penghasilan','0');
        return $builder->countAllResults();
    }

    public function getTotalPenggunaBPJS($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('bpjs !=','0');
        return $builder->countAllResults();
    }
    public function getBPJS($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('bpjs !=','0');
        return $builder->get()->getResultArray();
    }
    public function getKritikSaran($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_kritik_saran');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idKritikSaran',"DESC");
        return $builder->get()->getResultArray();
    }
    public function getWargaAll($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getWarga($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getWargaDetail($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idWarga',$id);
        // $builder->join('tbl_dusun', 'tbl_dusun.idDusun = tbl_warga.kodeDusun');
        return $builder->get()->getResultArray();
    }
    public function getJenisKelamin()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_jenis_kelamin');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function jumlahWargaJenisKelamin($kodeKecamatan,$kodeDesa,$jenisKelamin)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('jenisKelamin',$jenisKelamin);
        $builder->select('*');
        return $builder->CountAllResults();
    }
    public function getDusun()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_dusun');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function jumlahWargaPerDusun($kodeKecamatan,$kodeDesa,$kodeDusun)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('kodeDusun',$kodeDusun);
        $builder->select('*');
        return $builder->CountAllResults();
    }
    public function jumlahWargaPerDusunJenisKelamin($kodeKecamatan,$kodeDesa,$kodeDusun,$jenisKelamin)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('kodeDusun',$kodeDusun);
        $builder->where('jenisKelamin',$jenisKelamin);
        $builder->select('*');
        return $builder->CountAllResults();
    }
    public function getPendidikanTerakhir()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pendidikan_terakhir');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function jumlahPendidikanTerakhir($kodeKecamatan,$kodeDesa,$dataPendidikan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('pendidikanTerakhir',$dataPendidikan);
        $builder->select('*');
        return $builder->CountAllResults();
    }

    public function jumlahPendidikanDitempuh($kodeKecamatan,$kodeDesa,$dataPendidikan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('pendidikanDitempuh',$dataPendidikan);
        $builder->select('*');
        return $builder->CountAllResults();
    }

    public function getPendidikanDitempuh()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pendidikan_ditempuh');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getAgama()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_agama');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function jumlahWargaAgama($kodeKecamatan,$kodeDesa,$jenisAgama)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('agama',$jenisAgama);
        $builder->select('*');
        return $builder->CountAllResults();
    }
    public function getPekerjaan()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pekerjaan');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function jumlahWargaBekerja($kodeKecamatan,$kodeDesa,$dataPekerjaan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('pekerjaan',$dataPekerjaan);
        $builder->select('*');
        return $builder->CountAllResults();
    }
    // Informasi
    public function getArtikel($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_artikel');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idArtikel','DESC');
        return $builder->get()->getResultArray();
    }
    public function getBerita($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idBerita','DESC');
        return $builder->get()->getResultArray();
    }
    public function getKategori($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_kategori');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idKategori','ASC');
        return $builder->get()->getResultArray();
    }
    public function getGaleri($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_galeri_foto');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idGaleri','DESC');
        return $builder->get()->getResultArray();
    }
    public function getPengumuman($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pengumuman');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPengumuman','DESC');
        return $builder->get()->getResultArray();
    }
    public function getPemberitahuan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pemberitahuan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPemberitahuan','DESC');
        return $builder->get()->getResultArray();
    }
    public function getStrukturPemerintahDesa($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_pemerintah_desa');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pemerintah_desa.nik');
		return $builder->get()->getResultArray();
    }
    public function getStrukturPKK($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_pkk');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pkk.nik');
		return $builder->get()->getResultArray();
    }
    public function getStrukturLPM()
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_lpm');
		$builder->select('*');
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_lpm.nik');
		return $builder->get()->getResultArray();
    }
    public function getStrukturBPD()
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_bpd');
		$builder->select('*');
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_bpd.nik');
		return $builder->get()->getResultArray();
    }
    public function getStrukturBumdes()
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_bumdes');
		$builder->select('*');
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_bumdes.nik');
		return $builder->get()->getResultArray();
    }
    public function getProdukHukum($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_produk_hukum');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idProdukHukum','DESC');
		return $builder->get()->getResultArray();
    }
    public function getDetailProdukHukum($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_produk_hukum');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idProdukHukum',$id);
        $builder->orderBy('idProdukHukum','DESC');
		return $builder->get()->getResultArray();
    }
    public function getDetailPemilikTanah($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_pemilik_tanah');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idPemilikTanah',$id);
		return $builder->get()->getResultArray();
    }
    public function getInformasiPublik($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_informasi_publik');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idInformasiPublik','DESC');
		return $builder->get()->getResultArray();
    }
    public function getDetailInformasiPublik($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_informasi_publik');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idInformasiPublik',$id);
        $builder->orderBy('idInformasiPublik','DESC');
		return $builder->get()->getResultArray();
    }
    public function getDetailRegulasi($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_informasi_regulasi');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idRegulasi',$id);
		return $builder->get()->getResultArray();
    }
    public function getDetailInformasi($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_informasi');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('idInformasi',$id);
		return $builder->get()->getResultArray();
    }
    public function getCarousel($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_carousel');
		$builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
		return $builder->get()->getResultArray();
    }
    public function getDesa($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_desa');
		$builder->select('*');
        $builder->where('kode_Kecamatan',$kodeKecamatan);
        $builder->where('kode_Desa',$kodeDesa);
        $builder->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tbl_desa.kode_Kecamatan');
        $builder->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tbl_desa.kode_Desa');
		return $builder->get()->getResultArray();
    }
    public function getDasawisma($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tb_dasa_wisma');
		$builder->select('*');
        $builder->where('kode_Kecamatan',$kodeKecamatan);
        $builder->where('kode_Desa',$kodeDesa);
		return $builder->get()->getResultArray();
    }
    public function getDesa_dasa_wisma($kodeKecamatan=null,$kodeDesa=null)
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_desa');
		$builder->select('*');
        $builder->where('kode_Kecamatan',$kodeKecamatan);
        $builder->where('kode_Desa',$kodeDesa);
        $builder->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tbl_desa.kode_Kecamatan');
        $builder->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tbl_desa.kode_Desa');
		return $builder->get()->getRowArray();
    }
    public function getBeritaLimit($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idBerita','DESC');
        $builder->limit(4);
        return $builder->get()->getResultArray();
    }
    public function getPengumumanLimit($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pengumuman');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPengumuman','DESC');
        $builder->limit(4);
        return $builder->get()->getResultArray();
    }
    public function getArtikelLimit($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_artikel');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idArtikel','DESC');
        $builder->limit(4);
        return $builder->get()->getResultArray();
    }
    public function getKontak($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_kontak');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idKontak','DESC');
        $builder->limit(4);
        return $builder->get()->getResultArray();
    }
    public function getBeritaValidasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('status','sudah validasi');
        $builder->orderBy('idBerita','DESC');
        return $builder->get()->getResultArray();
    }
    public function getProfilDesa($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getTataGunaLahan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_tatagunalahan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getProduksi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_produksi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getRawanBencana($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_rawanbencana');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getOrbitasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_orbitasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getKantorDesa($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_kantordesa');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getKesehatan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_kesehatan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getPendidikan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_pendidikan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getPeribadatan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_peribadatan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getTransportasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_transportasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getAirBersih($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_airbersih');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getIrigasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_irigasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getSanitasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_sanitasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getOlahraga($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_olahraga');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getKemasyarakatan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_kelembagaan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getAdat($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_adat');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getKeamanan($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_profil_desa_keamanan');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
// 


    public function getSejarahDesa($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_sejarah_desa');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getVisiMisi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_visimisi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        return $builder->get()->getResultArray();
    }
    public function getArtikelValidasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_artikel');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idArtikel','DESC');
        $builder->where('status','sudah validasi');
        return $builder->get()->getResultArray();
    }
    public function getArtikelDetail($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_artikel');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('status','sudah validasi');
        $builder->where('idArtikel',$id);
        return $builder->get()->getResultArray();
    }
    public function getBeritaDetail($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('status','sudah validasi');
        $builder->where('idBerita',$id);
        return $builder->get()->getResultArray();
    }
    public function getSeluruhBeritaValidasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('status','sudah validasi');
        $builder->orderBy('idBerita','DESC');
        return $builder->get()->getResultArray();
    }
    public function getSeluruhBeritaFilter($kodeKecamatan=null,$kodeDesa=null,$id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_berita');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->where('status','sudah validasi');
        $builder->where('kategori',$id);
        $builder->orderBy('idBerita','DESC');
        return $builder->get()->getResultArray();
    }
    public function getJenisPotensi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_jenis_potensi');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getPotensi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_potensi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPotensi','DESC');
        $builder->join('tbl_jenis_potensi', 'tbl_jenis_potensi.idJenisPotensi = tbl_potensi.jenisPotensi');
        return $builder->get()->getResultArray();
    }
    public function getPemilikTanah($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pemilik_tanah');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPemilikTanah','DESC');
        return $builder->get()->getResultArray();
    }
    public function cekKepemilikanSurat($nomorSurat)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pemilik_tanah');
        $builder->select('*');
        $builder->where('nomorSurat',$nomorSurat);
        return $builder->get()->getResultArray();
    }
    public function getResapmas($kodeKecamatan,$kodeDesa)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_pelayanan');
        $builder->select('*');
        $builder->where('kodeKecamatanPelayanan',$kodeKecamatan);
        $builder->where('kodeDesaPelayanan',$kodeDesa);
        $builder->orderBy('idPelayanan','DESC');
        return $builder->get()->getResultArray();
    }
    public function getPermohonanInformasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_permohonan_informasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idPermohonanInformasi','DESC');
        return $builder->get()->getResultArray();
    }
    public function getRegulasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_informasi_regulasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idRegulasi','DESC');
        return $builder->get()->getResultArray();
    }
    public function getInformasi($kodeKecamatan=null,$kodeDesa=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_informasi');
        $builder->select('*');
        $builder->where('kodeKecamatan',$kodeKecamatan);
        $builder->where('kodeDesa',$kodeDesa);
        $builder->orderBy('idInformasi','DESC');
        return $builder->get()->getResultArray();
    }
}