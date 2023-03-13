<?php include("../../Config/Database.php"); ?>
<?php
    $data = $_POST["data"];
    $sql_value = "";
    foreach ($data as $key => $value) {
        # code...
        $sql_value .= "('".$value["CrdID"]."'
                        ,'".$value["Num"]."'
                        ,'".$value["Date"]."'
                        ,'".$value["payment"]."'
                        ,'".$value["prin"]."'
                        ,'".$value["int"]."'
                        ,'".$value["bal"]."'
                        ,'".$_SESSION["user_id"]."'
                    ),";
    }
    $sql_value = rtrim($sql_value,",");
    $sql = "insert into d_crd_schedule (
                        credit_id
                        , due_number
                        , due_date
                        , payment
                        , principle
                        , interest
                        , balance
                        , created_by
                    ) values".$sql_value;
    $result = createWithNoMessage($conn, $sql);
    echo $result;
?>