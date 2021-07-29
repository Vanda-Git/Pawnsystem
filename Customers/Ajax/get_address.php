<?php include("../../Config/Database.php"); ?>
<?php
    $name = $_POST["name"];
    $parent_code = $_POST["parent_code"];
    $sql = "SELECT
                code,
                name,
                caption
            FROM d_master 
            where name='$name' AND code like '".$parent_code."%' 
            order by code asc";
    $datas = fetch_all($conn,$sql);
    echo json_encode($datas)
?>