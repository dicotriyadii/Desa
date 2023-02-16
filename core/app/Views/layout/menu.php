<?= $this->extend('layout/main') ?>
<?= $this->section('nav') ?>
<nav class="navbar-custom">
    <ul class="navbar-right list-inline float-right mb-0">

        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
            <div id="clock"></div>
        </li>

        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
            <a href="javascript:void(0);"> Apa Kabar, admin Dasa Wisma</a>
        </li>

        <li class="dropdown notification-list list-inline-item">
            <div class="dropdown notification-list nav-pro-img">
                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i style="color:#D49414; font-size: 30px;" class="fa fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="#" id="logout"><i class="mdi mdi-power text-danger"></i> Keluar</a>
                </div>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left waves-effect">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>

    </ul>

</nav>
<?= $this->endSection('nav') ?>

<?= $this->section('menu') ?>



<?php if ($jabatan == 'Ketua') : ?>
    <li class="menu-title">Dashboard</li>
    <!-- <li>
    <a href="<?= site_url('dashboard') ?>" class="waves-effect">
        <i class="mdi mdi-microsoft"></i> <span> Dashboard </span>
    </a>
</li> -->
    <li>
        <a href="<?= site_url('Users') ?>" class="waves-effect">
            <i class="mdi mdi-account-circle"></i> <span> Pengaturan Users </span>
        </a>
    </li>

    <li class="menu-title">Data Dasa Wisma PKK</li>
    <li>
        <a href="<?= site_url('dasaWisma') ?>" class="waves-effect">
            <i class="mdi mdi-home-outline"></i> <span> Dasa Wisma </span>
        </a>
    </li>
<?php endif; ?>
<!-- <li class="menu-title">Bendahara Dasa Wisma</li>
<li>
    <a href="<?= site_url('inventaris') ?>" class="waves-effect">
        <i class="mdi mdi-clipboard-text"></i> <span> Data Inventaris </span>
    </a>
</li>
<li>
    <a href="<?= site_url('keuangan') ?>" class="waves-effect">
        <i class="mdi mdi-beaker"></i> <span> Pemasukan Keuangan </span>
    </a>
</li>
<li>
    <a href="<?= site_url('keuangan/pengeluaran_keuangan') ?>" class="waves-effect">
        <i class="mdi mdi-book-variant"></i> <span> Pengeluaran Keuangan </span>
    </a>
</li> -->

<li class="menu-title">Kegiatan Dasa Wisma </li>
<li>
    <a href="<?= site_url('jenisKegiatan') ?>" class="waves-effect">
        <i class="mdi mdi-message-draw"></i> <span> Jenis Kegiatan </span>
    </a>
</li>
<li>
    <a href="<?= site_url('kriteriaRumah') ?>" class="waves-effect">
        <i class="mdi mdi-home-variant"></i> <span> Kriteria Rumah </span>
    </a>
</li>
<li>
    <a href="<?= site_url('sumberAirKeluarga') ?>" class="waves-effect">
        <i class="mdi mdi-nature-people"></i> <span> Sumber Air Keluarga </span>
    </a>
</li>
<li>
    <a href="<?= site_url('makananPokok') ?>" class="waves-effect">
        <i class="mdi mdi-food"></i> <span> Makanan Pokok </span>
    </a>
</li>
<li>
    <a href="<?= site_url('tempatSampah') ?>" class="waves-effect">
        <i class="mdi mdi-recycle"></i> <span> Tempat Sampah </span>
    </a>
</li>
<li>
    <a href="<?= site_url('catatanKeluarga') ?>" class="waves-effect">
        <i class="mdi mdi-book-open-page-variant"></i> <span> Catatan Keluarga </span>
    </a>
</li>
<li>
    <a href="<?= site_url('catatanStatusIbu') ?>" class="waves-effect">
        <i class="mdi mdi-newspaper"></i> <span> Catatan Status Ibu </span>
    </a>
</li>

<li class="menu-title">Laporan</li>
<li>
    <a href="<?= site_url('laporan') ?>" class="waves-effect">
        <i class="mdi mdi-format-align-center"></i> <span> Laporan </span>
    </a>
</li>

<li class="menu-title">Keluar</li>
<li>
    <a href="#" class="waves-effect" id="logout">
        <i class="mdi mdi-exit-to-app"></i> <span> Keluar </span>
    </a>
</li>

<?= $this->endSection('menu') ?>