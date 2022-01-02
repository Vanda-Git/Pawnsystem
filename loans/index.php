<?php include("../Layout/Header.php"); ?>


<div class="card">
    <div class="card-header">
        <!-- <h3 class="card-title">Import Record</h3> -->
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
                    <th>Owner</th>
                    <th>Value</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Document</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = fetch_all($conn,"  select
                                            t1.id no,
                                            t1.id,
                                            t1.code,
                                            t1.owner_name,
                                            t1.value,
                                            t1.location,
                                            t1.document,
                                            t1.date_created
                                        from d_collaterals t1 WHERE status = 'N';");
                foreach($datas as $data){
                ?>
                        <tr>
                            <td><?= @$data['no'] ?></td>
                            <td><?= @$data["code"] ?></td>
                            <td><?= @$data["owner_name"] ?></td>
                            <td><?= @$data["value"] ?></td>
                            <td><?= @$data["location"] ?></td>
                            <td><?= @$data["date_created"] ?></td>
                            <td><a target="_blank" href="../Asset/Collaterals/<?= @$data["document"] ?>"><?= @$data["document"]?></a></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>" class="btn btn-warning btn-xs btn_update"><i class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" onclick='remove(<?=@$data["id"]?>,this)' class="btn btn-danger btn-xs btn_delete"><i class="fas fa-user-minus"></i> Disable</a>
                            </td>
                        </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer.php"); ?>
<script src="Collateral.js"></script>