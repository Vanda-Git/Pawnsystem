<?php
    if(!(isset($_SESSION["user_id"]) && !empty($_SESSION['user_id']))){
        echo "<script>window.parent.location.href='../';</script>";
    }
    else{
        // header("Location: ../index.php");
    }
?>