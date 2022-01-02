<?php include("../Layout/Header.php"); ?>

<?php
$update_id = @$_GET["update_id"];

if (isset($_POST["btn_save"])) {
    $name = $_POST["txt_name"];
    $value = $_POST["txt_value"];

    $sql = "UPDATE parameters SET value='$value' where id='$update_id' and name = '$name'";
    $result = update($conn, $sql);
}
if (isset($_GET["update_id"])) {

    $datas = fetch_single($conn, "SELECT * FROM parameters where id= '" . $update_id . "'");

    $name = $datas["name"];
    $value = $datas["value"];
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
        <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_name">Parameter Name<i class="text-danger">(*)</i></label>
                    <input type="text" readonly="" class="form-control" name="txt_name" id="txt_name" value="<?=@$name?>">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_value">Parameter Value <i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_value" id="txt_value" required value="<?=@$value?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <button type="submit" class="btn btn-success" name="btn_save"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-redo"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer.php"); ?>