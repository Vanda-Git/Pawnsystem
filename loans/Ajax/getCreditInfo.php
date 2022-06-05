<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql = "select first_repayment_date,request_amount,interest,tenor from d_credit where code = '$id'";
    $result = fetch_single($conn, $sql);
    echo json_encode($result);
?>