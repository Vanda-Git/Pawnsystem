<?php
$group = $_SESSION["user_group"];
$sql = "SELECT
          SUM(t1.views) as views,
          SUM(t1.adds) as adds,
          SUM(t1.updates) as updates,
          SUM(t1.deletes) as deletes
        FROM permissions t1
        inner join sub_menus t2 on t1.sub_menu = t2.id
        where t1.p_group in ($group) and t2.url = '../" . $access_module."'";

$datas_permission = fetch_single($conn, $sql);

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