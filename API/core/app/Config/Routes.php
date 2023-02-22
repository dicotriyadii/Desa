<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->resource('ProsesSuratDomisili');

// Proses
$routes->resource('LoginWarga');
$routes->resource('LoginAdmin');
$routes->resource('PermohonanSurat');
$routes->resource('StatusPermohonan');
$routes->resource('PersetujuanSurat');
$routes->resource('PenomoranSurat');
$routes->resource('Profile');
$routes->resource('DaftarPermohonan');
$routes->resource('DaftarPenomoran');
//Cetak Surat
$routes->get('/ProsesSurat/(:any)/(:any)', 'ProsesSurat::surat/$1/$2');
$routes->get('/DownloadBerkas/(:any)', 'PermohonanSurat::DownloadBerkas/$1');

// API DasaWisma
$routes->resource('LoginDasaWisma');
$routes->resource('dasawisma');
$routes->resource('kegiatanPKK');
$routes->resource('kriteriaRumah');
$routes->resource('sumberAirKeluarga');
$routes->resource('makananPokok');
$routes->resource('tempatSampah');
$routes->resource('CatatanKeluarga');
$routes->resource('inventaris');
$routes->resource('pengeluaranKeuangan');
$routes->resource('pemasukkanKeuangan');
$routes->resource('CatatanStatusIbu');
$routes->resource('kodeDesa');
$routes->resource('kodeKecamatan');
$routes->resource('kodeDusun');
$routes->resource('TambahMakananPokok');
$routes->resource('TambahSumberAirKeluarga');
$routes->resource('TambahKriteriaRumah');
$routes->resource('TambahKegiatanPKK');
$routes->resource('TambahTempatSampah');
$routes->resource('TambahAnggotaDasawisma');
$routes->resource('HapusAnggotaDasawisma');
$routes->resource('DataAnggotaPKK');
$routes->resource('DataInventaris');
$routes->resource('DataPemasukkanKeuangan');
$routes->resource('DataPengeluaranKeuangan');
$routes->resource('DataStatusIbu');
$routes->resource('DataStatusIbuBayiMeninggal');
$routes->resource('DataStatusKeluarga');
$routes->resource('DataDasaWisma');
$routes->resource('DataAnggotaDasawisma');

// Layanan Surat
$routes->resource('APILoginAdmin');
$routes->resource('APIAgama');
$routes->resource('APIJenisKelamin');
$routes->resource('APIPekerjaan');
$routes->resource('APIPendidikanDitempuh');
$routes->resource('APIPendidikanTerakhir');
$routes->resource('APIUmur');
$routes->resource('APIUser');
$routes->resource('APIWarga');
$routes->resource('APIWilayahAdministratif');
$routes->resource('APIPermohonanSurat');

// Get Detail
// $routes->get('/APIWarga/(:any)', 'APIWarga::detail/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
