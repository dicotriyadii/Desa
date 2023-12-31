<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="Dasa-Wisma" content="Dasa-Wisma">

    <title><?= $title ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/foto_dasa_wisma/logo-dasa-wisma.png">

    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/css/style.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>/assets_panel_dasa_wisma/js/jquery.min.js"></script>
    <!-- select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">

    <!-- select2-bootstrap4-theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>/assets_panel_dasa_wisma/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/" class="logo">
                    <span class="logo-light">
                        <img src="<?= base_url() ?>/foto_dasa_wisma/logo-dasa-wisma.png" alt="gambar-dasa-wisma" class="img-fluid" width="30%">
                    </span>
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>/foto_dasa_wisma/logo-dasa-wisma.png" alt="gambar-dasa-wisma" class="img-fluid" width="30%">
                    </span>
                </a>
            </div>

            <?= $this->renderSection('nav') ?>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <?= $this->renderSection('menu') ?>
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">

                            <?= $this->renderSection('judul') ?>


                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <?= $this->renderSection('isi') ?>
                                    <?= $this->renderSection('script') ?>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->


            <footer class="footer">
                © <?= date("Y") ?> <span class="d-none d-sm-inline-block">Dasa Wisma PKK</span>
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
</body>

</html>