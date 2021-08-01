<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Bangkok");

$servername = "sql110.epizy.com";
$username = "epiz_29280825";
$password = "z6is2aSmUY6KIy";
$database = "epiz_29280825_pawn_system_db";
if($_SERVER['SERVER_NAME'] == 'project.localhost'){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "pawn_system_db";
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
//  if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//  }


?>

<?php

function fetch_all($con, $query)
{
        $resourse = $con->query($query);
        $results = [];
        while ($row = $resourse->fetch_assoc()) {
                $results[] = $row;
        }
        return $results;
}
function fetch_single($con, $query)
{
        $resourse = $con->query($query);
        $results = [];
        if ($row = $resourse->fetch_array()) {
                $results[0] = $row;
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>' . $con->connect_error . '</strong>Please contact to system admin.
                            </div>';
                return 0;
        }
        return $results[0];
}
function get_master($con, $name)
{
        $query = "SELECT code,name,caption FROM d_master where name='$name' order by code asc";
        $resourse = $con->query($query);
        $results = [];
        while ($row = $resourse->fetch_array()) {
                $results[] = $row;
        }
        return $results;
}
function authorize($con, $username, $password)
{
        $password = md5(md5($password));
        $resourse = $con->query("SELECT
                                        t1.*,
                                        GROUP_CONCAT(t2.p_group SEPARATOR ',') user_group
                                FROM users t1
                                inner join group_mapping t2 on t1.id = t2.user
                                WHERE t1.status = '1' AND t1.user='$username' AND t1.password='$password'
                                group by t2.user
                                ");
        if ($resourse->num_rows > 0) {
                if ($row = $resourse->fetch_array()) {
                        $_SESSION["user_id"] = $row["id"];
                        $_SESSION["user_name"] = $row["user"];
                        $_SESSION["user_firstname"] = $row["first_name"];
                        $_SESSION["user_lastname"] = $row["last_name"];
                        $_SESSION["user_position"] = $row["position"];
                        $_SESSION["user_group"] = $row["user_group"];
                        header("Location: MainIframe/");
                } else {
                        echo '<div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Incorrect Password!</strong>Please try again.
                                </div>';
                }
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Incorrect Password!</strong>Please try again.
                        </div>';
        }
}
function create($con, $query)
{
        if ($con->query($query) === TRUE) {
                echo '<div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong>New record has been Inserted.
                            </div>';
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>' . $query . $con->connect_error . '</strong>Please contact to system admin.
                            </div>';
        }
}
function changePassword($con, $query)
{
        $con->query($query);
        if ($con->affected_rows > 0) {
                echo '<div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong>Record has been Updated.
                            </div>';
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Incorrect Current password! </strong>Please contact to system admin.
                            </div>';
        }
}
function update($con, $query)
{
        if ($con->query($query) === TRUE) {
                echo '<div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong>Record has been Updated.
                            </div>';
                return 1;
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>' . $con->connect_error . '</strong>Please contact to system admin.
                            </div>';
                return 0;
        }
}
function delete($con, $query)
{
        if ($con->query($query) === TRUE) {
                return 1;
        } else {
                return 0;
        }
}
function singleParameter($conn, $name)
{
        return fetch_single($conn, "select value from parameter where name='$name'");
}
function allParameter($conn)
{
        $json_data = [];
        $datas = fetch_all($conn, "select name,value from parameters");
        foreach ($datas as $key => $value) {
                $json_data[$value["name"]] = $value["value"];
        }
        return $json_data;
}
$parameters = allParameter($conn);

function upload_image($file, $path)
{

        $file_name = date("Ymdhis") . '.png';
        $target_file = "../Asset/" . $path . $file_name;
        $uploadOk = 1;
        $check = getimagesize($file["tmp_name"]);

        if ($check !== false) {
                $uploadOk = 1;
        } else {
                $uploadOk = 0;
        }
        // Check file size
        if ($file["size"] > 500000) {
                $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
                return "0";
                // if everything is ok, try to upload file
        } else {
                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                        return $file_name;
                } else {
                        return "0";
                }
        }
}
