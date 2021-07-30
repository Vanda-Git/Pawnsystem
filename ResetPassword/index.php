<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>
<?php
$datas_permission = [];
if (isset($_POST["btn_save"])) {
    $user = $_POST["txt_user"];
    $defaultPassword = md5(md5($parameters["DefaultPassword"]));
    $data = update($conn,"UPDATE users SET password = '$defaultPassword' WHERE id = '$user'");
    
}


?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="txt_user">User List</label>
                    <select name="txt_user" id="txt_user" required class="form-control txt_user">
                        <option value="">---Select User---</option>
                        <?php
                        $sql_all = " select
                                            t1.id,
                                            concat(t1.first_name,' ',t1.last_name) as fullname,
                                            t1.user
                                        from users t1 where t1.status = '1'
                                    ";

                        $datas_all = fetch_all($conn, $sql_all);
                        foreach ($datas_all as $data) {
                        ?>
                            <option value="<?= @$data["id"] ?>"><?= @$data["fullname"].' ['.@$data["user"].']' ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="">&emsp;</label>
                    <br>
                    <button type="submit" class="btn btn-primary btn_update" name="btn_save">Reset Password</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include("../Layout/Footer_Iframe.php"); ?>