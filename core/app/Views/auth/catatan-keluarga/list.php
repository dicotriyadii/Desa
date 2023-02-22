<?php if ($jabatan == 'Anggota') : ?>
    <button class="btn btn-info btn_upload mb-2">
        <i class="fa fa-plus"></i> Upload Data
    </button><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/contoh.xlsx">Unduh Contoh Data Impor Excel</a><br>
    <a href="<?= base_url() ?>/../assets_dasa_wisma/panduan.DOCX">Unduh Panduan Upload Data Melalui Excel</a>

    <?= form_open('catatanKeluarga/hapusall', ['class' => 'formhapus mt-2']) ?>
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash"></i> Hapus yang diceklist
    </button>
<?php endif; ?>
<hr>
<table id="listCatatanKeluarga" class="table table-striped dt-responsive " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th width="2%">
                <input type="checkbox" id="centangSemua">
            </th>
            <th width="2%">#</th>
            <th>Nama Warga</th>
            <th>status Perkawinan</th>
            <th>L/P</th>
            <th>Tempat Lahir</th>
            <th>Tgl Lahir</th>
            <th>Agama</th>
            <th>Pendidikan</th>
            <th>Pekerjaan</th>
            <th>Berkebutuhan Khusus</th>
            <th>Jenis Kegiatan</th>
            <th>Nama Kegiatan</th>
            <th>Kriteria Rumah</th>
            <th>Sumber Air Keluarga</th>
            <th>Tempat Sampah</th>
            <th>Makanan Pokok</th>
            <th>Keterangan</th>
            <?php if ($jabatan == 'Anggota') : ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>


    <tbody>
        <?php $nomor = 0;
        foreach ($list as $data) :
            $nomor++; ?>
            <?php if ($data['kode_dasa_wisma'] == $dasa_wisma) : ?>
                <tr>
                    <td>
                        <input type="checkbox" name="idCatatanKeluarga[]" class="centangCatatanKeluargaid" value="<?= $data['idCatatanKeluarga'] ?>">
                    </td>
                    <td><?= $nomor ?></td>
                    <td><?= $data['namaWarga'] ?></td>
                    <td><?= $data['statusKawin'] ?></td>
                    <td><?= $data['jenisKelamin'] ?></td>
                    <td><?= $data['tempatLahir'] ?></td>
                    <td><?= $data['tanggalLahir'] ?></td>
                    <td><?= $data['agama'] ?></td>
                    <td><?= $data['pendidikanTerakhir'] ?></td>
                    <td><?= $data['pekerjaan'] ?></td>
                    <td><?= $data['berkebutuhan_khusus'] ?></td>
                    <td><?= $data['jenis_kegiatan'] ?></td>
                    <td><?= $data['nama_kegiatan'] ?></td>
                    <td><?= $data['jenis_kriteria_rumah'] ?></td>
                    <td><?= $data['jenis_sumber_air'] ?></td>
                    <td><?= $data['jenis_tempat_sampah'] ?></td>
                    <td><?= $data['makanan_pokok'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <?php if ($jabatan == 'Anggota') : ?>
                        <td>
                            <button type="button" class="btn btn-primary mb-2" onclick="edit('<?= $data['idCatatanKeluarga'] ?>')">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger mb-2" onclick="hapus('<?= $data['idCatatanKeluarga'] ?>')">
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
        $('#listCatatanKeluarga').DataTable();

        $('#centangSemua').click(function(e) {
            if ($(this).is(':checked')) {
                $('.centangCatatanKeluargaid').prop('checked', true);
            } else {
                $('.centangCatatanKeluargaid').prop('checked', false);
            }
        });

        $('.formhapus').submit(function(e) {
            e.preventDefault();
            let jmldata = $('.centangCatatanKeluargaid:checked');
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
                                listcatatankeluarga();
                            }
                        });
                    }
                })
            }
        });

        $('.btn_upload').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('catatanKeluarga/formupload') ?>",
                dataType: "json",
                success: function(response) {
                    $('.viewmodal').html(response.data).show();

                    $('#modaltambah').modal('show');
                }
            });
        });
    });

    function edit(idCatatanKeluarga) {
        $.ajax({
            type: "post",
            url: "<?= site_url('catatanKeluarga/formedit') ?>",
            data: {
                idCatatanKeluarga: idCatatanKeluarga
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

    function hapus(idCatatanKeluarga) {
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
                    url: "<?= site_url('catatanKeluarga/hapus') ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        idCatatanKeluarga: idCatatanKeluarga
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
                            listcatatankeluarga();
                        }
                    }
                });
            }
        })
    }
</script>