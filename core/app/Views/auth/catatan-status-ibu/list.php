<?php if ($jabatan == 'Anggota') : ?>
    <button class="btn btn-info btn_upload mb-2">
        <i class="fa fa-plus"></i> Upload Data
    </button><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/contoh_catatan_kelahiran.xlsx">Unduh Contoh Data Impor Excel</a><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/panduan_status_ibu.DOCX">Unduh Panduan Upload Data Melalui Excel</a>

    <?= form_open('catatanStatusIbu/hapusall', ['class' => 'formhapus']) ?>

    <button type="submit" class="btn btn-danger mt-2">
        <i class="fa fa-trash"></i> Hapus yang diceklist
    </button>
<?php endif; ?>
<hr>
<h2>Catatan Kelahiran</h2>
<table id="listCatatanStatusIbu" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="2%">
                <input type="checkbox" id="centangSemua">
            </th>
            <th width="2%">#</th>
            <th>Nama Ibu</th>
            <th>Nama Suami</th>
            <th>Status Ibu</th>
            <th>Nama Ibu/Bayi</th>
            <th>L/P</th>
            <th>Tanggal Lahir</th>
            <th>Akte</th>
            <?php if ($jabatan == 'Anggota') : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 1;
        foreach ($list as $data) : ?>
            <?php if ($data['kode_dasa_wisma'] == $dasa_wisma) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="id[]" class="centangCatatanStatusIbuid" value="<?= $data['id'] ?>">
                    </td>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['namaWarga'] ?></td>
                    <td><?= $data['nama_suami'] ?></td>
                    <td><?= $data['catatan_status_ibu'] ?></td>
                    <td><?= $data['nama_bayi'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['tgl_lahir'] ?></td>
                    <td><?= $data['akte'] ?></td>
                    <?php if ($jabatan == 'Anggota') : ?>
                        <td>
                            <!-- <button type="button" class="btn btn-primary mb-2" onclick="edit('<?= $data['id'] ?>')">
                            <i class="fa fa-edit"></i>
                        </button> -->
                            <button type="button" class="btn btn-danger mb-2" onclick="hapus('<?= $data['id'] ?>')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<br><br>


<h2>Catatan Kematian</h2>
<?php if ($jabatan == 'Anggota') : ?>
    <button class="btn btn-info btn_upload_kematian mb-2">
        <i class="fa fa-plus"></i> Upload Data
    </button><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/contoh_catatan_kematian.xlsx">Unduh Contoh Data Impor Excel</a><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/panduan_status_ibu.DOCX">Unduh Panduan Upload Data Melalui Excel</a>
    <?= form_open('catatanStatusIbu/hapusall_kematian', ['class' => 'formhapus_kematian']) ?>
    <button type="submit" class="btn btn-danger my-2">
        <i class="fa fa-trash"></i> Hapus yang diceklist
    </button>
<?php endif; ?>
<table id="listCatatanStatusIbu_kematian" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="2%">
                <input type="checkbox" id="centangSemua_kematian">
            </th>
            <th width="2%">#</th>
            <th>Nama Ibu</th>
            <th>Nama Suami</th>
            <th>Nama Ibu/Bayi</th>
            <th>L/P</th>
            <th>Tanggal Meninggal</th>
            <th>Sebab Meninggal</th>
            <th>Keterangan</th>
            <?php if ($jabatan == 'Anggota') : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 1;
        foreach ($list_kematian as $data) : ?>
            <?php if ($data['kode_dasa_wisma'] == $dasa_wisma) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="id[]" class="centangCatatanStatusIbuid_kematian" value="<?= $data['id'] ?>">
                    </td>
                    <td><?= $nomor++ ?></td>
                    <td><?= $data['namaWarga'] ?></td>
                    <td><?= $data['nama_suami'] ?></td>
                    <td><?= $data['nama_bayi_meninggal'] ?></td>
                    <td><?= $data['jenis_kelamin_meninggal'] ?></td>
                    <td><?= $data['tgl_meninggal'] ?></td>
                    <td><?= $data['sebab_meninggal'] ?></td>
                    <td><?= $data['keterangan_meninggal'] ?></td>
                    <?php if ($jabatan == 'Anggota') : ?>
                        <td>
                            <!-- <button type="button" class="btn btn-primary mb-2" onclick="edit_kematian('<?= $data['id'] ?>')">
                            <i class="fa fa-edit"></i>
                        </button> -->
                            <button type="button" class="btn btn-danger mb-2" onclick="hapus_kematian('<?= $data['id'] ?>')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?= form_close() ?>
<script>
    $(document).ready(function() {
        $('#listCatatanStatusIbu_kematian').DataTable();

        $('#centangSemua_kematian').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangCatatanStatusIbuid_kematian').prop('checked', true);
            } else {
                $('.centangCatatanStatusIbuid_kematian').prop('checked', false);
            }
        });


        $('#listCatatanStatusIbu').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangCatatanStatusIbuid').prop('checked', true);
            } else {
                $('.centangCatatanStatusIbuid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangCatatanStatusIbuid:checked');
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
                                listcatatanstatusibu();
                            }
                        });
                    }
                })
            }
        });

        $('.formhapus_kematian').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangCatatanStatusIbuid_kematian:checked');
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
                                listcatatanstatusibu();
                            }
                        });
                    }
                })
            }
        });

        $('.btn_upload').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('catatanStatusIbu/formupload') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
        $('.btn_upload_kematian').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('catatanStatusIbu/formupload_kematian') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
    });

    function edit(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('catatanStatusIbu/formedit') ?>",
            data: {
                id_kelahiran: id
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

    function edit_kematian(id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('catatanStatusIbu/formedit') ?>",
            data: {
                id_kematian: id
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
                    url: "<?= site_url('catatanStatusIbu/hapus') ?>",
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
                            listcatatanstatusibu();
                        }
                    }
                });
            }
        })
    }

    function hapus_kematian(id) {
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
                    url: "<?= site_url('catatanStatusIbu/hapus_kematian') ?>",
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
                            listcatatanstatusibu();
                        }
                    }
                });
            }
        })
    }
</script>