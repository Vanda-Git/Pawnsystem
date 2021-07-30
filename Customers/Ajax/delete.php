<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql_delete = "UPDATE d_customer set status='C' where id = '$id'";
    $result = delete($conn, $sql_delete);
?>