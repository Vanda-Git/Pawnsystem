<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>
<?php
$datas_parameter = [];
    $sql = "select
                ROW_NUMBER() OVER (
                    ORDER BY t1.id
                ) no,
                t1.id,
                t1.code,
                t1.name,
                t1.caption,
                t1.remark,
                t1.note
            from d_master t1 where t1.name not in ('PROVINCE','DISTRICT','COMMUNE','VILLAGE')";
    $datas_parameter = fetch_all($conn, $sql);

?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">
            <a href="add.php" class="btn btn-primary btn_add">
                <i class="fas fa-plus"></i>
                New Record
            </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Caption</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datas_parameter as $data) {
                    ?>
                        <tr>
                            <td>
                                <?= @$data['no'] ?>
                                <input type="hidden" name="txt_id" class="txt_id" value="<?= @$data['id'] ?>">
                            </td>
                            <td><?= @$data["code"] ?></td>
                            <td><?= @$data["name"] ?></td>
                            <td><?= @$data["caption"] ?></td>
                            <td><?= @$data["status"] ?></td>
                            <td><?= @$data["remark"] ?></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>" class="btn btn-warning btn-xs btn_update"><i class="fas fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<?php include("../Layout/Footer_Iframe.php"); ?>
