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
                    <th>Credit Account</th>
                    <th>Customer Name</th>
                    <th>Request Amount</th>
                    <th>Repayment Mode</th>
                    <th>Submit Date</th>
                    <th>Credit Officer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $datas = fetch_all($conn,"
                select
                        t1.id,
                       t1.code,
                       t3.first_name_en,
                       t3.last_name_en,
                       FORMAT(t1.request_amount,2) request_amount,
                       t1.currency,
                       t5.caption Repay_Type,
                       t1.date_created,
                       t6.caption co
                from
                d_credit as t1
                inner join
                    (
                    select id,id cusId,'S' ctmType from d_customer
                        union all
                    select dg.id,customer_id cusId,'J' ctmType from d_group as dg
                    inner join d_group_detail dgd on dg.id = dgd.groupId
                    where dgd.member_type = '1'
                    ) as t2 on t1.ctmType = t2.ctmType and t1.customerId=t2.id
                inner join d_customer as t3 on t2.cusId = t3.id
                inner join d_master as t4 on t1.ctmType = t4.code and t4.name='CTM_TYPE'
                inner join d_master as t5 on t1.repayment_type = t5.code and t5.name='REPAYMENT_TYPE'
                inner join d_master as t6 on t1.co_id = t6.code and t6.name='CO'
                WHERE t1.status in ('N','P')");
                foreach($datas as $key => $data){
                ?>
                        <tr>
                            <td><?= @$key+1 ?></td>
                            <td><?= @$data["code"] ?></td>
                            <td><?= @$data["first_name_en"] ?> <?= @$data["last_name_en"] ?></td>
                            <td><?= @$data["request_amount"] ?><?= @$data["currency"]=="USD"?"$":"Real" ?></td>
                            <td><?= @$data["Repay_Type"] ?></td>
                            <td><?= @$data["date_created"] ?></td>
                            <td><?= @$data["co"] ?></td>
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
<script src="Loan.js?v=1"></script>