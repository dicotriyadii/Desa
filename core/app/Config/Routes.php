<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Menu
$routes->get('/', 'Page::landingPage');
$routes->get('/sejarah', 'Page::sejarah');
$routes->get('/profilWilayah', 'Page::profilWilayah');
$routes->get('/strukturPemerintah', 'Page::strukturPemerintah');
$routes->get('/visiMisi', 'Page::visiMisi');
$routes->get('/pkk', 'Page::pkk');
$routes->get('/artikelKelurahan', 'Page::artikel');
$routes->get('/artikelKelurahanDetail/(:any)', 'Page::artikelKelurahanDetail/$1');
$routes->get('/beritaKelurahan', 'Page::beritaKelurahan');
$routes->get('/beritaKelurahanDetail/(:any)', 'Page::beritaKelurahanDetail/$1');
$routes->get('/galeriKelurahan', 'Page::galeriKelurahan');
$routes->get('/pengumuman', 'Page::pengumuman');
$routes->get('/pendidikanDalamKK', 'Page::dataPendidikanDalamKK');
$routes->get('/pendidikanSedangDitempuh', 'Page::dataPendidikanSedangDitempuh');
$routes->get('/pekerjaan', 'Page::dataPekerjaan');
$routes->get('/agama', 'Page::dataAgama');
$routes->get('/jenisKelamin', 'Page::dataJenisKelamin');
$routes->get('/produkHukumKelurahan', 'Page::produkHukum');
$routes->get('/regulasi', 'Page::regulasi');
$routes->get('/permohonanInformasiPublik', 'Page::permohonanInformasiPublik');
$routes->get('/informasiPublikSetiapSaat', 'Page::informasiPublikSetiapSaat');
$routes->get('/informasiPublikBerkala', 'Page::informasiPublikBerkala');
$routes->get('/informasiPublikSertaMerta', 'Page::informasiPublikSertaMerta');
$routes->get('/informasiPublikDikecualikan', 'Page::informasiPublikDikecualikan');
$routes->get('/informasiPublikKelurahan', 'Page::informasiPublikKelurahan');
$routes->get('/kontak', 'Page::kontak');
$routes->get('/potensiUnggulan', 'Page::potensiUnggulan');
$routes->get('/informasiKepemilikanTanah', 'Page::informasiKepemilikanTanah');

//Admin
$routes->get('/admin', 'Admin::dashboard');
$routes->get('/adminProfilDesa', 'Admin::profilDesa');
$routes->get('/adminProfilUmum', 'Admin::profilUmum');
$routes->get('/adminProfilRawanBencana', 'Admin::profilRawanBencana');
$routes->get('/adminProfilSaranaPrasarana', 'Admin::profilSarana');
$routes->get('/adminProfilKelembagaan', 'Admin::profilKelembagaan');
$routes->get('/adminProfilKeamanan', 'Admin::profilKeamanan');
$routes->get('/adminVisiMisi', 'Admin::visiMisi');
$routes->get('/adminPemerintahDesa', 'Admin::pemerintahDesa');
$routes->get('/adminPKK', 'Admin::pkk');
$routes->get('/adminDasawisma', 'Admin::dasawisma');
$routes->get('/adminLPM', 'Admin::lpm');
$routes->get('/adminBPD', 'Admin::bpd');
$routes->get('/adminBumdes', 'Admin::bumdes');
$routes->get('/adminWilayahAdministratif', 'Admin::wilayahAdministratif');
$routes->get('/adminPendidikanDalamKK', 'Admin::pendidikanDalamKK');
$routes->get('/adminPendidikanDitempuh', 'Admin::pendidikanDitempuh');
$routes->get('/adminPekerjaan', 'Admin::pekerjaan');
$routes->get('/adminAgama', 'Admin::agama');
$routes->get('/adminJenisKelamin', 'Admin::jenisKelamin');
$routes->get('/adminUmur', 'Admin::umur');
$routes->get('/adminBPJS', 'Admin::bpjs');
$routes->get('/adminBantuanSosial', 'Admin::bantuanSosial');
$routes->get('/adminWargaNegara', 'Admin::wargaNegara');
$routes->get('/adminDetailWarga/(:any)', 'Admin::detailWarga/$1');
$routes->get('/adminProdukHukum', 'Admin::produkHukum');
$routes->get('/adminInformasiPublik', 'Admin::informasiPublik');
$routes->get('/adminArtikel', 'Admin::artikel');
$routes->get('/adminBerita', 'Admin::berita');
$routes->get('/adminGaleri', 'Admin::galeri');
$routes->get('/adminManajemenPengguna', 'Admin::manajemenPengguna');
$routes->get('/adminCarousel', 'Admin::carousel');
$routes->get('/adminKontak', 'Admin::kontak');
$routes->get('/adminDataDesa', 'Admin::dataDesa');
$routes->get('/adminLayananDesa', 'Admin::layananDesa');
$routes->get('/adminPengumuman', 'Admin::pengumuman');
$routes->get('/adminPemberitahuan', 'Admin::pemberitahuan');
$routes->get('/adminKategori', 'Admin::kategori');
$routes->get('/adminDanaDesa', 'Admin::danaDesa');
$routes->get('/adminDanaPelaksanaan', 'Admin::danaPelaksanaan');
$routes->get('/adminDanaPendapatan', 'Admin::danaPendapatan');
$routes->get('/adminDanaPembelanjaan', 'Admin::danaPembelanjaan');
$routes->get('/updateStatusTolak/(:any)', 'Admin::updateStatusTolak/$1');
$routes->get('/adminPotensiUnggulan', 'Admin::potensiUnggulan');
$routes->get('/adminKepemilikanTanah', 'Admin::kepemilikanTanah');
$routes->get('/adminPermohonanInformasi', 'Admin::permohonanInformasi');
$routes->get('/adminInformasiRegulasi', 'Admin::regulasi');
$routes->get('/adminInformasi', 'Admin::informasi');

