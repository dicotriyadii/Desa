<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('script') ?>
<!-- Sweet-Alert  -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- jQuery  -->

<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/js/metismenu.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/js/waves.min.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

<!-- Digital Clock JS-->
<script src="<?= base_url() ?>/../assets_dasa_wisma/js/clock.js"></script>

<!-- Image Preview Upload Image JS-->
<script src="<?= base_url() ?>/../assets_dasa_wisma/js/upload_image.js"></script>

<!-- Mask Money JS - Format Input Rupiah JS-->
<script src="<?= base_url() ?>/../assets_dasa_wisma/js/jquery.maskMoney.min.js"></script>

<!-- Custom Default Show DataTable-->
<script src="<?= base_url() ?>/../assets_dasa_wisma/js/default_show_dtb.js"></script>


<!-- Required datatable js -->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!--Summernote js-->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Datatable init js -->
<script src="<?= base_url() ?>/../assets_panel_dasa_wisma/pages/datatables.init.js"></script>

<script>
    const nik = '<?= session()->get('nik') ?>'
    const base_url = '<?= base_url('/') ?>'
    const date = '<?= date('Y-m-d') ?>'
</script>

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
    $('a#logout').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin keluar dari Aplikasi?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Keluar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('dashboard/logout') ?>",
                    type: 'post',
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Anda berhasil logout!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1250
                        }).then(function() {
                            window.location = '<?= site_url('/loginAdmin') ?>';
                        });
                    }
                });
            }
        })
    })
</script>
<?= $this->endSection('script') ?>