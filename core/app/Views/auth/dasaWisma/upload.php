<!-- Modal -->
<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'formupload']) ?>
            <?= csrf_field(); ?>
            <br>
            <center>
                <img class="img-thumbnail" width="70%" src="<?= site_url('img/sampul/thumb/' . 'thumb_' . $list['slider_sampul']) ?>" alt="Sampul slider">
            </center>
            <div class="modal-body">
                <input type="hidden" value="<?= $slider_id ?>" name="slider_id">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Upload</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="slider_sampul" name="slider_sampul" accept=".jpg,.jpeg,.png">
                        <div class="invalid-feedback error_slider_sampul">

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnupload"><i class="fa fa-share-square"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btnupload').click(function(e) {
            e.preventDefault();
            let form = $('.formupload')[0];
            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: '<?= site_url('slider/doupload') ?>',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btnupload').attr('disable', 'disable');
                    $('.btnupload').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnupload').removeAttr('disable', 'disable');
                    $('.btnupload').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.slider_sampul) {
                            $('#slider_sampul').addClass('is-invalid');
                            $('.error_slider_sampul').html(response.error.slider_sampul);
                        } else {
                            $('#slider_sampul').removeClass('is-invalid');
                            $('.error_slider_sampul').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modalupload').modal('hide');
                        listgallery();
                    }

                }
            });

        });
    });
</script>