//form login
$routes->get('/loginAdmin', 'Admin::admin');
$routes->get('/loginWarga', 'Menu::login');
$routes->get('/lupaPassword', 'Admin::lupaPassword');
$routes->get('/formTambahWarga', 'Form::formTambahWarga');
$routes->get('/formTambahWargaEdit/(:any)', 'Form::formTambahWargaEdit/$1');

//hapus
$routes->get('/hapusAkun/(:any)', 'ProsesPengguna::hapusAkun/$1');
$routes->get('/hapusCarousel/(:any)', 'ProsesTambahCarousel::hapusCarousel/$1');
$routes->get('/hapusAnggotaPemerintah/(:any)', 'ProsesTambahPemerintahDesa::hapusAnggotaPemerintah/$1');
$routes->get('/hapusAnggotaPKK/(:any)', 'ProsesTambahPKK::hapusAnggotaPKK/$1');
$routes->get('/hapusAnggotaLPM/(:any)', 'ProsesTambahLPM::hapusAnggotaLPM/$1');
$routes->get('/hapusAnggotaBPD/(:any)', 'ProsesTambahBPD::hapusAnggotaBPD/$1');
$routes->get('/hapusAnggotaBumdes/(:any)', 'ProsesAnggotaBumdes::hapusAnggotaBumdes/$1');
$routes->get('/hapusProdukHukum/(:any)', 'ProsesTambahProdukHukum::hapusProdukHukum/$1');
$routes->get('/hapusInformasiPublik/(:any)', 'ProsesTambahInformasiPublik::hapusInformasiPublik/$1');
$routes->get('/hapusArtikel/(:any)', 'ProsesTambahArtikel::hapusArtikel/$1');
$routes->get('/hapusBerita/(:any)', 'ProsesTambahBerita::hapusBerita/$1');
$routes->get('/hapusGaleri/(:any)', 'ProsesGaleri::hapusGaleri/$1');
$routes->get('/hapusWarga/(:any)', 'ProsesTambahWarga::hapusWarga/$1');
$routes->get('/hapusDusun/(:any)', 'ProsesTambahDusun::hapusDusun/$1');
$routes->get('/hapusPengumuman/(:any)', 'ProsesTambahPengumuman::hapusPengumuman/$1');
$routes->get('/hapusKategori/(:any)', 'ProsesTambahKategori::hapusKategori/$1');
$routes->get('/hapusDanaPendapatan/(:any)', 'ProsesTambahPendapatan::hapusDanaPendapatan/$1');
$routes->get('/hapusDanaPembelanjaan/(:any)', 'ProsesTambahPembelanjaan::hapusDanaPembelanjaan/$1');
$routes->get('/hapusPotensi/(:any)', 'ProsesTambahPotensi::HapusPotensi/$1');
$routes->get('/hapusPemilikTanah/(:any)', 'ProsesTambahPemilikTanah::HapusPemilikTanah/$1');
$routes->get('/hapusDasawisma/(:any)', 'ProsesTambahDasawisma::HapusDasawisma/$1');
$routes->get('/hapusPermohonan/(:any)', 'ProsesTambahPermohonanPelayanan::hapusPelayanan/$1');
$routes->get('/prosesPermohonan/(:any)', 'ProsesTambahPermohonanPelayanan::prosesPelayanan/$1');
$routes->get('/selesaiPermohonan/(:any)', 'ProsesTambahPermohonanPelayanan::selesaiPelayanan/$1');
$routes->get('/hapusPermohonanInformasi/(:any)', 'ProsesTambahPermohonanInformasi::hapusPermohonanInformasi/$1');
$routes->get('/hapusRegulasi/(:any)', 'ProsesTambahInformasiRegulasi::hapusRegulasi/$1');
$routes->get('/hapusInformasi/(:any)', 'ProsesTambahInformasi::hapusInformasi/$1');

