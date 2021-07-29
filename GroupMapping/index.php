<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>
<?php
$datas_permission = [];
if (isset($_POST["btn_search"])) {
    $user_group = $_POST["txt_user_group"];
    $sql_active = "select
                    t1.id,
                    concat(t1.first_name,' ',t1.last_name) as fullname
                from users t1
                inner join group_mapping t2 on t1.id = t2.user
                where t2.p_group = '$user_group'
                ";
    $sql_all = "select
                        t1.id,
                        concat(t1.first_name,' ',t1.last_name) as fullname
                    from users t1
                    where t1.id not in (
                        select t2.user
                        from group_mapping t2
                        where t2.p_group = '$user_group')";

    $datas_all = fetch_all($conn, $sql_all);
    $datas_active = fetch_all($conn, $sql_active);
}


?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="txt_user_group">User Group</label>
                    <select name="txt_user_group" id="txt_user_group" required class="form-control txt_user_group">
                        <option value="">---Select Group---</option>
                        <?php
                        $datas = fetch_all($conn, "select id,title from groups");
                        foreach ($datas as $data) {
                        ?>
                            <option <?= @$_POST["txt_user_group"] == @$data["id"] ? "selected" : "" ?> value="<?= @$data["id"] ?>"><?= @$data["title"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="">&emsp;</label>
                    <br>
                    <button type="submit" class="btn btn-primary" name="btn_search">Show</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                    <label>All user</label>
                    <select name="" id="" class="form-control txt_all_user" size="10" multiple>
                        <?php
                            foreach ($datas_all as $data) {
                            ?>
                                <option value="<?= @$data["id"] ?>"><?= @$data["fullname"] ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
                    <label for="">Action</label>
                    <button class="btn btn-default btn-block btn_move" type="button"><i class="fa fa-chevron-right"></i></button>
                    <button class="btn btn-default btn-block btn_move_all" type="button"><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i></button>
                    <button class="btn btn-default btn-block btn_move_back" type="button"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-default btn-block btn_move_back_all" type="button"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></button>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-center">
                    <label>Active User</label>
                    <select name="" id="" class="form-control txt_active_user" size="10" multiple>
                        <?php
                            foreach ($datas_active as $data) {
                            ?>
                                <option value="<?= @$data["id"] ?>"><?= @$data["fullname"] ?></option>
                            <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <br>
                    <button type="button" name="btn_save" class="btn btn-primary btn_save">Save & Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include("../Layout/Footer_Iframe.php"); ?>
<script src="GroupMapping.js"></script>