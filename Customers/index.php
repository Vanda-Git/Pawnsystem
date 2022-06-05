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
                    <th>Full Name en</th>
                    <th>Full Name kh</th>
                    <th>DOB</th>
                    <th>Credit Officer</th>
                    <th>Document</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = fetch_all($conn,"  select
                                                t1.id no,
                                                t1.code,
                                                t1.email,
                                                concat(t1.first_name_en,' ',t1.last_name_en) as fullname_en,
                                                concat(t1.first_name_kh,' ',t1.last_name_kh) as fullname_kh,
                                                t1.id,
                                                t1.dob,
                                                t1.date_created,
                                                t1.co_id,
                                                t1.id1_document
                                            from d_customer t1 WHERE t1.status='N';");
                foreach($datas as $key => $data){
                ?>
                        <tr>
                            <td><?= @$key+1 ?></td>
                            <td><?= @$data["code"] ?></td>
                            <td><?= @$data["fullname_en"] ?></td>
                            <td><?= @$data["fullname_kh"] ?></td>
                            <td><?= @$data["dob"] ?></td>
                            <td><?= @$data["co_id"] ?></td>
                            <td><a target="_blank" href="../Asset/Customers/ID/<?= @$data["id1_document"] ?>"><?= @$data["id1_document"] ?></a></td>
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
        </table>
    </div>
    <!-- /.card-body -->
</div>

<script src="Customer.js"></script>
<?php include("../Layout/Footer.php"); ?>