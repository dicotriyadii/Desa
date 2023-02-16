<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Sumber Air Keluarga</a></li>
        <li class="breadcrumb-item active">List Sumber Air Keluarga</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a>
    <button type="button" class="btn btn-primary tambahSumberAir mb-2"><i class=" fa fa-plus-circle"></i> Tambah Sumber Air Keluarga</button>
</a>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listsumberairkeluarga() {
        $.ajax({
            url: "<?= site_url('sumberAirKeluarga/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listsumberairkeluarga();
        $('.tambahSumberAir').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('sumberAirKeluarga/formtambah') ?>",
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