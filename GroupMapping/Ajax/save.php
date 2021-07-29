<?php include("../../Config/Database.php"); ?>
<?php
    $user_group = $_POST["user_group"];
    
    $detail = $_POST["detail"];
    $user = $_SESSION["user_id"];
        $result = delete($conn,"delete from group_mapping where p_group = '$user_group'");
    
        $sql = "INSERT INTO group_mapping (p_group,user,updated_by) VALUES ";
        foreach($detail as $key=>$value){
            $sql .= "('".$user_group."','".$value."','".$user."'),";
        }
        $sql = rtrim($sql,',');
        $result = create($conn,$sql);
?>