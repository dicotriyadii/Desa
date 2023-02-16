<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>


<div class="container">
    <div class="row">

        <div class="col-md-3 my-4">
            <h5>Daftar Anggota TP PKK</h5>
            <a href="<?= site_url('laporan/daftar_anggota_pkk') ?>" target="_blank" class="btn btn-primary">
                Cetak Daftar Anggota TP PKK</a>
        </div>

    </div>
    <br>
    <hr class="bg-dark my-3">
    <h3>Catatan Keluarga</h3>
    <div class="row">

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_keluarga', ['class' => 'formLaporanCatatanDataKeluarga', 'target' => '_blank', 'method' => 'get']) ?> <div class="col-md-12">

                <div class="form-group">
                    <label>Nama Kepala Keluarga</label>
                    <select name="nama_kepala_keluarga" id="nama_kepala_keluarga" class="form-control" required>
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($nama_kk as $kk) : ?>
                            <?php if ($kk['kode_dasa_wisma'] == $dasa_wisma) : ?>
                                <option value="<?= $kk['nik'] ?>"><?= $kk['namaWarga'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_nama_kepala_keluarga">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_keluarga" name="tgl_mulai_catatan_keluarga" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_keluarga">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_keluarga" name="tgl_akhir_catatan_keluarga" required>
                    <div class="invalid-feedback error_tgl_akhir_catatan_keluarga">
                    </div>
                </div>
                <button class="btn btn-primary btnsimpan">
                    Cetak Laporan Catatan Keluarga</button>
            </div>
            <?= form_close() ?>
        </div>

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_keluarga_kelompok_dasa_wisma', ['class' => 'formLaporanCatatanDataKeluargaKelompokDasaWisma', 'target' => '_blank', 'method' => 'get']) ?>
            <div class="col-md-12">
                <h5>Rekapitulasi Catatan Data dan Kegiatan Warga Kelompok Dasa Wisma</h5>
                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_data_kelompok_dasa_wisma" name="tgl_mulai_catatan_data_kelompok_dasa_wisma" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_data_kelompok_dasa_wisma">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_data_kelompok_dasa_wisma" name="tgl_akhir_catatan_data_kelompok_dasa_wisma" required>
                    <div class="invalid-feedback error_tgl_akhir_catatan_data_kelompok_dasa_wisma">
                    </div>
                </div>
                <button class="btn btn-primary">
                    Cetak Rekapitulasi Catatan Data dan Kegiatan Warga</button>
            </div>
            <?= form_close() ?>
        </div>

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_keluarga_tp_pkk_desa', ['class' => 'formLaporanCatatanDataKeluargaTP_PKK_Desa', 'target' => '_blank', 'method' => 'get']) ?>
            <div class="col-md-12">
                <h5>Rekapitulasi Catatan Data dan Kegiatan Warga TP PKK Desa</h5>
                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_data_tp_pkk_desa" name="tgl_mulai_catatan_data_tp_pkk_desa" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_data_tp_pkk_desa">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan</label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_data_tp_pkk_desa" name="tgl_akhir_catatan_data_tp_pkk_desa" required>
                    <div class="invalid-feedback error_tgl_akhir_catatan_data_tp_pkk_desa">
                    </div>
                </div>
                <button class="btn btn-primary">
                    Cetak Rekapitulasi Catatan Data dan Kegiatan Warga</button>
            </div>
            <?= form_close() ?>
        </div>

    </div>
    <hr class="bg-dark my-3">
    <h3>Catatan Status Ibu</h3>
    <div class="row">

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_status_ibu_kelompok_dasa_wisma', ['class' => 'formLaporanCatatanStatusIbuKelompokDasaWisma', 'target' => '_blank', 'method' => 'get']) ?>
            <div class="col-md-12">
                <h5>Rekapitulasi Data Catatan Status Ibu Kelompok Dasa Wisma</h5>
                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_status_ibu_kelompok_dasa_wisma" name="tgl_mulai_catatan_status_ibu_kelompok_dasa_wisma" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_status_ibu_kelompok_dasa_wisma">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_status_ibu_kelompok_dasa_wisma" name="tgl_akhir_catatan_status_ibu_kelompok_dasa_wisma">
                    <div class="invalid-feedback error_tgl_akhir_catatan_status_ibu_kelompok_dasa_wisma">
                    </div>
                </div>
                <button class="btn btn-primary" required>
                    Cetak Laporan Catatan Status Ibu</button>
            </div>
            <?= form_close() ?>
        </div>

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_status_ibu_tingkat_dusun', ['class' => 'formLaporanCatatanStatusIbuTingkatDusun', 'target' => '_blank', 'method' => 'get']) ?>
            <div class="col-md-12">
                <h5>Rekapitulasi Data Catatan Status Ibu Tingkat Dusun/Lingkungan</h5>
                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_status_ibu_tingkat_dusun" name="tgl_mulai_catatan_status_ibu_tingkat_dusun" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_status_ibu_tingkat_dusun">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_status_ibu_tingkat_dusun" name="tgl_akhir_catatan_status_ibu_tingkat_dusun">
                    <div class="invalid-feedback error_tgl_akhir_catatan_status_ibu_tingkat_dusun">
                    </div>
                </div>
                <button class="btn btn-primary" required>
                    Cetak Laporan Catatan Status Ibu</button>
            </div>
            <?= form_close() ?>
        </div>

        <div class="col-md-4 my-2">
            <?= form_open('laporan/catatan_status_ibu_tingkat_desa', ['class' => 'formLaporanCatatanStatusIbuTingkatDesa', 'target' => '_blank', 'method' => 'get']) ?>
            <div class="col-md-12">
                <h5>Rekapitulasi Data Catatan Status Ibu Tingkat Desa</h5>
                <div class="form-group">
                    <label>Tanggal Mulai Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_mulai_catatan_status_ibu_tingkat_desa" name="tgl_mulai_catatan_status_ibu_tingkat_desa" required>
                    <div class="invalid-feedback error_tgl_mulai_catatan_status_ibu_tingkat_desa">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Tanggal Akhir Pencatatan </label>
                    <input type="date" class="form-control" id="tgl_akhir_catatan_status_ibu_tingkat_desa" name="tgl_akhir_catatan_status_ibu_tingkat_desa" required>
                    <div class="invalid-feedback error_tgl_akhir_catatan_status_ibu_tingkat_desa">
                    </div>
                </div>
                <button class="btn btn-primary" required>
                    Cetak Laporan Catatan Status Ibu</button>
            </div>
            <?= form_close() ?>
        </div>

    </div>
</div>

<?= $this->endSection('isi') ?>