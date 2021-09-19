<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php

$id = @$_GET["update_id"];

if (isset($_POST["btn_save"])) {

    $code = $_POST["txt_code"];
    $coll_type = $_POST["txt_coll_type"];
    $value = $_POST["txt_value"];
    $issue_date = $_POST["txt_issue_date"];
    $coll_number = $_POST["txt_coll_number"];
    $customer = $_POST["txt_cus_code"];
    $owner = $_POST["txt_owner"];
    $location = $_POST["txt_location"];
    $remark = $_POST["txt_remark"];

    $create_by = $_SESSION["user_id"];

    //check upload document
    $coll_document = $_POST["hidden_ducument"];
    if ($_FILES["txt_document"]["tmp_name"] != "") {
        @unlink("../Asset/Collaterals/".$coll_document);
        $coll_document = upload_image($_FILES["txt_document"], "Collaterals/");
    }
    //End uplaod document

    $sql = "UPDATE d_collaterals SET title_type='$coll_type',
                                    customer_id='$customer',
                                    owner_name='$owner',
                                    number='$coll_number',
                                    issue_date='$issue_date',
                                    value='$value',
                                    document='$coll_document',
                                    location='$location',
                                    note='$remark',
                                    updated_by='$create_by' WHERE id = '$id' and code = '$code'";

    //echo $sql;
    $data = create($conn, $sql);
}

if (isset($_GET["update_id"])) {
    $data_single_collateral = fetch_single($conn, "select 
                                                    * 
                                                    from d_collaterals 
                                                    where id = '$id'");
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
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="text-danger"><u> <i class="fa fa-arrow-right"></i> Collateral Information</u>(*)</label>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_code">Collateral Code<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_code" name="txt_code" id="txt_code" placeholder="" value="<?= $data_single_collateral["code"] ?>" readonly>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_coll_type">Collateral Type<i class="text-danger">(*)</i></label>
                    <select name="txt_coll_type" id="txt_coll_type" class="form-control txt_coll_type" required>
                        <option value="">---Select item---</option>
                        <?php
                        $datas = get_master($conn, "COLLATERAL_TYPE");
                        foreach ($datas as $key => $data) {
                        ?>
                            <option value="<?= $data["code"] ?>" <?= $data["code"] == $data_single_collateral["title_type"] ? "selected" : "" ?>><?= $data["caption"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_value">Collateral Value $ <i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_value" name="txt_value" id="txt_value" placeholder="1000$" value="<?= $data_single_collateral["value"] ?>">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_issue_date">Collateral issue date<i class="text-danger">(*)</i></label>
                    <input type="date" class="form-control txt_issue_date" name="txt_issue_date" id="txt_issue_date" value="<?= $data_single_collateral["issue_date"] ?>">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_coll_number">Collateral Number<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_coll_number" name="txt_coll_number" id="txt_coll_number" required value="<?= $data_single_collateral["number"] ?>">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_cus_code">Customer Code<i class="text-danger">(*)</i></label>
                    <select name="txt_cus_code" id="txt_cus_code" class="form-control txt_cus_code" required>
                        <option value="">---Select item---</option>
                        <?php
                        $datas = fetch_all($conn, "select id,code,first_name_en,last_name_en from d_customer where status='N';");
                        foreach ($datas as $key => $data) {
                        ?>
                            <option <?= $data_single_collateral["customer_id"]==$data["id"]?"selected":""?> value="<?= $data["id"] ?>"><?= $data["code"] . '-' . $data["first_name_en"] . ' ' . $data["last_name_en"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_owner">Collateral Owner's Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_owner" name="txt_owner" id="txt_owner" required value="<?= $data_single_collateral["owner_name"] ?>">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_document">Document<i class="text-danger">(*)</i></label>
                    <input type="hidden" name="hidden_ducument" value="<?= $data_single_collateral["document"] ?>">
                    <input type="file" class="form-control txt_document" name="txt_document" id="txt_document">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_location">Location<i class="text-danger"></i></label>
                    <input type="text" class="form-control txt_location" name="txt_location" id="txt_location" value="<?= $data_single_collateral["location"] ?>">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_remark">Remark<i class="text-danger"></i></label>
                    <input type="text" class="form-control txt_remark" name="txt_remark" id="txt_remark" value="<?= $data_single_collateral["note"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success btn_save" name="btn_save"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-redo"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer_Iframe.php"); ?>
<script src="Customer.js"></script>