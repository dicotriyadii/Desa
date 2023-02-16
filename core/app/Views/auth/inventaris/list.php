<?= form_open('inventaris/hapusall', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listinventaris" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="2%">
                <input type="checkbox" id="centangSemua">
            </th>
            <th>#</th>
            <th>Nama Barang</th>
            <th>Asal Barang</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Tempat Penyimpanan</th>
            <th>Kondisi Barang</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <td>
                    <input type="checkbox" name="id[]" class="centangInventarisid" value="<?= $data['id'] ?>">
                </td>
                <td><?= $nomor ?></td>

                <td>
                    <?= esc($data['nama_barang']) ?>
                </td>
                <td>
                    <?= esc($data['asal_barang']) ?>
                </td>
                <td>
                    <?= esc($data['tgl']) ?>
                </td>
                <td>
                    <?= esc($data['jumlah']) ?>
                </td>
                <td>
                    <?= esc($data['tempat_penyimpanan']) ?>
                </td>
                <td>
                    <?= esc($data['kondisi_barang']) ?>
                </td>
                <td>
                    <?= esc($data['keterangan']) ?>
                </td>
                <td>
                    <button type="button" class="btn btn-primary mb-2" onclick="edit('<?= $data['id'] ?>')">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger mb-2" onclick="hapus('<?= $data['id'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $('#listinventaris').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangInventarisid').prop('checked', true);
            } else {
                $('.centangInventarisid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangInventarisid:checked');
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
                    title: 'Hapus data',
                    text: `Apakah anda yakin ingin menghapus sebanyak ${jmldata.length} data?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Tetap Hapus'
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
                                    text: 'Data Berhasil Dihapus!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listinventaris();
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
            url: "<?= site_url('inventaris/formedit') ?>",
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
                    url: "<?= site_url('inventaris/hapus') ?>",
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
                            listinventaris();
                        }
                    }
                });
            }
        })
    }
</script>