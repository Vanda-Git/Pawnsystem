<?php include("../Layout/Header.php"); ?>

<?php
if (isset($_POST["btn_save"])) {
    $title = $_POST["txt_title"];
    $note = $_POST["txt_note"];
    $user = $_SESSION["user_id"];

    $sql = "INSERT INTO groups ( title,
                                    note,
                                    created_by
                                    )
                VALUES ('" . $title . "',
                        '" . $note . "',
                        '" . $user . "'
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
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_title">Group Name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control" name="txt_title" id="txt_title">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="txt_lastname">Note</label>
                    <input type="text" class="form-control" name="txt_note" id="txt_note">
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