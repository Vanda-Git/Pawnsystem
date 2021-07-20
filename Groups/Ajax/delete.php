<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql_delete = "";
    $result = delete($conn, $sql_delete);
?>