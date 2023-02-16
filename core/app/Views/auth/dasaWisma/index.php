<?= $this->extend('layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dasa Wisma</a></li>
        <li class="breadcrumb-item active">List Dasa Wisma</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<!-- <p class="mt-1">Catatan :<br>
    <i class="mdi mdi-information"></i> Jika ingin menghapus Dasa Wisma pastikan Foto dalam keadaan kosong (Tidak ada foto di dalamnya). <br>
</p> -->

<a>
    <button type="button" class="btn btn-primary tambahdasawisma mb-2"><i class=" fa fa-plus-circle"></i> Tambah Dasa Wisma</button>
</a>

<div class="viewdata">
</div>

<div class="viewmodal">
</div>


<script>
    function listdasawisma() {
        $.ajax({
            url: "<?= site_url('DasaWisma/getdata') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            }
        });
    }

    $(document).ready(function() {
        listdasawisma();
        $('.tambahdasawisma').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('DasaWisma/formtambah') ?>",
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