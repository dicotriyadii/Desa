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
            <?= form_open('keuangan/simpan_pengeluaran_keuangan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Sumber Dana Pengeluaran</label>
                    <input type="text" class="form-control" id="sumber_dana_pengeluaran" name="sumber_dana_pengeluaran">
                    <div class="invalid-feedback error_sumber_dana_pengeluaran">
                    </div>
                </div>

                <div class="form-group">
                    <label>Uraian Pengeluaran</label>
                    <input type="text" class="form-control" id="uraian_pengeluaran" name="uraian_pengeluaran">
                    <div class="invalid-feedback error_uraian_pengeluaran">
                    </div>
                </div>

                <div class="form-group">
                    <label>Nomor Bukti Kas Pengeluaran</label>
                    <input type="text" class="form-control" id="nomor_bukti_kas_pengeluaran" name="nomor_bukti_kas_pengeluaran">
                    <div class="invalid-feedback error_nomor_bukti_kas_pengeluaran">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Pengeluaran</label>
                    <input type="text" class="form-control" id="jumlah_pengeluaran" name="jumlah_pengeluaran">
                    <div class="invalid-feedback error_jumlah_pengeluaran">
                    </div>
                </div>


                <div class="form-group">
                    <label>Tanggal Pengeluaran</label>
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
                        if (response.error.sumber_dana_pengeluaran) {
                            $('#sumber_dana_pengeluaran').addClass('is-invalid');
                            $('.error_sumber_dana_pengeluaran').html(response.error.sumber_dana_pengeluaran);
                        } else {
                            $('#sumber_dana_pengeluaran').removeClass('is-invalid');
                            $('.error_sumber_dana_pengeluaran').html('');
                        }

                        if (response.error.uraian_pengeluaran) {
                            $('#uraian_pengeluaran').addClass('is-invalid');
                            $('.error_uraian_pengeluaran').html(response.error.uraian_pengeluaran);
                        } else {
                            $('#uraian_pengeluaran').removeClass('is-invalid');
                            $('.error_uraian_pengeluaran').html('');
                        }

                        if (response.error.nomor_bukti_kas_pengeluaran) {
                            $('#nomor_bukti_kas_pengeluaran').addClass('is-invalid');
                            $('.error_nomor_bukti_kas_pengeluaran').html(response.error.nomor_bukti_kas_pengeluaran);
                        } else {
                            $('#nomor_bukti_kas_pengeluaran').removeClass('is-invalid');
                            $('.error_nomor_bukti_kas_pengeluaran').html('');
                        }

                        if (response.error.jumlah_pengeluaran) {
                            $('#jumlah_pengeluaran').addClass('is-invalid');
                            $('.error_jumlah_pengeluaran').html(response.error.jumlah_pengeluaran);
                        } else {
                            $('#jumlah_pengeluaran').removeClass('is-invalid');
                            $('.error_jumlah_pengeluaran').html('');
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
                        listpengeluarankeuangan();
                    }
                }
            });
        })
    });
</script>