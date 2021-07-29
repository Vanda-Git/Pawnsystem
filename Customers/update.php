<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php
$update_id = @$_GET["update_id"];

if (isset($_POST["btn_save"])) {
    $firstname = $_POST["txt_firstname"];
    $lastname = $_POST["txt_lastname"];
    $user = $_POST["txt_user"];
    $email = $_POST["txt_email"];
    $position = $_POST["txt_position"];

    $sql = "UPDATE users SET first_name='$firstname',
                            last_name='$lastname',
                            email='$email',
                            position='$position',
                            updated_by='1'
                            where id='$update_id' and user = '$user'";
    $result = update($conn, $sql);
}
if (isset($_GET["update_id"])) {

    $datas = fetch_single($conn, "SELECT * FROM users where id= '" . $update_id . "'");

    $first_name = $datas["first_name"];
    $last_name = $datas["last_name"];
    $user = $datas["user"];
    $email = $datas["email"];
    $phone = $datas["phone"];
    $image = $datas["image"];
    $position = $datas["position"];
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_title">First Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_firstname" id="txt_firstname" value="<?= @$first_name ?>">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_lastname">Last Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_lastname" id="txt_lastname" value="<?= @$last_name ?>">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_user">User Name<i class="text-danger">(*)</i></label>
                    <input type="text" readonly class="form-control" name="txt_user" id="txt_user" value="<?= @$user ?>">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_email">Email<i class="text-danger">(*)</i></label>
                    <input type="email" class="form-control" name="txt_email" id="txt_email" value="<?= @$email ?>">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_position">Position<i class="text-danger">(*)</i></label>
                    <select name="txt_position" id="txt_position" class="form-control" required value="<?= @$position ?>">
                        <option value="">Select Position</option>
                        <?php
                        $datas = fetch_all($conn, "select id,title from positions");
                        foreach ($datas as $data) {
                        ?>
                            <option <?= @$data["id"] == @$position ? "selected" : "" ?> value="<?= @$data["id"] ?>"><?= @$data["title"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn btn-success" name="btn_save"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-redo"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer_Iframe.php"); ?>