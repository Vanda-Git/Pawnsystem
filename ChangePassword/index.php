<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>
<?php
$datas_permission = [];
if (isset($_POST["btn_save"])) {
    $old = md5(md5($_POST["txt_old"]));
    $new = md5(md5($_POST["txt_new"]));
    $c_new = md5(md5($_POST["txt_c_new"]));
    $user = $_SESSION["user_id"];
    if($new == $c_new){
        $data = changePassword($conn,"UPDATE users SET password = '$new' WHERE id = '$user' and password = '$old'");
    }else{
        echo '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>New Password must be the same with confirm password! </strong>Please try again.
                </div>';
    }

    
}


?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <label for="txt_old">Current Password</label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="password" name="txt_old" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <label for="txt_new">New Password</label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="password" name="txt_new" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                    <label for="txt_c_new">Confirm New Password</label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <input type="password" name="txt_c_new" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="">&emsp;</label>
                    <br>
                    <button type="submit" class="btn btn-primary" name="btn_save">Change Password</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include("../Layout/Footer_Iframe.php"); ?>