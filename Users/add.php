<?php include("../Layout/Header_Iframe.php"); ?>
<?php include("../Config/Database.php"); ?>
<?php
if (isset($_POST["btn_save"])) {
    $firstname = $_POST["txt_firstname"];
    $lastname = $_POST["txt_lastname"];
    $user = $_POST["txt_user"];
    $email = $_POST["txt_email"];
    $position = $_POST["txt_position"];

    $sql = "INSERT INTO users ( first_name,
                                    last_name,
                                    user,
                                    email,
                                    position,
                                    created_by
                                    )
                VALUES ('" . $firstname . "',
                        '" . $lastname . "',
                        '" . $user . "',
                        '" . $email . "',
                        '" . $position . "',
                        '1'
                    );";
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
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_title">First Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_firstname" id="txt_firstname">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_lastname">Last Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_lastname" id="txt_lastname">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_user">User Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_user" id="txt_user">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_email">Email<i class="text-danger">(*)</i></label>
                    <input type="email" class="form-control" name="txt_email" id="txt_email">
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_position">Position<i class="text-danger">(*)</i></label>
                    <select name="txt_position" id="txt_position" class="form-control" required>
                        <option value="">Select Position</option>
                        <?php
                        $datas = fetch_all($conn, "select id,title from positions");
                        foreach ($datas as $data) {
                        ?>
                            <option value="<?= @$data["id"] ?>"><?= @$data["title"] ?></option>
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