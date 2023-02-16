<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Catatan status Ibu</a></li>
        <li class="breadcrumb-item active">List Catatan status Ibu</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<?php if ($jabatan == 'Anggota') : ?>
    <a>
        <button type="button" class="btn btn-primary tambahCatatanStatusIbu mb-2"><i class=" fa fa-plus-circle"></i> Tambah Catatan status Ibu</button>
    </a>
<?php endif; ?>
<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listcatatanstatusibu() {
        $.ajax({
            url: "<?= site_url('catatanStatusIbu/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listcatatanstatusibu();
        $('.tambahCatatanStatusIbu').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('catatanStatusIbu/formtambah') ?>",
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