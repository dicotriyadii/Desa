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
        if($ext == 'xls') {
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
                for($i=0;$i<$jumlahData;$i++){
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
                    'keterangan'    => "Data Kumpulan Anggota baru berhasil di tambah"
                ];
                $session->set($ses_data);
            }
        }else if( $ext == 'xlsx'){
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
                        "tanggalLahir" => $d[4],
                        "umur" => $d[5],
                        "agama" => $d[6],
                        "alamat" => $d[7],
                        "dusun" => $d[8],
                        "desa" => $d[9],
                        "kecamatan" => $d[10],
                        "pendidikanTerakhir" => $d[11],
                        "pendidikanDitempuh" => $d[12],
                        "pekerjaan" => $d[13],
                        "golDarah" => $d[14],
                        "statusKawin" => $d[15],
                        "RT" => $d[16],
                        "RW" => $d[17],
                        "statusKeluarga" => $d[18],
                        "status" => $d[19],
                        "bpjs" => $d[20],
                        "penghasilan" => $d[21],
                    );
                }
                for($i=0;$i<$jumlahData;$i++){
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
        }else{
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
                        "tanggalLahir" => $data[4],
                        "umur" => $data[5],
                        "agama" => $data[6],
                        "alamat" => $data[7],
                        "dusun" => $data[8],
                        "desa" => $data[9],
                        "kecamatan" => $data[10],
                        "pendidikanTerakhir" => $data[11],
                        "pendidikanDitempuh" => $data[12],
                        "pekerjaan" => $data[13],
                        "golDarah" => $data[14],
                        "statusKawin" => $data[15],
                        "RT" => $data[16],
                        "RW" => $data[17],
                        "statusKeluarga" => $data[18],
                        "status" => $data[19],
                        "bpjs" => $data[20],
                        "penghasilan" => $data[21],

                    );
                    $jumlah++;
                }
                for($i=0;$i<$jumlah;$i++){
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
