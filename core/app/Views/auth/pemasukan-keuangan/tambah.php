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
            <?= form_open('keuangan/simpan_pemasukan_keuangan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label>Sumber Dana Pemasukan</label>
                    <input type="text" class="form-control" id="sumber_dana_pemasukan" name="sumber_dana_pemasukan">
                    <div class="invalid-feedback error_sumber_dana_pemasukan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Uraian Pemasukan</label>
                    <input type="text" class="form-control" id="uraian_pemasukan" name="uraian_pemasukan">
                    <div class="invalid-feedback error_uraian_pemasukan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Bukti Kas Pemasukan</label>
                    <input type="text" class="form-control" id="nomor_bukti_kas_pemasukan" name="nomor_bukti_kas_pemasukan">
                    <div class="invalid-feedback error_nomor_bukti_kas_pemasukan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Penerimaan</label>
                    <input type="text" class="form-control" id="jumlah_penerimaan" name="jumlah_penerimaan">
                    <div class="invalid-feedback error_jumlah_penerimaan">
                    </div>
                </div>


                <div class="form-group">
                    <label>Tanggal Penerimaan</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                    <div class="invalid-feedback error_tgl">
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
                        if (response.error.sumber_dana_pemasukan) {
                            $('#sumber_dana_pemasukan').addClass('is-invalid');
                            $('.error_sumber_dana_pemasukan').html(response.error.sumber_dana_pemasukan);
                        } else {
                            $('#sumber_dana_pemasukan').removeClass('is-invalid');
                            $('.error_sumber_dana_pemasukan').html('');
                        }

                        if (response.error.uraian_pemasukan) {
                            $('#uraian_pemasukan').addClass('is-invalid');
                            $('.error_uraian_pemasukan').html(response.error.uraian_pemasukan);
                        } else {
                            $('#uraian_pemasukan').removeClass('is-invalid');
                            $('.error_uraian_pemasukan').html('');
                        }

                        if (response.error.nomor_bukti_kas_pemasukan) {
                            $('#nomor_bukti_kas_pemasukan').addClass('is-invalid');
                            $('.error_nomor_bukti_kas_pemasukan').html(response.error.nomor_bukti_kas_pemasukan);
                        } else {
                            $('#nomor_bukti_kas_pemasukan').removeClass('is-invalid');
                            $('.error_nomor_bukti_kas_pemasukan').html('');
                        }

                        if (response.error.jumlah_penerimaan) {
                            $('#jumlah_penerimaan').addClass('is-invalid');
                            $('.error_jumlah_penerimaan').html(response.error.jumlah_penerimaan);
                        } else {
                            $('#jumlah_penerimaan').removeClass('is-invalid');
                            $('.error_jumlah_penerimaan').html('');
                        }

                        if (response.error.tgl) {
                            $('#tgl').addClass('is-invalid');
                            $('.error_tgl').html(response.error.tgl);
                        } else {
                            $('#tgl').removeClass('is-invalid');
                            $('.error_tgl').html('');
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
                        listpemasukankeuangan();
                    }
                }
            });
        })
    });
</script>