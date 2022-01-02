<?php include("../Layout/Header.php"); ?>

<?php
$datas_parameter = [];
    $sql = "select
                t1.id no,
                t1.id,
                t1.name,
                t1.value
            from parameters t1";
    $datas_parameter = fetch_all($conn, $sql);

?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <?php
                    foreach ($datas_parameter as $data) {
                    ?>
                        <tr>
                            <td>
                                <?= @$data['no'] ?>
                                <input type="hidden" name="txt_id" class="txt_id" value="<?= @$data['id'] ?>">
                            </td>
                            <td><?= @$data["name"] ?></td>
                            <td><?= @$data["value"] ?></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>" class="btn btn-warning btn-xs btn_update"><i class="fas fa-edit"></i> Edit</a>
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
        </div>
    </form>
</div>
<?php include("../Layout/Footer.php"); ?>