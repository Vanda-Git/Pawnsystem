<?php include("../Layout/Header.php"); ?>

<?php
if (isset($_POST["btn_search"])) {
    $CrdCode = $_POST["txt_crd_code"];
    $sql = "select due_number,
                    due_date,
                    payment,
                    principle,
                    t1.interest,
                    balance
                    from d_crd_schedule t1
                    inner join d_credit t2 on t1.credit_id = t2.id
            where t2.code = '".$CrdCode."'";
    $datas = fetch_all($conn, $sql);

    $sql1="select
                crd.cycle,
                crd.code crdCode,
                dc.first_name_kh,
                dc.last_name_kh,
                dc.code cusCode,
                crd.dis_date,
                DATE_ADD(crd.dis_date, INTERVAL crd.tenor MONTH) MaturityDate,
                crd.tenor,
                DATEDIFF(crd.dis_date, DATE_ADD(crd.dis_date, INTERVAL crd.tenor MONTH)) tenorAsDay,
                crd.purpose,
                dc.address_line1,
                FORMAT(crd.admin_fee, 2) admin_fee,
                FORMAT(crd.interest/12, 2) interest,
                crd.currency
            from d_credit crd
            inner join d_group_detail dgd on crd.customerId = dgd.groupId and dgd.member_type='1'
            inner join d_customer dc on dgd.customer_id = dc.id
            where crd.code='".$CrdCode."' and ctmType='J'
            union all
            select
                crd.cycle,
                crd.code crdCode,
                dc.first_name_kh,
                dc.last_name_kh,
                dc.code cusCode,
                crd.dis_date,
                DATE_ADD(crd.dis_date, INTERVAL crd.tenor MONTH) MaturityDate,
                crd.tenor,
                DATEDIFF(crd.dis_date, DATE_ADD(crd.dis_date, INTERVAL crd.tenor MONTH)) tenorAsDay,
                crd.purpose,
                dc.address_line1,
                FORMAT(crd.admin_fee, 2) admin_fee,
                FORMAT(crd.interest/12, 2) interest,
                crd.currency
            from d_credit crd
            inner join d_customer dc on crd.customerId = dc.id
            where crd.code='".$CrdCode."' and ctmType='S'";
    @$data1 = fetch_single($conn, $sql1);
}


?>
<div class="card">
    <form action="" method="post">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <label for="txt_crd_code">Credit Account</label>
                    <input type="text" name="txt_crd_code" id="txt_crd_code" required
                        class="form-control txt_crd_code" value="<?=@$_POST["txt_crd_code"]?>"/>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>កាលវិភាគសងប្រាក់</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កម្ចីវគ្គទី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["cycle"]?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អតិថិជនឈ្មោះ​</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["last_name_kh"]?> <?=@$data1["first_name_kh"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>គណនីអតិថិជន​</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["crdCode"]?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>លេខអតិថិជន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["cusCode"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កាលបរិច្ឆេទនៃកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["dis_date"]?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កាលអវសាននៃកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["MaturityDate"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>លេខគណនីសន្សំ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: គ្មាន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>រយៈពេលខ្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["tenorAsDay"]?> ថ្ងៃ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>គោលបំណងកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["purpose"]?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>រូបិយប័ណ្ណ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>:  <?=@$data1["currency"]?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អាស័យដ្ឋាន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["address_line1"]?></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>សោហ៊ុយ​ត្រួតពិនិត្យឥណទាន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["admin_fee"]?>% / 1 ខែ នៃ​សមតុល្យឥណទាន</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>ទីតាំងបង់ប្រាក់</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: នៅការិយាល័យ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អត្រាការប្រាក់</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: <?=@$data1["interest"]?>% / 1 ខែ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>អតិថិជនមានជម្រើសក្នុងការបង់ប្រាក់សំណងរបស់ខ្លួនតាមរយៈភ្នាក់ងារ ទ្រូម៉ាន់នី គ្រប់ទីកន្លែង។</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>ល.រ</th>
                            <th>ថ្ងៃសងប្រាក់</th>
                            <th>សរុបត្រូវបង់</th>
                            <th>ប្រាក់ដើម</th>
                            <th>ការប្រាក់</th>
                            <th>សោហ៊ុយត្រួតពិនិត្យឥណទាន (ប្រចាំខែ)</th>
                            <th>សមតុល្យ ប្រាក់ដើម​</th>
                            <th>ផ្សេងៗ</th>
                        </tr>
                        <?php
                            $tpay = 0;
                            $tprint = 0;
                            $tint = 0;
                            foreach (@$datas as $data) {
                                $tpay += @$data["payment"];
                                $tprint += @$data["principle"];
                                $tint += @$data["interest"];
                            ?>
                                <tr>
                                    <td><?= @$data["due_number"] ?></td>
                                    <td><?= @$data["due_date"] ?></td>
                                    <td><?= @$data["payment"] ?></td>
                                    <td><?= @$data["principle"] ?></td>
                                    <td><?= @$data["interest"] ?></td>
                                    <td>0.00</td>
                                    <td><?= @$data["balance"] ?></td>
                                    <td></td>
                                </tr>
                            <?php
                            }
                        ?>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right">សរុប</td>
                                <td><?= $tpay ?></td>
                                <td><?= $tprint ?></td>
                                <td><?= $tint ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
</div>
</form>
</div>
<?php include("../Layout/Footer.php"); ?>