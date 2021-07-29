<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql_delete = "UPDATE users set status='0' where id = '$id'";
    $result = delete($conn, $sql_delete);
?>