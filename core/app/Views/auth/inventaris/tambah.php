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
            <?= form_open('inventaris/simpan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    <div class="invalid-feedback error_nama_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label>Asal Barang</label>
                    <input type="text" class="form-control" id="asal_barang" name="asal_barang">
                    <div class="invalid-feedback error_asal_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal Penerimaan / Pembelian</label>
                    <input type="date" class="form-control" id="tgl" name="tgl">
                    <div class="invalid-feedback error_tgl">
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah (Rp)</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                    <div class="invalid-feedback error_jumlah">
                    </div>
                </div>

                <div class="form-group">
                    <label>Tempat Penyimpanan</label>
                    <input type="text" class="form-control" id="tempat_penyimpanan" name="tempat_penyimpanan">
                    <div class="invalid-feedback error_tempat_penyimpanan">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kondisi Barang</label>
                    <input type="text" class="form-control" id="kondisi_barang" name="kondisi_barang">
                    <div class="invalid-feedback error_kondisi_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
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
                        if (response.error.nama_barang) {
                            $('#nama_barang').addClass('is-invalid');
                            $('.error_nama_barang').html(response.error.nama_barang);
                        } else {
                            $('#nama_barang').removeClass('is-invalid');
                            $('.error_nama_barang').html('');
                        }

                        if (response.error.asal_barang) {
                            $('#asal_barang').addClass('is-invalid');
                            $('.error_asal_barang').html(response.error.asal_barang);
                        } else {
                            $('#asal_barang').removeClass('is-invalid');
                            $('.error_asal_barang').html('');
                        }

                        if (response.error.tgl) {
                            $('#tgl').addClass('is-invalid');
                            $('.error_tgl').html(response.error.tgl);
                        } else {
                            $('#tgl').removeClass('is-invalid');
                            $('.error_tgl').html('');
                        }

                        if (response.error.jumlah) {
                            $('#jumlah').addClass('is-invalid');
                            $('.error_jumlah').html(response.error.jumlah);
                        } else {
                            $('#jumlah').removeClass('is-invalid');
                            $('.error_jumlah').html('');
                        }

                        if (response.error.tempat_penyimpanan) {
                            $('#tempat_penyimpanan').addClass('is-invalid');
                            $('.error_tempat_penyimpanan').html(response.error.tempat_penyimpanan);
                        } else {
                            $('#tempat_penyimpanan').removeClass('is-invalid');
                            $('.error_tempat_penyimpanan').html('');
                        }

                        if (response.error.kondisi_barang) {
                            $('#kondisi_barang').addClass('is-invalid');
                            $('.error_kondisi_barang').html(response.error.kondisi_barang);
                        } else {
                            $('#kondisi_barang').removeClass('is-invalid');
                            $('.error_kondisi_barang').html('');
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
                            listinventaris();
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
                        listinventaris();
                    }
                }
            });
        })
    });
</script>