<?php
session_start();
ob_start();
date_default_timezone_set("Asia/Bangkok");

$servername = "localhost";
$username = "root";
$password = "";
$database = "pos_v1_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
//  if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//  }
function fetch_all($con, $query)
{
        $resourse = $con->query($query);
        $results = [];
        while ($row = $resourse->fetch_array()) {
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
                                <strong>' . $query . 'Fail to Save!</strong>Please contact to system admin.
                            </div>';
                return 0;
        }
        return $results[0];
}
function authorize($con, $username, $password)
{
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
                return 1;
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>' . $query . 'Fail to Save!</strong>Please contact to system admin.
                            </div>';
                return 0;
        }
}
function update($con, $query)
{
        if ($con->query($query) === TRUE) {
                echo '<div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong>New record has been Updated.
                            </div>';
                return 1;
        } else {
                echo '<div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>' . $query . 'Fail to Save!</strong>Please contact to system admin.
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
