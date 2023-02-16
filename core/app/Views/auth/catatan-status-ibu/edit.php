<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('catatanStatusIbu/proses_edit', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Tanggal Pencatatan</label>
                    <input type="hidden" class="form-control" id="id_kelahiran" name="id_kelahiran" value="<?= $list_kelahiran['id'] ?>">
                    <input type="hidden" class="form-control" id="id_kematian" name="id_kematian" value="<?= $list_kematian['id'] ?>">
                    <?php if ($list_kelahiran['id'] == '') : ?>
                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $list_kematian['tgl'] ?>">
                        <div class="invalid-feedback error_tgl">
                        </div>
                    <?php else : ?>
                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= $list_kelahiran['tgl'] ?>">
                        <div class="invalid-feedback error_tgl">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Nama Ibu</label>
                    <select name="nik_ibu" id="nik_ibu" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <?php foreach ($nik_ibu as $ni) : ?>
                            <?php if ($ni['jenisKelamin'] == 'Perempuan' and $ni['dusun'] == $dusun) : ?>
                                <option value="<?= $ni['nomorIndukKependudukan'] ?>"><?= $ni['namaWarga'] ?> , <?= $ni['alamat'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback error_nik_ibu">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Suami</label>
                    <input type="text" class="form-control" id="nama_suami" name="nama_suami">
                    <div class="invalid-feedback error_nama_suami">
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Bayi</label>
                    <select name="status" id="status" class="form-control">
                        <option Disabled=true Selected=true>PILIH...</option>
                        <option value="1">Catatan Kelahiran</option>
                        <option value="2">Catatan Kematian</option>
                    </select>
                    <div class="invalid-feedback error_status">
                    </div>
                </div>


                <div class="hidup d-none" id="hidup">

                    <div class="form-group">
                        <label>Status Ibu</label>
                        <select name="catatan_status_ibu" id="catatan_status_ibu" class="form-control">
                            <option Disabled=true Selected=true>PILIH...</option>
                            <option value="HAMIL">Hamil</option>
                            <option value="MELAHIRKAN">Melahirkan</option>
                            <option value="NIFAS">Nifas</option>
                        </select>
                        <div class="invalid-feedback error_catatan_status_ibu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Bayi</label>
                        <input type="text" class="form-control" id="nama_bayi" name="nama_bayi">
                        <div class="invalid-feedback error_nama_bayi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Bayi</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option Disabled=true Selected=true>PILIH...</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        <div class="invalid-feedback error_jenis_kelamin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                        <div class="invalid-feedback error_tgl_lahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Akte</label>
                        <input type="text" class="form-control" id="akte" name="akte">
                        <div class="invalid-feedback error_akte">
                        </div>
                    </div>

                </div>

                <div class="meninggal d-none" id="meninggal">

                    <div class="form-group">
                        <label>Status Ibu</label>
                        <select name="catatan_status_ibu_meninggal" id="catatan_status_ibu_meninggal" class="form-control">
                            <option Disabled=true Selected=true>PILIH...</option>
                            <option value="MENINGGAL">Meninggal</option>
                        </select>
                        <div class="invalid-feedback error_catatan_status_ibu_meninggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Bayi</label>
                        <input type="text" class="form-control" id="nama_bayi_meninggal" name="nama_bayi_meninggal">
                        <div class="invalid-feedback error_nama_bayi_meninggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin Bayi</label>
                        <select name="jenis_kelamin_bayi" id="jenis_kelamin_bayi" class="form-control">
                            <option Disabled=true Selected=true>PILIH...</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        <div class="invalid-feedback error_jenis_kelamin_bayi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Meninggal</label>
                        <input type="date" class="form-control" id="tgl_meninggal" name="tgl_meninggal">
                        <div class="invalid-feedback error_tgl_meninggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sebab Meninggal</label>
                        <input type="text" class="form-control" id="sebab_meninggal" name="sebab_meninggal">
                        <div class="invalid-feedback error_sebab_meninggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                        <div class="invalid-feedback error_keterangan">
                        </div>
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
        $('.formedit').submit(function(e) {
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

                        if (response.error.nik_ibu) {
                            $('#nik_ibu').addClass('is-invalid');
                            $('.error_nik_ibu').html(response.error.nik_ibu);
                        } else {
                            $('#nik_ibu').removeClass('is-invalid');
                            $('.error_nik_ibu').html('');
                        }

                        if (response.error.nama_suami) {
                            $('#nama_suami').addClass('is-invalid');
                            $('.error_nama_suami').html(response.error.nama_suami);
                        } else {
                            $('#nama_suami').removeClass('is-invalid');
                            $('.error_nama_suami').html('');
                        }

                        if (response.error.status) {
                            $('#status').addClass('is-invalid');
                            $('.error_status').html(response.error.status);
                        } else {
                            $('#status').removeClass('is-invalid');
                            $('.error_status').html('');
                        }

                        if (response.error.catatan_status_ibu) {
                            $('#catatan_status_ibu').addClass('is-invalid');
                            $('.error_catatan_status_ibu').html(response.error.catatan_status_ibu);
                        } else {
                            $('#catatan_status_ibu').removeClass('is-invalid');
                            $('.error_catatan_status_ibu').html('');
                        }

                        if (response.error.nama_bayi) {
                            $('#nama_bayi').addClass('is-invalid');
                            $('.error_nama_bayi').html(response.error.nama_bayi);
                        } else {
                            $('#nama_bayi').removeClass('is-invalid');
                            $('.error_nama_bayi').html('');
                        }

                        if (response.error.jenis_kelamin) {
                            $('#jenis_kelamin').addClass('is-invalid');
                            $('.error_jenis_kelamin').html(response.error.jenis_kelamin);
                        } else {
                            $('#jenis_kelamin').removeClass('is-invalid');
                            $('.error_jenis_kelamin').html('');
                        }

                        if (response.error.tgl_lahir) {
                            $('#tgl_lahir').addClass('is-invalid');
                            $('.error_tgl_lahir').html(response.error.tgl_lahir);
                        } else {
                            $('#tgl_lahir').removeClass('is-invalid');
                            $('.error_tgl_lahir').html('');
                        }

                        if (response.error.akte) {
                            $('#akte').addClass('is-invalid');
                            $('.error_akte').html(response.error.akte);
                        } else {
                            $('#akte').removeClass('is-invalid');
                            $('.error_akte').html('');
                        }

                        if (response.error.catatan_status_ibu_meninggal) {
                            $('#catatan_status_ibu_meninggal').addClass('is-invalid');
                            $('.error_catatan_status_ibu_meninggal').html(response.error.catatan_status_ibu_meninggal);
                        } else {
                            $('#catatan_status_ibu_meninggal').removeClass('is-invalid');
                            $('.error_catatan_status_ibu_meninggal').html('');
                        }

                        if (response.error.nama_bayi_meninggal) {
                            $('#nama_bayi_meninggal').addClass('is-invalid');
                            $('.error_nama_bayi_meninggal').html(response.error.nama_bayi_meninggal);
                        } else {
                            $('#nama_bayi_meninggal').removeClass('is-invalid');
                            $('.error_nama_bayi_meninggal').html('');
                        }

                        if (response.error.jenis_kelamin_bayi) {
                            $('#jenis_kelamin_bayi').addClass('is-invalid');
                            $('.error_jenis_kelamin_bayi').html(response.error.jenis_kelamin_bayi);
                        } else {
                            $('#jenis_kelamin_bayi').removeClass('is-invalid');
                            $('.error_jenis_kelamin_bayi').html('');
                        }

                        if (response.error.tgl_meninggal) {
                            $('#tgl_meninggal').addClass('is-invalid');
                            $('.error_tgl_meninggal').html(response.error.tgl_meninggal);
                        } else {
                            $('#tgl_meninggal').removeClass('is-invalid');
                            $('.error_tgl_meninggal').html('');
                        }

                        if (response.error.sebab_meninggal) {
                            $('#sebab_meninggal').addClass('is-invalid');
                            $('.error_sebab_meninggal').html(response.error.sebab_meninggal);
                        } else {
                            $('#sebab_meninggal').removeClass('is-invalid');
                            $('.error_sebab_meninggal').html('');
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
                            // $('#modaledit').modal('hide');
                            listcatatanstatusibu();
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaledit').modal('hide');
                        listcatatanstatusibu();
                    }
                }
            });
        })

        $(document).ready(function() {
            $("select#status").change(function() {
                var hasil_select = $('#status').find(":selected").text();

                if (hasil_select == 'Catatan Kelahiran') {
                    $("#hidup").removeClass("d-none");
                } else {
                    $("#hidup").addClass("d-none");
                }

                if (hasil_select == 'Catatan Kematian') {
                    $("#meninggal").removeClass("d-none");
                } else {
                    $("#meninggal").addClass("d-none");
                }
            });
        });
    });
</script>