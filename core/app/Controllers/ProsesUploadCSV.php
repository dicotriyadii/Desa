<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Model_warga;
use App\Models\Model_log;


class ProsesUploadCSV extends BaseController
{
    public function create()
    {
        $session = session();
        $warga                  = new Model_warga();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $file_excel             = $this->request->getFile('file');
        $ext                    = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $jumlahData = count($data);
            if ($jumlahData > 0) {
                foreach ($data as $d) {
                    $result[] = array(
                        "namaWarga"                 => $d[1],
                        "nomorIndukKependudukan"    => $d[2],
                        "nomorKartuKeluarga"        => $d[3],
                        "jenisKelamin"              => $d[4],
                        "tempatLahir"               => $d[5],
                        "tanggalLahir"              => $d[6],
                        "umur"                      => $d[7],
                        "agama"                     => $d[8],
                        "alamat"                    => $d[9],
                        "kodeKecamatan"             => $kodeKecamatanLog,
                        "kodeDesa"                  => $kodeDesaLog,
                        "kodeDusun"                 => $d[10],
                        "pendidikanTerakhir"        => $d[11],
                        "pendidikanDitempuh"        => $d[12],
                        "pekerjaan"                 => $d[13],
                        "golDarah"                  => $d[14],
                        "statusKawin"               => $d[15],
                        "RT"                        => $d[16],
                        "RW"                        => $d[17],
                        "statusKeluarga"            => $d[18],
                        "status"                    => $d[19],
                        "bpjs"                      => $d[20],
                        "penghasilan"               => $d[21],
                        "noTelpon"                  => $d[22],
                    );
                }
                for ($i = 0; $i < $jumlahData; $i++) {
                    $warga->insert($result[$i]);
                }
            }
        } else if ($ext == 'xlsx') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $jumlahData = count($data);
            if ($jumlahData > 0) {
                foreach ($data as $d) {
                    $result[] = array(
                        "namaWarga"                 => $d[0],
                        "nomorIndukKependudukan"    => $d[1],
                        "nomorKartuKeluarga"        => $d[2],
                        "jenisKelamin"              => $d[3],
                        "tempatLahir"               => $d[4],
                        "tanggalLahir"              => $d[5],
                        "umur"                      => $d[6],
                        "agama"                     => $d[7],
                        "alamat"                    => $d[8],
                        "kodeKecamatan"             => $kodeKecamatanLog,
                        "kodeDesa"                  => $kodeDesaLog,
                        "kodeDusun"                 => $d[9],
                        "pendidikanTerakhir"        => $d[10],
                        "pendidikanDitempuh"        => $d[11],
                        "pekerjaan"                 => $d[12],
                        "golDarah"                  => $d[13],
                        "statusKawin"               => $d[14],
                        "RT"                        => $d[15],
                        "RW"                        => $d[16],
                        "statusKeluarga"            => $d[17],
                        "status"                    => $d[18],
                        "bpjs"                      => $d[19],
                        "penghasilan"               => $d[20],
                        "noTelpon"                  => $d[21],
                    );
                }
                for ($i = 0; $i < $jumlahData; $i++) {
                    $warga->insert($result[$i]);
                }
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
                        "namaWarga"                 => $d[0],
                        "nomorIndukKependudukan"    => $d[1],
                        "nomorKartuKeluarga"        => $d[2],
                        "jenisKelamin"              => $d[3],
                        "tempatLahir"               => $d[4],
                        "tanggalLahir"              => $d[5],
                        "umur"                      => $d[6],
                        "agama"                     => $d[7],
                        "alamat"                    => $d[8],
                        "kodeKecamatan"             => $kodeKecamatanLog,
                        "kodeDesa"                  => $kodeDesaLog,
                        "kodeDusun"                 => $d[9],
                        "pendidikanTerakhir"        => $d[10],
                        "pendidikanDitempuh"        => $d[11],
                        "pekerjaan"                 => $d[12],
                        "golDarah"                  => $d[13],
                        "statusKawin"               => $d[14],
                        "RT"                        => $d[15],
                        "RW"                        => $d[16],
                        "statusKeluarga"            => $d[17],
                        "status"                    => $d[18],
                        "bpjs"                      => $d[19],
                        "penghasilan"               => $d[20],
                        "noTelpon"                  => $d[21]
                    );
                    $jumlah++;
                }
                for ($i = 0; $i < $jumlah; $i++) {
                    $warga->insert($result[$i]);
                }
            }
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Menambah data Warga secara banyak',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Data warga baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url('adminWargaNegara'));
    }
}
