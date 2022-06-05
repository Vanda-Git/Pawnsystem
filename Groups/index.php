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
                                                t1.id no,
                                                t1.id,
                                                t1.title,
                                                t1.note,
                                                concat(t2.first_name,' ',t2.last_name) as fullname,
                                                t1.date_created
                                            from groups t1
                                            inner join users t2 on t1.created_by = t2.id");
                foreach($datas as $key => $data){
                ?>
                        <tr>
                            <td><?= @$key+1 ?></td>
                            <td><?= @$data["title"] ?></td>
                            <td><?= @$data["note"] ?></td>
                            <td><?= @$data["fullname"] ?></td>
                            <td><?= @$data["date_created"] ?></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>" class="btn btn-warning btn-xs btn_update"><i class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" onclick='remove(<?=@$data["id"]?>,this)' class="btn btn-danger btn-xs btn_delete"><i class="fas fa-user-minus"></i> Disable</a>
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

<script src="Group.js"></script>
<?php include("../Layout/Footer.php"); ?>