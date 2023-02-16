<?= form_open('dasaWisma/hapusall', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listdasawisma" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="centangSemua">
            </th>
            <th>#</th>
            <th>Nama Kecamatan</th>
            <th>Nama Desa</th>
            <th>Nama Dusun</th>
            <th>RT</th>
            <th>RW</th>
            <th>Nama Dasa Wisma</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <?php if ($data['kode_dusun'] == $dusun) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="id[]" class="centangDasaWismaid" value="<?= $data['id'] ?>">
                    </td>
                    <td><?= $nomor ?></td>
                    <td>
                        <?= esc($data['namaKecamatan']) ?>
                    </td>
                    <td>
                        <?= esc($data['namaDesa']) ?>
                    </td>
                    <td>
                        <?= esc($data['namaDusun']) ?>
                    </td>
                    <td>
                        <?= esc($data['RT']) ?>
                    </td>
                    <td>
                        <?= esc($data['RW']) ?>
                    </td>
                    <td>
                        <?= esc($data['nama_dasa_wisma']) ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" onclick="edit('<?= $data['id'] ?>')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['id'] ?>')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $('#listdasawisma').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangDasaWismaid').prop('checked', true);
            } else {
                $('.centangDasaWismaid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangDasaWismaid:checked');
            if (jmldata.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ooops!',
                    text: 'Silahkan pilih data!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    title: `Apakah anda yakin ingin menghapus ${jmldata.length} Dasa Wisma?`,
                    text: 'Semua Data yang ada didalam Dasa Wisma akan terhapus!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Tetap Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.sukses,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listdasawisma();
                            }
                        });
                    }
                })
            }
        });
    });

    function edit(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('dasaWisma/formedit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaledit').modal('show');
                }
            }
        });
    }

    function hapus(id) {
        Swal.fire({
            title: 'Hapus data?',
            text: `Apakah anda yakin menghapus data?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('dasaWisma/hapus') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: response.sukses,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            listdasawisma();
                        }
                    }
                });
            }
        })
    }
</script>