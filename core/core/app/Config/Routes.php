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
$routes->get('/', 'Menu::landingPage');
$routes->get('/profilWilayahDesa', 'Menu::profilWilayahDesa');
$routes->get('/sejarahDesa', 'Menu::sejarahDesa');
$routes->get('/visiMisi', 'Menu::visiMisi');
$routes->get('/pemerintahDesa', 'Menu::pemerintahDesa');
$routes->get('/pkk', 'Menu::pkk');
$routes->get('/lpm', 'Menu::lpm');
$routes->get('/dataWilayahAdministrasi', 'Menu::dataWilayahAdministrasi');
$routes->get('/dataPendidikanDalamKK', 'Menu::dataPendidikanDalamKK');
$routes->get('/dataPendidikanDitempuh', 'Menu::dataPendidikanDitempuh');
$routes->get('/dataPekerjaan', 'Menu::dataPekerjaan');
$routes->get('/dataAgama', 'Menu::dataAgama');
$routes->get('/dataJenisKelamin', 'Menu::dataJenisKelamin');
$routes->get('/dataWargaNegara', 'Menu::dataWargaNegara');
$routes->get('/dataBPJS', 'Menu::dataBPJS');
$routes->get('/dataBansos', 'Menu::dataBansos');
$routes->get('/produkHukum', 'Menu::produkHukum');
$routes->get('/informasiPublik', 'Menu::informasiPublik');
$routes->get('/petaDesa', 'Menu::petaDesa');
$routes->get('/artikel', 'Menu::artikel');
$routes->get('/detailArtikel/(:any)', 'Menu::detailArtikel/$1');
$routes->get('/berita', 'Menu::berita');
$routes->get('/beritaFilter/(:any)', 'Menu::beritaFilter/$1');
$routes->get('/detailBerita/(:any)', 'Menu::detailBerita/$1');
$routes->get('/galeri', 'Menu::galeri');
$routes->get('/permohonanSurat', 'Menu::permohonanSurat');
$routes->get('/daftarPermohonan', 'Menu::daftarPermohonan');
$routes->get('/profile/(:any)', 'Menu::profile/$1');
$routes->get('/danaDesa', 'Menu::danaDesa');
$routes->get('/pengumuman', 'Menu::pengumuman');

//Admin
$routes->get('/admin', 'Admin::dashboard');
$routes->get('/adminProfilWilayahDesa', 'Admin::profilWilayahDesa');
$routes->get('/adminSejarahDesa', 'Admin::sejarahDesa');
$routes->get('/adminVisiMisi', 'Admin::visiMisi');
$routes->get('/adminPemerintahDesa', 'Admin::pemerintahDesa');
$routes->get('/adminPKK', 'Admin::pkk');
$routes->get('/adminLPM', 'Admin::lpm');
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
$routes->get('/adminGaleriFoto', 'Admin::galeriFoto');
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

//form login
$routes->get('/loginAdmin', 'Admin::admin');
$routes->get('/loginWarga', 'Menu::login');
$routes->get('/lupaPassword', 'Admin::lupaPassword');

//form Admin
$routes->get('/formPengguna', 'Form::formPengguna');
$routes->get('/formTambahWarga', 'Form::formTambahWarga');
$routes->get('/formTambahDusun', 'Form::formTambahDusun');
$routes->get('/formCarousel', 'Form::formTambahCarousel');
$routes->get('/formAnggotaPemerintah', 'Form::formAnggotaPemerintah');
$routes->get('/formAnggotaPKK', 'Form::formAnggotaPKK');
$routes->get('/formAnggotaLPM', 'Form::formAnggotaLPM');
$routes->get('/formProdukHukum', 'Form::formProdukHukum');
$routes->get('/formArtikel', 'Form::formArtikel');
$routes->get('/formBerita', 'Form::formBerita');
$routes->get('/formGaleri', 'Form::formGaleri');
$routes->get('/formInformasiPublik', 'Form::formInformasiPublik');
$routes->get('/formRubahTema', 'Form::formRubahTema');
$routes->get('/editAkun/(:any)', 'Form::formEditPengguna/$1');
$routes->get('/editAnggotaPemerintah/(:any)', 'Form::formEditAnggotaPemerintah/$1');
$routes->get('/editAnggotaPKK/(:any)', 'Form::formEditAnggotaPKK/$1');
$routes->get('/editAnggotaLPM/(:any)', 'Form::formEditAnggotaLPM/$1');
$routes->get('/editProfilDesa/(:any)', 'Form::formEditProfilDesa/$1');
$routes->get('/editSejarahDesa/(:any)', 'Form::formEditSejarahDesa/$1');
$routes->get('/editKontak/(:any)', 'Form::formEditKontak/$1');
$routes->get('/editDataDesa/(:any)', 'Form::formEditDataDesa/$1');
$routes->get('/editProdukHukum/(:any)', 'Form::formEditProdukHukum/$1');
$routes->get('/editArtikel/(:any)', 'Form::formEditArtikel/$1');
$routes->get('/editBerita/(:any)', 'Form::formEditBerita/$1');
$routes->get('/editGaleri/(:any)', 'Form::formEditGaleri/$1');
$routes->get('/editInformasiPublik/(:any)', 'Form::formEditInformasiPublik/$1');
$routes->get('/editVisiMisi/(:any)', 'Form::formEditVisiMisi/$1');
$routes->get('/editWarga/(:any)', 'Form::formEditWarga/$1');

