<!-- Sweet Alert -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<!-- jQuery -->
<script src="<?=base_url()?>/assetsAdmin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>/assetsAdmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>/assetsAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>/assetsAdmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>/assetsAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>/assetsAdmin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>/assetsAdmin/dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php 
$dataSession = $session->get('statusTambah');
$dataKeterangan = $session->get('keterangan');
if($dataSession == "Berhasil"){ 
?>
  <script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
<?php 
$arraySession = ['statusTambah','keterangan'];
$session->remove($arraySession);
}else if($dataSession == "Gagal"){
?>
  <script> swal("Penyimpanan Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
<?php 
$arraySession = ['statusTambah','keterangan'];
$session->remove($arraySession);
} 
?>
</body>
</html>