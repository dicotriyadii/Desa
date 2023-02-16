<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('catatanKeluarga/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                    <div class="invalid-feedback error_tgl">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Induk Kependudukan</label>
                    <select name="nik" id="nik" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($nik as $n) : ?>
                            <?php if ($n['dusun'] == $dusun) : ?>
                                <option value="<?= $n['nomorIndukKependudukan'] ?>"><?= $n['namaWarga'] ?> , <?= $n['jenisKelamin'] ?> , <?= $n['alamat'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_nik">
                    </div>
                </div>

                <div class="form-group">
                    <label>Berkebutuhan Khusus</label>
                    <input type="text" class="form-control" id="berkebutuhan_khusus" name="berkebutuhan_khusus">
                    <div class="invalid-feedback error_berkebutuhan_khusus">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kriteria Rumah</label>
                    <select name="kriteria_rumah" id="kriteria_rumah" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($kriteria_rumah as $kr) : ?>
                            <option value="<?= $kr['id'] ?>"><?= $kr['jenis_kriteria_rumah'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_kriteria_rumah">
                    </div>
                </div>

                <div class="form-group">
                    <label>Sumber Air Keluarga</label>
                    <select name="sumber_air" id="sumber_air" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($sumber_air as $sa) : ?>
                            <option value="<?= $sa['id'] ?>"><?= $sa['jenis_sumber_air'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_sumber_air">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tempat Sampah</label>
                    <select name="tempat_sampah" id="tempat_sampah" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($tempat_sampah as $ts) : ?>
                            <option value="<?= $ts['id'] ?>"><?= $ts['jenis_tempat_sampah'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_tempat_sampah">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jenis Kegiatan</label>
                    <select name="jenis_kegiatan_id" id="jenis_kegiatan_id" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($jenis_kegiatan as $jk) : ?>
                            <option value="<?= $jk['id'] ?>"><?= $jk['jenis_kegiatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_jenis_kegiatan_id">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                    <div class="invalid-feedback error_nama_kegiatan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Makanan Pokok</label>
                    <select name="makanan_pokok" id="makanan_pokok" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($makanan_pokok as $mp) : ?>
                            <option value="<?= $mp['id'] ?>"><?= $mp['makanan_pokok'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_makanan_pokok">
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan Kegiatan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                    <div class="invalid-feedback error_keterangan">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('select').each(function() {
            $(this).select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
                closeOnSelect: !$(this).attr('multiple'),
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.formtambah').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.tgl) {
                            $('#tgl').addClass('is-invalid');
                            $('.error_tgl').html(response.error.tgl);
                        } else {
                            $('#tgl').removeClass('is-invalid');
                            $('.error_tgl').html('');
                        }

                        if (response.error.nik) {
                            $('#nik').addClass('is-invalid');
                            $('.error_nik').html(response.error.nik);
                        } else {
                            $('#nik').removeClass('is-invalid');
                            $('.error_nik').html('');
                        }

                        if (response.error.berkebutuhan_khusus) {
                            $('#berkebutuhan_khusus').addClass('is-invalid');
                            $('.error_berkebutuhan_khusus').html(response.error.berkebutuhan_khusus);
                        } else {
                            $('#berkebutuhan_khusus').removeClass('is-invalid');
                            $('.error_berkebutuhan_khusus').html('');
                        }

                        if (response.error.kriteria_rumah) {
                            $('#kriteria_rumah').addClass('is-invalid');
                            $('.error_kriteria_rumah').html(response.error.kriteria_rumah);
                        } else {
                            $('#kriteria_rumah').removeClass('is-invalid');
                            $('.error_kriteria_rumah').html('');
                        }

                        if (response.error.sumber_air) {
                            $('#sumber_air').addClass('is-invalid');
                            $('.error_sumber_air').html(response.error.sumber_air);
                        } else {
                            $('#sumber_air').removeClass('is-invalid');
                            $('.error_sumber_air').html('');
                        }

                        if (response.error.tempat_sampah) {
                            $('#tempat_sampah').addClass('is-invalid');
                            $('.error_tempat_sampah').html(response.error.tempat_sampah);
                        } else {
                            $('#tempat_sampah').removeClass('is-invalid');
                            $('.error_tempat_sampah').html('');
                        }

                        if (response.error.jenis_kegiatan_id) {
                            $('#jenis_kegiatan_id').addClass('is-invalid');
                            $('.error_jenis_kegiatan_id').html(response.error.jenis_kegiatan_id);
                        } else {
                            $('#jenis_kegiatan_id').removeClass('is-invalid');
                            $('.error_jenis_kegiatan_id').html('');
                        }

                        if (response.error.nama_kegiatan) {
                            $('#nama_kegiatan').addClass('is-invalid');
                            $('.error_nama_kegiatan').html(response.error.nama_kegiatan);
                        } else {
                            $('#nama_kegiatan').removeClass('is-invalid');
                            $('.error_nama_kegiatan').html('');
                        }

                        if (response.error.makanan_pokok) {
                            $('#makanan_pokok').addClass('is-invalid');
                            $('.error_makanan_pokok').html(response.error.makanan_pokok);
                        } else {
                            $('#makanan_pokok').removeClass('is-invalid');
                            $('.error_makanan_pokok').html('');
                        }

                        if (response.error.keterangan) {
                            $('#keterangan').addClass('is-invalid');
                            $('.error_keterangan').html(response.error.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid');
                            $('.error_keterangan').html('');
                        }

                        if (response.error.data) {
                            Swal.fire({
                                title: "Gagal!",
                                text: response.error.data,
                                icon: "warning",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#modaltambah').modal('hide');
                            listcatatankeluarga();
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaltambah').modal('hide');
                        listcatatankeluarga();
                    }
                }
            });
        })
    });
</script>