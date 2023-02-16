<?= form_open('keuangan/hapusall_pemasukan_keuangan', ['class' => 'formhapus']) ?>

<button type="submit" class="btn btn-danger">
    <i class="fa fa-trash"></i> Hapus yang diceklist
</button>

<hr>
<table id="listpemasukankeuangan" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="2%">
                <input type="checkbox" id="centangSemua">
            </th>
            <th width="2%">#</th>
            <th width="5%">Sumber Dana Pemasukan</th>
            <th width="15%">Uraian Pemasukan</th>
            <th width="15%">Nomor Bukti Kas Pemasukan</th>
            <th width="3%">Jumlah Penerimaan</th>
            <th width="3%">Tgl</th>
            <th width="8%">Aksi</th>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <tr>
                <td>
                    <input type="checkbox" name="id[]" class="centangPemasukanKeuanganid" value="<?= $data['id'] ?>">
                </td>
                <td><?= $nomor ?></td>
                <td><?= $data['sumber_dana_pemasukkan'] ?></td>
                <td><?= $data['uraian_pemasukkan'] ?></td>
                <td><?= $data['nomor_bukti_kas_pemasukkan'] ?></td>
                <td><?= $data['jumlah_penerimaan'] ?></td>
                <td><?= $data['tgl'] ?></td>
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
        $('#listpemasukankeuangan').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangPemasukanKeuanganid').prop('checked', true);
            } else {
                $('.centangPemasukanKeuanganid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangPemasukanKeuanganid:checked');
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
                                listpemasukankeuangan();
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
            url: "<?= site_url('keuangan/formedit_pemasukan_keuangan') ?>",
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
                    url: "<?= site_url('keuangan/hapus_pemasukan_keuangan') ?>",
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
                            listpemasukankeuangan();
                        }
                    }
                });
            }
        })
    }
</script>