//hapus
$routes->get('/hapusAkun/(:any)', 'ProsesPengguna::hapusAkun/$1');
$routes->get('/hapusCarousel/(:any)', 'ProsesTambahCarousel::hapusCarousel/$1');
$routes->get('/hapusAnggotaPemerintah/(:any)', 'ProsesAnggotaPemerintah::hapusAnggotaPemerintah/$1');
$routes->get('/hapusAnggotaPKK/(:any)', 'ProsesAnggotaPKK::hapusAnggotaPKK/$1');
$routes->get('/hapusAnggotaLPM/(:any)', 'ProsesAnggotaLPM::hapusAnggotaLPM/$1');
$routes->get('/hapusProdukHukum/(:any)', 'ProsesProdukHukum::hapusProdukHukum/$1');
$routes->get('/hapusInformasiPublik/(:any)', 'ProsesInformasiPublik::hapusInformasiPublik/$1');
$routes->get('/hapusArtikel/(:any)', 'ProsesArtikel::hapusArtikel/$1');
$routes->get('/hapusBerita/(:any)', 'ProsesBerita::hapusBerita/$1');
$routes->get('/hapusGaleri/(:any)', 'ProsesGaleri::hapusGaleri/$1');
$routes->get('/hapusWarga/(:any)', 'ProsesTambahWarga::hapusWarga/$1');
$routes->get('/hapusDusun/(:any)', 'ProsesTambahDusun::hapusDusun/$1');
$routes->get('/hapusPengumuman/(:any)', 'TambahPengumuman::hapusPengumuman/$1');
$routes->get('/hapusKategori/(:any)', 'ProsesTambahKategori::hapusKategori/$1');
$routes->get('/hapusDanaPendapatan/(:any)', 'ProsesTambahPendapatan::hapusDanaPendapatan/$1');
$routes->get('/hapusDanaPembelanjaan/(:any)', 'ProsesTambahPembelanjaan::hapusDanaPembelanjaan/$1');
//edit
$routes->resource('ProsesEditPengguna');
$routes->resource('ProsesEditAnggotaPemerintah');
$routes->resource('ProsesEditAnggotaPKK');
$routes->resource('ProsesEditAnggotaLPM');
$routes->resource('ProsesEditProfilDesa');
$routes->resource('ProsesEditSejarahDesa');
$routes->resource('ProsesEditVisiMisi');
$routes->resource('ProsesEditKontak');
$routes->resource('ProsesEditProdukHukum');
$routes->resource('ProsesEditInformasiPublik');
$routes->resource('ProsesEditBerita');
$routes->resource('ProsesEditArtikel');
$routes->resource('ProsesEditGaleri');
$routes->resource('ProsesEditWarga');
$routes->resource('ProsesEditDataDesa');
$routes->resource('ProsesEditKategori');
$routes->resource('TambahEditPengumuman');
$routes->resource('TambahEditPemberitahuan');
$routes->resource('ProsesEditPendapatan');
$routes->resource('ProsesEditPembelanjaan');


//Proses
$routes->resource('ProsesLogin');
$routes->resource('ProsesLoginWarga');
$routes->resource('ProsesLupaPassword');
$routes->get('/keluar', 'ProsesLogout::logout');
$routes->resource('ProsesPengguna');
$routes->resource('ProsesAnggotaPemerintah');
$routes->resource('ProsesAnggotaPKK');
$routes->resource('ProsesAnggotaLPM');
$routes->resource('ProsesTambahWarga');
$routes->resource('ProsesTambahDusun');
$routes->resource('ProsesTambahCarousel');
$routes->resource('ProsesProdukHukum');
$routes->resource('ProsesInformasiPublik');
$routes->resource('ProsesArtikel');
$routes->resource('ProsesBerita');
$routes->resource('ProsesGaleri');
$routes->resource('ProsesRubahTema');
$routes->resource('ProsesUploadCSV');
$routes->resource('ProsesPermohonan');
$routes->resource('ProsesUploadSurat');
$routes->resource('TambahPengumuman');
$routes->resource('ProsesTambahKategori');
$routes->resource('ProsesGantiPassword');
$routes->resource('ProsesTambahPendapatan');
$routes->resource('ProsesTambahPembelanjaan');
$routes->resource('ProsesKritikSaran');
$routes->get('/defaultTema', 'Admin::defaultTema');
$routes->get('/belumValidasiArtikel/(:any)', 'ProsesArtikel::belumValidasi/$1');
$routes->get('/sudahValidasiArtikel/(:any)', 'ProsesArtikel::sudahValidasi/$1');
$routes->get('/belumValidasiBerita/(:any)', 'ProsesBerita::belumValidasi/$1');
$routes->get('/sudahValidasiBerita/(:any)', 'ProsesBerita::sudahValidasi/$1');
$routes->get('/belumValidasiGaleri/(:any)', 'ProsesGaleri::belumValidasi/$1');
$routes->get('/sudahValidasiGaleri/(:any)', 'ProsesGaleri::sudahValidasi/$1');
$routes->get('/resetPassword/(:any)', 'ProsesGantiPassword::resetPassword/$1');


//dowload
$routes->get('/downloadProdukHukum/(:any)', 'Admin::downloadProdukHukum/$1');
$routes->get('/downloadInformasiPublik/(:any)', 'Admin::downloadInformasiPublik/$1');
$routes->get('/downloadFormatCSV', 'Admin::downloadFormatCSV');
$routes->get('/downloadBerkasPermohonan/(:any)', 'Admin::downloadBerkasPermohonan/$1');
$routes->get('/downloadSurat/(:any)', 'Admin::downloadSurat/$1');

//API
$routes->resource('APILogin');
$routes->resource('APIWarga');
$routes->resource('APIUser');
$routes->resource('APIWilayahAdministratif');
$routes->resource('APIPendidikanTerakhir');
$routes->resource('APIPendidikanDitempuh');
$routes->resource('APIPekerjaan');
$routes->resource('APIAgama');
$routes->resource('APIJenisKelamin');
$routes->resource('APIUmur');
$routes->resource('APIAuth');



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
