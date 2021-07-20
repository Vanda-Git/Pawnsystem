<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php include("../Config/Authorize.php"); ?>

<div class="card">
    <div class="card-header">
        <!-- <h3 class="card-title">Import Record</h3> -->
        <a href="add.php" class="btn btn-primary">
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
                    <th>Title</th>
                    <th>Note</th>
                    <th>Created By</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = fetch_all($conn,"  select
                                                ROW_NUMBER() OVER (
                                                    ORDER BY t1.id
                                                ) no,
                                                t1.id,
                                                t1.title,
                                                t1.note,
                                                concat(t2.first_name,' ',t2.last_name) as fullname,
                                                t1.date_created
                                            from positions t1
                                            inner join users t2 on t1.created_by = t2.id");
                foreach($datas as $data){
                ?>
                        <tr>
                            <td><?= @$data['no'] ?></td>
                            <td><?= @$data["title"] ?></td>
                            <td><?= @$data["note"] ?></td>
                            <td><?= @$data["fullname"] ?></td>
                            <td><?= @$data["date_created"] ?></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" onclick='remove(<?=@$data["id"]?>,this)' class="btn btn-danger btn-xs"><i class="fas fa-user-minus"></i> Disable</a>
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
    <!-- /.card-body -->
</div>

<script src="user.js"></script>
<?php include("../Layout/Footer_Iframe.php"); ?>