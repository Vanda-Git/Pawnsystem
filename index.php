<?php
    include "Config/Database.php";
    if(!(isset($_SESSION["user_id"]) && !empty($_SESSION['user_id']))){
    }
    else{
        // echo "<script>window.parent.location.href='Dashboard/';</script>";
        header("Location: Dashboard/");
    }
    if(isset($_POST["btn_login"])){
        $username = $_POST["user"];
        $password = $_POST["password"];
        
        $data = authorize($conn,$username,$password);
    }
    
?>

<link rel="stylesheet" href="dist/css/Login/login.css">
<link rel="stylesheet" href="dist/css/Login/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="Asset/System/Logo.png" type="image/x-icon">
<script src="dist/css/Login/bootstrap.bundle.min.js"></script>
<script src="dist/css/Login/jquery.min.js"></script>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <!-- <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div> -->
                    <div class="row"> <img src="Asset/System/Logo.png" class="logo"> </div>
                    <!-- <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div> -->
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="Asset/System/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="" method="POST">
                    <div class="card2 card border-0 px-4 py-5">
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>
                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>
                        <div class="row px-3 mb-4">
                            <div class="line"></div> <small class="or text-center">Or</small>
                            <div class="line"></div>
                        </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label> <input class="mb-4" type="text" name="user" placeholder="Enter a valid username"> </div>
                        <div class="row px-3"> <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label> <input type="password" name="password" placeholder="Enter password"> </div>
                        <div class="row px-3 mb-4">
                            <!-- <div class="custom-control custom-checkbox custom-control-inline"><input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a> -->
                        </div>
                        <div class="row mb-3 px-3"> <button type="submit" name="btn_login" class="btn btn-blue text-center" style="background:#1A237E;color:white;">Login</button> </div>
                        <div class="row mb-4 px-3"> <small class="font-weight-bold">If you want system account to login, <a class="text-danger ">Please contact to system admin to create your user.</a></small> </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-blue py-4">
        <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
            <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
        </div>
    </div>
</div>
</div>