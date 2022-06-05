<?php include("../Layout/Header.php"); ?>

<?php
$id = @$_GET["update_id"];
$cd = @$_GET["groupCd"];
if (isset($_POST["btn_save"])) {

    $cus_codes = $_POST["txt_cus_code"];
    $cust_types = $_POST["txt_cust_type"];
    $user = $_SESSION["user_id"];

    $sql_delete = "Delete from d_group_detail where groupId = '$id'";
    $result = delete($conn, $sql_delete);
    $ReUpdate = updateWithNoMessage($conn,"update d_group set updated_date=CURDATE(),updated_by='$user' where id = '$id'");
    if($result == 0 && $ReUpdate == 0){
        $sql = "ERROR";
    }
    else{
        $sql = "";
    }
        $sql .= "INSERT INTO d_group_detail ( customer_id,
                                    groupId,
                                    groupcd,
                                    member_type,
                                    status,
                                    created_by
                                )
                            VALUES";
    foreach ($cus_codes as $key => $value) {
        # code...
        $sql .=     "(  '" . $value . "',
                        '$id',
                        '$cd',
                        '" . $cust_types[$key] . "',
                        'N',
                        '" . $user . "'
                    ),";
    }
    $sql = rtrim($sql,',');
    $result = createWithCustomMessage($conn,$sql,"Record has been Updated.");
}
?>
<div class="card">
    <div class="card-header">
        <!-- <h3 class="card-title">Import Record</h3> -->
        <a href="index.php" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i>
            Back to List
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST">
            <div class="parent_row">
                <?php
                $CusSql = "select
                                    t1.customer_id,
                                    t1.member_type
                            from d_group_detail as t1
                            where t1.groupId='".$id."'";
                $cusDatas = fetch_all($conn,$CusSql);

                foreach ($cusDatas as $cus_Key => $cusData) 
                {
                ?>
                <div class="row <?=$cus_Key==0?"main_row":""?>">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="txt_cus_code">Customer Code<i class="text-danger">(*)</i></label>
                        <select name="txt_cus_code[]" id="txt_cus_code" class="form-control txt_cus_code" required>
                            <option value="">---Select item---</option>
                            <?php
                            $datas = fetch_all($conn, "select id,code,first_name_en,last_name_en from d_customer where status='N';");
                            foreach ($datas as $key => $data) {
                                ?>
                                <option value="<?= $data["id"] ?>" <?=$cusData["customer_id"]==$data["id"]?"selected":"" ?> ><?= $data["code"] . '-' . $data["first_name_en"] . ' ' . $data["last_name_en"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="txt_cust_type" class="col-12">
                            Customer Type<i class="text-danger">(*)</i>
                            <i class='fa fa-times-circle text-danger' onclick="remove_this_row(this)" style="float:right;"></i>
                        </label>
                        
                        <select name="txt_cust_type[]" id="txt_cust_type" class="form-control txt_cust_type" required>
                            <option value="">---Select item---</option>
                            <?php
                            $datas = get_master($conn, "CUST_TYPE");
                            foreach ($datas as $key => $data) {
                                ?>
                                <option value="<?= $data["code"] ?>" <?=$cusData["member_type"]==$data["code"]?"selected":"" ?>><?= $data["caption"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <button type="button" onclick="add()" class="btn btn-success" id="btn_add" name="btn_add"><i class="fas fa-plus"></i> Add Customer</button>
                    <button type="submit" class="btn btn-success" name="btn_save"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-redo"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<script src="CustomerGroup.js"></script>
<?php include("../Layout/Footer.php"); ?>