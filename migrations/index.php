<?php
if(isset($_POST['btn_start'])){
    $servername = "sql110.epizy.com";
    $username = "epiz_29280825";
    $password = "z6is2aSmUY6KIy";
    $database = "epiz_29280825_pawn_system_db";

    if($_SERVER['SERVER_NAME'] == 'project.localhost' || $_SERVER['SERVER_NAME'] == 'localhost'){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "pawn_system_db";
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    mysqli_set_charset($conn, 'utf8');
    date_default_timezone_set('Asia/Bangkok');

    $pin = $_POST['txt_pin'];
    if($pin == "022002"){

        $existing_file = "select filename from migrations where status = 1";
        $results = $conn->query($existing_file);
        $filenames = [];
        while ($row=$results->fetch_array()){
            $filenames[] = $row["filename"];
        }

        echo "started!";
        foreach (glob("*.*") as $filename) {
                // Create connection
                $conn1 = new mysqli($servername, $username, $password, $database);
            
                if($filename != "index.php" && !(array_search($filename, $filenames) > -1)){
                    
                    $myfile = fopen($filename, "r");
                    $sql = fread($myfile,filesize($filename));
                    
                    $sql2 = $sql . "insert into migrations(filename,status) value ('".$filename."','1');";
                    
                    fclose($myfile);
                    
                    if ($conn1->multi_query($sql2) === TRUE) {
                        echo $filename." Migrated. <br><br>";
                    } else {
                        echo "Error : " . $conn1->error;
                    }
                }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Migration Process</h1>
    <p>Please enter PIN to start migrate.</p>
    <form action="" method="post" enctype="multipart/form">
        PIN <input type="text" name="txt_pin" id="">
        <button name="btn_start">Start</button>
    </form>
</body>
</html>