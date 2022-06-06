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
                    <th>No</th>
                    <th>Group Code</th>
                    <th>Customer Name</th>
                    <th>Joint Member</th>
                    <th>Member Type</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = fetch_all($conn,"select
                                                t0.id id,
                                                t1.groupcd,
                                                count(t1.customer_id) memberAmount,
                                                t2.first_name_en,
                                                t2.last_name_en,
                                                t3.caption,
                                                t1.status,
                                                t1.date_created date
                                        from
                                        d_group as t0
                                        inner join d_group_detail as t1 on t1.groupId = t0.id
                                        left join d_customer t2 on t1.customer_id = t2.id
                                        inner join d_master t3 on t1.member_type=t3.code and t3.name='CUST_TYPE'
                                        where t0.status='N'
                                        group by t1.groupcd
                                        ");
                foreach($datas as $key => $data){
                ?>
                        <tr>
                            <td><?= @$key+1 ?></td>
                            <td><?= @$data['groupcd'] ?></td>
                            <td><?= @$data["first_name_en"] ?> <?= @$data["last_name_en"] ?></td>
                            <td><?= @$data["memberAmount"] ?> People</td>
                            <td><?= @$data["caption"] ?></td>
                            <td><?= @$data["status"] ?></td>
                            <td><?= @$data["date"] ?></td>
                            <td>
                                <a href="update.php?update_id=<?=@$data["id"]?>&&groupCd=<?=@$data["groupcd"]?>" class="btn btn-warning btn-xs btn_update"><i class="fas fa-edit"></i> Edit</a>
                                <a href="javascript:void(0)" onclick='remove("<?=@$data["id"]?>",this)' class="btn btn-danger btn-xs btn_delete"><i class="fas fa-user-minus"></i> Disable</a>
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
<?php include("../Layout/Footer.php"); ?>
<script src="CustomerGroup.js"></script>