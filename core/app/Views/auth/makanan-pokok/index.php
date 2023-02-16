<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Makanan Pokok</a></li>
        <li class="breadcrumb-item active">List Makanan Pokok</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a>
    <button type="button" class="btn btn-primary tambahpengumuman mb-2"><i class=" fa fa-plus-circle"></i> Tambah Makanan Pokok</button>
</a>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listmakananpokok() {
        $.ajax({
            url: "<?= site_url('makananPokok/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listmakananpokok();
        $('.tambahpengumuman').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('makananPokok/formtambah') ?>",
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