<?= form_open('users/hapusalluser', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger btn-sm">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listuser" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="centangSemua">
            </th>
            <th>#</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Dasa Wisma</th>
            <th>Aksi</th>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 1;
        foreach ($list as $data) : ?>
            <?php if ($data['dusun'] == $dusun) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="idUserDasawisma[]" class="centangUserid" value="<?= $data['idUserDasawisma'] ?>">
                    </td>
                    <td><?= $nomor++ ?></td>
                    <td><?= esc($data['namaWarga']) ?></td>
                    <td><?= esc($data['jabatan']) ?></td>
                    <td><?= esc($data['alamat']) ?></td>
                    <td><?= esc($data['nama_dasa_wisma']) ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" onclick="edit('<?= $data['idUserDasawisma'] ?>')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('<?= $data['idUserDasawisma'] ?>')">
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
        $('#listuser').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangUserid').prop('checked', true);
            } else {
                $('.centangUserid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangUserid:checked');
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
                    title: 'Hapus user',
                    text: `Apakah anda yakin ingin menghapus sebanyak ${jmldata.length} user?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
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
                                    text: 'Data berhasil dihapus!',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                listuser();
                            }
                        });
                    }
                })
            }
        });
    });

    function toggle(idUserDasawisma) {
        $.ajax({
            type: "post",
            url: "<?= site_url('users/toggle') ?>",
            data: {
                idUserDasawisma: idUserDasawisma
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: response.sukses,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    listuser();
                }
            }
        });
    }

    function edit(idUserDasawisma) {
        $.ajax({
            type: "post",
            url: "<?= site_url('users/formedituser') ?>",
            data: {
                idUserDasawisma: idUserDasawisma
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

    function hapus(idUserDasawisma) {
        Swal.fire({
            title: 'Hapus user?',
            text: `Apakah anda yakin menghapus user?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= site_url('users/hapus') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        idUserDasawisma: idUserDasawisma
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
                            listuser();
                        }
                    }
                });
            }
        })
    }

    function gambar(idUserDasawisma) {
        $.ajax({
            type: "post",
            url: "<?= site_url('users/formuploaduser') ?>",
            data: {
                idUserDasawisma: idUserDasawisma
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');
                }
            }
        });
    }
</script>