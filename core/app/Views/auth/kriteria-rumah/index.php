<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Kriteria Rumah</a></li>
        <li class="breadcrumb-item active">List Kriteria Rumah</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a>
    <button type="button" class="btn btn-primary tambahkriteriarumah mb-2"><i class=" fa fa-plus-circle"></i> Tambah Kriteria Rumah</button>
</a>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listkriteriarumah() {
        $.ajax({
            url: "<?= site_url('kriteriaRumah/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listkriteriarumah();
        $('.tambahkriteriarumah').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('kriteriaRumah/formtambah') ?>",
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