<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- Notify JS -->
<script src="../dist/js/notify.min.js"></script>
<!-- Sweet Alert -->
<script src="../dist/js/sweetalert.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
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
$url = $_SERVER['PHP_SELF']; //returns the current URL
$parts = explode("/", $url);

$group = $_SESSION["user_group"];
$sql = "SELECT
          SUM(t1.views) as views,
          SUM(t1.adds) as adds,
          SUM(t1.updates) as updates,
          SUM(t1.deletes) as deletes
        FROM permissions t1
        inner join sub_menus t2 on t1.sub_menu = t2.id
        where t1.p_group in ($group) and t2.url = '../" . $parts[2] . "/'";

$datas_permission = fetch_single($conn, $sql);
echo $url."<br>".$parts[2];

if ($datas_permission["adds"] == 0) {
?>
  <script>
    $('.btn_add').remove();
  </script>
<?php
}
if ($datas_permission["updates"] == 0) {
?>
  <script>
    $('.btn_update').remove();
  </script>
<?php
}
if ($datas_permission["deletes"] == 0) {
?>
  <script>
    $('.btn_delete').remove();
  </script>
<?php
}
?>