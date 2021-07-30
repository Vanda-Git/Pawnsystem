<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php
if (isset($_POST["btn_save"])) {
    $code = $_POST["txt_code"];
    $name = $_POST["txt_name"];
    $caption = $_POST["txt_caption"];
    $remark = $_POST["txt_remark"];
    $status = $_POST["txt_status"];
    $user = $_SESSION["user_id"];

    $sql = "INSERT INTO d_master(code, name, caption, remark, status,created_by)
            values ('$code','$name','$caption','$remark','$status','$user');";
    $result = create($conn, $sql);
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
                    <label for="txt_code">Code<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_code" id="txt_code">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_name">Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_name" id="txt_name">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_caption">Caption<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_caption" id="txt_caption">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_remark">Remark</label>
                    <input type="text" class="form-control" name="txt_remark" id="txt_remark">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_status">Status</label>
                    <input type="text" class="form-control" name="txt_status" id="txt_status">
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

<?php include("../Layout/Footer_Iframe.php"); ?>
