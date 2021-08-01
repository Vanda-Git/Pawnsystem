<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>
<?php
$datas_permission = [];
if (isset($_POST["btn_search"])) {
    $user_group = $_POST["txt_user_group"];
    $menu_group = $_POST["txt_menu_group"];
    $sql = "select
                    t1.id no,
                    t1.id,
                    t1.caption,
                    t2.views,
                    t2.adds,
                    t2.updates,
                    t2.deletes
                from sub_menus t1
                left join
                    (
                        select t1.sub_menu,
                            t1.views,
                            t1.adds,
                            t1.updates,
                            t1.deletes
                        from permissions t1
                        where t1.p_group = '$user_group'
                    ) t2 on t2.sub_menu = t1.id
                inner join main_menus t3 on t3.id = t1.main_menu
                where main_menu = '$menu_group'";
    $datas_permission = fetch_all($conn, $sql);
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
                    <label for="txt_menu_group">Menu Group</label>
                    <select name="txt_menu_group" id="txt_menu_group" required class="form-control txt_menu_group">
                        <option value="">---Select Group---</option>
                        <?php
                        $datas = fetch_all($conn, "select id,caption from main_menus");
                        foreach ($datas as $data) {
                        ?>
                            <option <?= @$_POST["txt_menu_group"] == @$data["id"] ? "selected" : "" ?> value="<?= @$data["id"] ?>"><?= @$data["caption"] ?></option>
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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Caption</th>
                        <th>View</th>
                        <th>Add</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php
                    foreach ($datas_permission as $data) {
                    ?>
                        <tr>
                            <td>
                                <?= @$data['no'] ?>
                                <input type="hidden" name="txt_id" class="txt_id" value="<?= @$data['id'] ?>">
                            </td>
                            <td><?= @$data["caption"] ?></td>
                            <td>
                                <input type="checkbox" name="views" class="views" value="1" <?= @$data["views"] == '1' ? 'checked' : '' ?> >
                            </td>
                            <td>
                                <input type="checkbox" name="adds" class="adds" value="1" <?= @$data["adds"] == '1' ? 'checked' : '' ?> >
                            </td>
                            <td>
                                <input type="checkbox" name="updates" class="updates" value="1" <?= @$data["updates"] == '1' ? 'checked' : '' ?> >
                            </td>
                            <td>
                                <input type="checkbox" name="deletes" class="deletes" value="1" <?= @$data["deletes"] == '1' ? 'checked' : '' ?> >
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </tfoot> -->
            </table>
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
<script src="Permission.js"></script>