<?php include("../Layout/Header.php"); ?>

<?php
if (isset($_POST["btn_save"])) {

    $cus_codes = $_POST["txt_cus_code"];
    $cust_types = $_POST["txt_cust_type"];
    $user = $_SESSION["user_id"];
    $CustomerGroupCode = Generate_customer_gc();

    $sql = "INSERT INTO d_group (groupcd,created_by) values ('$CustomerGroupCode','$user')";
    $mId = create_getId($conn,$sql);
    if($mId != 0){

        $sqlDetail = "INSERT INTO d_group_detail ( customer_id,
                                        groupid,
                                        groupcd,
                                        member_type,
                                        status,
                                        created_by
                                    )
                                VALUES";
        foreach ($cus_codes as $key => $value) {
            # code...
            $sqlDetail .=  "(
                            '" . $value . "',
                            '".$mId."',
                            '$CustomerGroupCode',
                            '" . $cust_types[$key] . "',
                            'N',
                            '" . $user . "'
                        ),";
        }
        $sqlDetail = rtrim($sqlDetail,',');
        $resultDetail = create($conn,$sqlDetail);
    }
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
                <div class="row main_row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="txt_cus_code">Customer Code<i class="text-danger">(*)</i></label>
                        <select name="txt_cus_code[]" id="txt_cus_code" class="form-control txt_cus_code" required>
                            <option value="">---Select item---</option>
                            <?php
                            $datas = fetch_all($conn, "select id,code,first_name_en,last_name_en from d_customer where status='N';");
                            foreach ($datas as $key => $data) {
                                ?>
                                <option value="<?= $data["id"] ?>"><?= $data["code"] . '-' . $data["first_name_en"] . ' ' . $data["last_name_en"] ?></option>
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
                                <option value="<?= $data["code"] ?>"><?= $data["caption"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
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