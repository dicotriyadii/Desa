<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('DasaWisma/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">

                    <input type="hidden" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="1" readonly>
                    <div class="invalid-feedback error_nama_kecamatan"></div>

                    <input type="hidden" class="form-control" id="nama_desa" name="nama_desa" value="1" readonly>
                    <div class="invalid-feedback error_nama_desa"></div>

                    <input type="hidden" class="form-control" id="nama_dusun" name="nama_dusun" value="1" readonly>
                    <div class="invalid-feedback error_nama_dusun"></div>
                </div>

                <div class="form-group">
                    <label>RT</label>
                    <input type="text" class="form-control" id="rt" name="rt">
                    <div class="invalid-feedback error_rt">
                    </div>
                </div>
                <div class="form-group">
                    <label>RW</label>
                    <input type="text" class="form-control" id="rw" name="rw">
                    <div class="invalid-feedback error_rw">
                    </div>
                </div>
                <div class="form-group">
                    <label>Nama Dasa Wisma</label>
                    <input type="text" class="form-control" id="nama_dasa_wisma" name="nama_dasa_wisma">
                    <div class="invalid-feedback error_nama_dasa_wisma">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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

                        if (response.error.nama_kecamatan) {
                            $('#nama_kecamatan').addClass('is-invalid');
                            $('.error_nama_kecamatan').html(response.error.nama_kecamatan);
                        } else {
                            $('#nama_kecamatan').removeClass('is-invalid');
                            $('.error_nama_kecamatan').html('');
                        }

                        if (response.error.nama_desa) {
                            $('#nama_desa').addClass('is-invalid');
                            $('.error_nama_desa').html(response.error.nama_desa);
                        } else {
                            $('#nama_desa').removeClass('is-invalid');
                            $('.error_nama_desa').html('');
                        }

                        if (response.error.nama_dusun) {
                            $('#nama_dusun').addClass('is-invalid');
                            $('.error_nama_dusun').html(response.error.nama_dusun);
                        } else {
                            $('#nama_dusun').removeClass('is-invalid');
                            $('.error_nama_dusun').html('');
                        }

                        if (response.error.rt) {
                            $('#rt').addClass('is-invalid');
                            $('.error_rt').html(response.error.rt);
                        } else {
                            $('#rt').removeClass('is-invalid');
                            $('.error_rt').html('');
                        }

                        if (response.error.rw) {
                            $('#rw').addClass('is-invalid');
                            $('.error_rw').html(response.error.rw);
                        } else {
                            $('#rw').removeClass('is-invalid');
                            $('.error_rw').html('');
                        }

                        if (response.error.nama_dasa_wisma) {
                            $('#nama_dasa_wisma').addClass('is-invalid');
                            $('.error_nama_dasa_wisma').html(response.error.nama_dasa_wisma);
                        } else {
                            $('#nama_dasa_wisma').removeClass('is-invalid');
                            $('.error_nama_dasa_wisma').html('');
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
                            listdasawisma();
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
                        listdasawisma();
                    }
                }
            });
        })
    });
</script>