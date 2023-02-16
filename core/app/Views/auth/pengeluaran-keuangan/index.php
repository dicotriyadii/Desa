<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengeluaran Keuangan</a></li>
        <li class="breadcrumb-item active">List Pengeluaran Keuangan</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a>
    <button type="button" class="btn btn-primary tambahpengeluarankeuangan mb-2"><i class=" fa fa-plus-circle"></i> Tambah Pengeluaran Keuangan</button>
</a>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listpengeluarankeuangan() {
        $.ajax({
            url: "<?= site_url('keuangan/getdata_pengeluaran_keuangan') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listpengeluarankeuangan();
        $('.tambahpengeluarankeuangan').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('keuangan/formtambah_pengeluaran_keuangan') ?>",
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