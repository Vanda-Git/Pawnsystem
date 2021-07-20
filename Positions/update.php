<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php
$update_id = @$_GET["update_id"];

if (isset($_POST["btn_save"])) {
    $title = $_POST["txt_title"];
    $note = $_POST["txt_note"];
    $user = $_SESSION["user_id"];

    $sql = "UPDATE positions SET title='$title',
                            note='$note',
                            updated_by='$user'
                            where id='$update_id'";
    $result = update($conn, $sql);
}
if (isset($_GET["update_id"])) {

    $datas = fetch_single($conn, "SELECT * FROM positions where id= '" . $update_id . "'");

    $title = $datas["title"];
    $note = $datas["note"];
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
                    <label for="txt_title">Position Title<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_title" id="txt_title" value="<?=@$title?>">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_lastname">Note</label>
                    <input type="text" class="form-control" name="txt_note" id="txt_note" value="<?=@$note?>">
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