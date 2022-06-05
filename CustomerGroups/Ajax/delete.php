<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql_delete = "update d_group set status='C' where id = '$id'";
    $result = updateWithNoMessage($conn, $sql_delete);
    echo $result;
?>