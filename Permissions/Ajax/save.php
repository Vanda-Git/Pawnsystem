<?php include("../../Config/Database.php"); ?>
<?php
    $user_group = $_POST["user_group"];
    $menu_group = $_POST["menu_group"];
    
    $detail = $_POST["detail"];
    $user = $_SESSION["user_id"];
        $result = delete($conn,"delete from permissions where p_group = '$user_group' AND sub_menu in (select id from sub_menus where main_menu = '$menu_group')");
    
        $sql = "INSERT INTO permissions (sub_menu,p_group,views,adds,updates,deletes,updated_by) VALUES ";
        foreach($detail as $key=>$value){
            //echo $key;
            echo "<br>";
            $id = $value["0"];
            $view = $value["1"];
            $add = $value["2"];
            $update = $value["3"];
            $delete = $value["4"];
            //echo $view;
            $sql .= "('".$id."','".$user_group."','".$view."','".$add."','".$update."','".$delete."','".$user."'),";
        }
        $sql = rtrim($sql,',');
        $result = create($conn,$sql);
?>