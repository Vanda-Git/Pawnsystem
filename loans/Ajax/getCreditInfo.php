<?php include("../../Config/Database.php"); ?>
<?php
    $id = $_POST["id"];
    $sql = "select id,currency,dis_date,first_repayment_date,request_amount,interest,tenor,repayment_type from d_credit where code = '$id'";
    $result = fetch_single($conn, $sql);
    echo json_encode($result);
?>