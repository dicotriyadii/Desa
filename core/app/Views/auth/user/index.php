<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Konfigurasi User</a></li>
        <li class="breadcrumb-item active">List User</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<p><button type="button" class="btn btn-primary btn-sm tambahuser"><i class=" fa fa-plus-circle"></i> Tambah User</button></p>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listuser() {
        $.ajax({
            url: "<?= site_url('users/getuser') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listuser();
        $('.tambahuser').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('users/formuser') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
    });
</script>
<?= $this->endSection('isi') ?>