//edit
$routes->resource('ProsesEditPengguna');
$routes->resource('ProsesEditTambahLPM');
$routes->resource('ProsesEditTambahBPD');
$routes->resource('ProsesEditTambahBumdes');
$routes->resource('ProsesEditProfilDesa');
$routes->resource('ProsesEditTambahProfilTataGunaLahan');
$routes->resource('ProsesEditTambahProfilProduksi');
$routes->resource('ProsesEditTambahProfilRawanBencana');
$routes->resource('ProsesEditTambahProfilOrbitasi');
$routes->resource('ProsesEditTambahProfilKantorDesa');
$routes->resource('ProsesEditTambahProfilKesehatan');
$routes->resource('ProsesEditTambahProfilPendidikan');
$routes->resource('ProsesEditTambahProfilPeribadatan');
$routes->resource('ProsesEditTambahProfilTransportasi');
$routes->resource('ProsesEditTambahProfilAirBersih');
$routes->resource('ProsesEditTambahProfilIrigasi');
$routes->resource('ProsesEditTambahProfilSanitasi');
$routes->resource('ProsesEditTambahProfilOlahraga');
$routes->resource('ProsesEditTambahProfilKelembagaan');
$routes->resource('ProsesEditTambahProfilAdat');
$routes->resource('ProsesEditTambahProfilKeamanan');
$routes->resource('ProsesEditKontak');
$routes->resource('ProsesEditTambahProdukHukum');
$routes->resource('ProsesEditTambahInformasiPublik');
$routes->resource('ProsesEditBerita');
$routes->resource('ProsesEditTambahArtikel');
$routes->resource('ProsesEditGaleri');
$routes->resource('ProsesEditWarga');
$routes->resource('ProsesEditDataDesa');
$routes->resource('ProsesEditKategori');
$routes->resource('ProsesEditTambahPengumuman');
$routes->resource('ProsesEditTambahPemberitahuan');
$routes->resource('ProsesEditTambahProfilDesa');
$routes->resource('ProsesEditTambahVisiMisi');
$routes->resource('ProsesEditTambahSejarah');
$routes->resource('ProsesEditPendapatan');
$routes->resource('ProsesEditPembelanjaan');
$routes->resource('ProsesEditTambahPotensi');
$routes->resource('ProsesEditTambahPemerintahDesa');
$routes->resource('ProsesEditTambahPKK');
$routes->resource('ProsesEditTambahPermohonanInformasi');
$routes->resource('ProsesEditTambahInformasiRegulasi');
$routes->resource('ProsesEditTambahInformasi');

