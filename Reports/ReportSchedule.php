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
                    <p>ការិយាល័យ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 0002- សាខាការិយាល័យកណ្តាល</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កម្ចីវគ្គទី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 1</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>គណនីអតិថិជន​</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 0002-02-52138-00241-6</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អតិថិជនឈ្មោះ​</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: ប្រុស វណ្ណនីដា</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>លេខអតិថិជន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 0002-1-011086</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>លេខកូដ & ឈ្មោះមេក្រុម</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កាលបរិច្ឆេទនៃកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 30-09-2021</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>កាលអវសាននៃកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 26-09-2024</p>
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
                    <p>: 1092 ថ្ងៃ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>គោលបំណងកម្ចី</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: កម្ចីបុគ្គលិក-បម្រើបម្រាស់ផ្សេងៗ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>រូបិយប័ណ្ណ</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: ដុល្លារ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អាស័យដ្ឋាន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: តាំងក្រង់, ស្វាយទាប, ចំការលើ, កំពង់ចាម</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>សោហ៊ុយ​ត្រួតពិនិត្យឥណទាន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 0.00% / 1 ខែ នៃ​សមតុល្យឥណទាន</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>ទីតាំងបង់ប្រាក់</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: នៅការិយាល័យហ្វូណន</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>អត្រាការប្រាក់</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p>: 0.833% / 1 ខែ</p>
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
                            foreach ($datas as $data) {
                                $tpay += $data["payment"];
                                $tprint += $data["principle"];
                                $tint += $data["interest"];
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