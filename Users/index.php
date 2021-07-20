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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Position</th>
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
                                                t1.first_name,
                                                t1.last_name,
                                                t1.user,
                                                t1.email,
                                                t2.title,
                                                t1.date_created
                                            from users t1
                                            inner join positions t2 on t1.position = t2.id where t1.status = 1");
                foreach($datas as $data){
                ?>
                        <tr>
                            <td><?= @$data['no'] ?></td>
                            <td><?= @$data["first_name"] ?></td>
                            <td><?= @$data["last_name"] ?></td>
                            <td><?= @$data["user"] ?></td>
                            <td><?= @$data["email"] ?></td>
                            <td><?= @$data["title"] ?></td>
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