//Proses
$routes->resource('ProsesLogin');
$routes->resource('ProsesLoginWarga');
$routes->resource('ProsesLupaPassword');
$routes->get('/keluar', 'ProsesLogout::logout');
$routes->resource('ProsesPengguna');
$routes->resource('ProsesTambahPemerintahDesa');
$routes->resource('ProsesTambahPKK');
$routes->resource('ProsesTambahLPM');
$routes->resource('ProsesTambahBPD');
$routes->resource('ProsesTambahBumdes');
$routes->resource('ProsesTambahWarga');
$routes->resource('ProsesTambahDusun');
$routes->resource('ProsesTambahCarousel');
$routes->resource('ProsesTambahProdukHukum');
$routes->resource('ProsesTambahInformasiPublik');
$routes->resource('ProsesTambahArtikel');
$routes->resource('ProsesTambahBerita');
$routes->resource('ProsesTambahSejarah');
$routes->resource('ProsesGaleri');
$routes->resource('ProsesRubahTema');
$routes->resource('ProsesUploadCSV');
$routes->resource('ProsesPermohonan');
$routes->resource('ProsesUploadSurat');
$routes->resource('ProsesTambahPengumuman');
$routes->resource('ProsesTambahPemberitahuan');
$routes->resource('ProsesTambahProfilDesa');
$routes->resource('ProsesTambahProfilTataGunaLahan');
$routes->resource('ProsesTambahProfilProduksi');
$routes->resource('ProsesTambahProfilRawanBencana');
$routes->resource('ProsesTambahProfilOrbitasi');
$routes->resource('ProsesTambahProfilKantorDesa');
$routes->resource('ProsesTambahProfilKesehatan');
$routes->resource('ProsesTambahProfilPendidikan');
$routes->resource('ProsesTambahProfilPeribadatan');
$routes->resource('ProsesTambahProfilTransportasi');
$routes->resource('ProsesTambahProfilAirBersih');
$routes->resource('ProsesTambahProfilIrigasi');
$routes->resource('ProsesTambahProfilSanitasi');
$routes->resource('ProsesTambahProfilOlahraga');
$routes->resource('ProsesTambahProfilKelembagaan');
$routes->resource('ProsesTambahProfilAdat');
$routes->resource('ProsesTambahProfilKeamanan');
$routes->resource('ProsesTambahKategori');
$routes->resource('ProsesGantiPassword');
$routes->resource('ProsesTambahPendapatan');
$routes->resource('ProsesTambahPembelanjaan');
$routes->resource('ProsesKritikSaran');
$routes->resource('ProsesTambahPotensi');
$routes->resource('ProsesTambahVisiMisi');
$routes->resource('ProsesTambahDasawisma');
$routes->resource('ProsesTambahPemilikTanah');
$routes->resource('ProsesTambahPermohonanPelayanan');
$routes->resource('ProsesPencarianSuratTanah');
$routes->resource('ProsesTambahPermohonanInformasi');
$routes->resource('ProsesTambahInformasiRegulasi');
$routes->resource('ProsesTambahInformasi');
$routes->get('/defaultTema', 'Admin::defaultTema');
$routes->get('/belumValidasiArtikel/(:any)', 'ProsesTambahArtikel::belumValidasi/$1');
$routes->get('/sudahValidasiArtikel/(:any)', 'ProsesTambahArtikel::sudahValidasi/$1');
$routes->get('/belumValidasiBerita/(:any)', 'ProsesTambahBerita::belumValidasi/$1');
$routes->get('/sudahValidasiBerita/(:any)', 'ProsesTambahBerita::sudahValidasi/$1');
$routes->get('/belumValidasiGaleri/(:any)', 'ProsesGaleri::belumValidasi/$1');
$routes->get('/sudahValidasiGaleri/(:any)', 'ProsesGaleri::sudahValidasi/$1');
$routes->get('/resetPassword/(:any)', 'ProsesGantiPassword::resetPassword/$1');


//dowload
$routes->get('/downloadProdukHukum/(:any)', 'Admin::downloadProdukHukum/$1');
$routes->get('/downloadInformasiPublik/(:any)', 'Admin::downloadInformasiPublik/$1');
$routes->get('/downloadFormatCSV', 'Admin::downloadFormatCSV');
$routes->get('/downloadContohFormat', 'Admin::downloadContohFormat');
$routes->get('/downloadTataCaraUploadVideo', 'Admin::downloadTataCaraUploadVideo');
$routes->get('/downloadBerkasPermohonan/(:any)', 'Admin::downloadBerkasPermohonan/$1');
$routes->get('/downloadSurat/(:any)', 'Admin::downloadSurat/$1');
$routes->get('/downloadBerkasPemilikTanah/(:any)', 'Admin::downloadBerkasPemilikTanah/$1');
$routes->get('/downloadInformasiRegulasi/(:any)', 'Admin::downloadInformasiRegulasi/$1');
$routes->get('/downloadInformasi/(:any)', 'Admin::downloadInformasi/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
