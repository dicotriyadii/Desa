<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('users/simpanuser', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">

                    <div class="form-group">
                        <label>Nama Warga</label>
                        <select name="nik" id="nik" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <?php foreach ($nik as $n) : ?>
                                <?php if ($n['kodeDusun'] == $kd_dusun) : ?>
                                    <option value="<?= $n['nomorIndukKependudukan'] ?>"><?= $n['namaWarga'] ?>, <?= $n['alamat'] ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errornik">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>

                            <option value="Ketua">Ketua</option>
                            <option value="Anggota">Anggota</option>

                        </select>
                        <div class="invalid-feedback errorjabatan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dasa Wisma</label>
                        <select name="dasa_wisma_id" id="dasa_wisma_id" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <?php foreach ($dasa_wisma as $ds) : ?>
                                <?php if ($ds['kode_dusun'] == $kd_dusun) : ?>
                                    <option value="<?= $ds['id'] ?>"><?= $ds['nama_dasa_wisma'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback errordasa_wisma_id">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="invalid-feedback errorPass">
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
                        if (response.error.nik) {
                            $('#nik').addClass('is-invalid');
                            $('.errornik').html(response.error.nik);
                        } else {
                            $('#nik').removeClass('is-invalid');
                            $('.errornik').html('');
                        }

                        if (response.error.jabatan) {
                            $('#jabatan').addClass('is-invalid');
                            $('.errorjabatan').html(response.error.jabatan);
                        } else {
                            $('#jabatan').removeClass('is-invalid');
                            $('.errorjabatan').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('.errorPass').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('.errorPass').html('');
                        }

                        if (response.error.dasa_wisma_id) {
                            $('#dasa_wisma_id').addClass('is-invalid');
                            $('.errordasa_wisma_id').html(response.error.dasa_wisma_id);
                        } else {
                            $('#dasa_wisma_id').removeClass('is-invalid');
                            $('.errordasa_wisma_id').html('');
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
                        listuser();
                    }
                }
            });
        })
    });
</script>