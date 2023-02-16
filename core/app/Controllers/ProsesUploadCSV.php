<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Model_pekerjaan;
use App\Models\Model_dusun;
use App\Models\Model_pendidikanTerakhir;
use App\Models\Model_pendidikanDitempuh;
use App\Models\Model_agama;
use App\Models\Model_desa;
use App\Models\Model_warga;
use App\Models\Model_log;


class ProsesUploadCSV extends BaseController
{
    public function create()
    {
        $session = session();
        $warga          = new Model_warga();
        $log            = new Model_log();
        $file_excel     = $this->request->getFile('file');
        $ext            = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $jumlahData = count($data);
            if ($jumlahData > 0) {
                foreach ($data as $d) {
                    $result[] = array(
                        "namaWarga" => $d[1],
                        "nomorIndukKependudukan" => $d[2],
                        "nomorKartuKeluarga" => $d[3],
                        "jenisKelamin" => $d[4],
                        "tempatLahir" => $d[5],
                        "tanggalLahir" => $d[6],
                        "umur" => $d[7],
                        "agama" => $d[8],
                        "alamat" => $d[9],
                        "dusun" => $d[10],
                        "desa" => $d[11],
                        "kecamatan" => $d[12],
                        "pendidikanTerakhir" => $d[13],
                        "pendidikanDitempuh" => $d[14],
                        "pekerjaan" => $d[15],
                        "golDarah" => $d[16],
                        "statusKawin" => $d[17],
                        "RT" => $d[18],
                        "RW" => $d[19],
                        "statusKeluarga" => $d[20],
                        "status" => $d[21],
                        "bpjs" => $d[22],
                        "penghasilan" => $d[23]
                    );
                }
                for ($i = 0; $i < $jumlahData; $i++) {
                    $warga->insert($result[$i]);
                }
                $dataLog = [
                    'nama'          => $session->get('nama'),
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'menambah anggota Pemerintah secara banyak',
                    'hakAkses'      => $session->get('hakAkses'),
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'statusTambah'  => "Berhasil",
                    'keterangan'    => "Data kumpulan Anggota baru berhasil di tambah"
                ];
                $session->set($ses_data);
            }
        } else if ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $jumlahData = count($data);
            if ($jumlahData > 0) {
                foreach ($data as $d) {
                    $result[] = array(
                        "namaWarga" => $d[0],
                        "nomorIndukKependudukan" => $d[1],
                        "nomorKartuKeluarga" => $d[2],
                        "jenisKelamin" => $d[3],
                        "tempatLahir" => $d[4],
                        "tanggalLahir" => $d[5],
                        "umur" => $d[6],
                        "agama" => $d[7],
                        "alamat" => $d[8],
                        "dusun" => $d[9],
                        "desa" => $d[10],
                        "kecamatan" => $d[11],
                        "pendidikanTerakhir" => $d[12],
                        "pendidikanDitempuh" => $d[13],
                        "pekerjaan" => $d[14],
                        "golDarah" => $d[15],
                        "statusKawin" => $d[16],
                        "RT" => $d[17],
                        "RW" => $d[18],
                        "statusKeluarga" => $d[19],
                        "status" => $d[20],
                        "bpjs" => $d[21],
                        "penghasilan" => $d[22],
                    );
                }
                for ($i = 0; $i < $jumlahData; $i++) {
                    $warga->insert($result[$i]);
                }
                $dataLog = [
                    'nama'          => $session->get('nama'),
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'menambah anggota Pemerintah secara banyak',
                    'hakAkses'      => $session->get('hakAkses'),
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'statusTambah'  => "Berhasil",
                    'keterangan'    => "Data kumpulan Anggota baru berhasil di tambah"
                ];
                $session->set($ses_data);
            }
        } else {
            $file = $this->request->getFile("file");
            $file_name = $file->getTempName();
            $result = array();
            $csv_data = array_map('str_getcsv', file($file_name));
            $jumlah = count($csv_data);
            if (count($csv_data) > 0) {
                $jumlah = 0;
                foreach ($csv_data as $data) {
                    $result[] = array(
                        "namaWarga" => $data[0],
                        "nomorIndukKependudukan" => $data[1],
                        "nomorKartuKeluarga" => $data[2],
                        "jenisKelamin" => $data[3],
                        "tempatLahir" => $data[4],
                        "tanggalLahir" => $data[5],
                        "umur" => $data[6],
                        "agama" => $data[7],
                        "alamat" => $data[8],
                        "dusun" => $data[9],
                        "desa" => $data[10],
                        "kecamatan" => $data[11],
                        "pendidikanTerakhir" => $data[12],
                        "pendidikanDitempuh" => $data[13],
                        "pekerjaan" => $data[14],
                        "golDarah" => $data[15],
                        "statusKawin" => $data[16],
                        "RT" => $data[17],
                        "RW" => $data[18],
                        "statusKeluarga" => $data[19],
                        "status" => $data[20],
                        "bpjs" => $data[21],
                        "penghasilan" => $data[22],
                    );
                    $jumlah++;
                }
                for ($i = 0; $i < $jumlah; $i++) {
                    $warga->insert($result[$i]);
                }
                $dataLog = [
                    'nama'          => $session->get('nama'),
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'menambah anggota Pemerintah secara banyak',
                    'hakAkses'      => $session->get('hakAkses'),
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'statusTambah'  => "Berhasil",
                    'keterangan'    => "Data kumpulan Anggota baru berhasil di tambah"
                ];
                $session->set($ses_data);
            }
        }
        return redirect()->to(base_url('adminWargaNegara'));
    }
}
