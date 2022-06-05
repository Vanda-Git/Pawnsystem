<?php include("../Layout/Header.php"); ?>

<?php
    if(isset($_POST["btn_save"])){
        $first_name_en = $_POST["txt_first_name_en"];
        $last_name_en = $_POST["txt_last_name_en"];
        $first_name_kh = $conn->real_escape_string($_POST["txt_first_name_kh"]);
        $last_name_kh = $conn->real_escape_string($_POST["txt_last_name_kh"]);
        $gender = $_POST["txt_gender"];
        $dob = $_POST["txt_dob"];
        $phone = $_POST["txt_phone"];
        $email = $_POST["txt_email"];
        $id1_type = $_POST["txt_id_type"];
        $id1_number = $_POST["txt_id_number"];
        $id1_issue = $_POST["txt_id_issue"];
        $id1_expire = $_POST["txt_id_expire"];
        $country = $_POST["txt_country"];
        $province = $_POST["txt_province"];
        $district = $_POST["txt_district"];
        $commune = $_POST["txt_commune"];
        $village = $_POST["txt_village"];
        $address_line1 = $_POST["txt_address_line1"];
        $address_line2 = $_POST["txt_address_line2"];
        $remark = $_POST["txt_remark"];
        $target = $_POST["txt_target"];
        $is_owner = $_POST["txt_is_owner"];
        $occupation = $_POST["txt_occupation"];
        $company_name = $_POST["txt_company_name"];
        $total_income = $_POST["txt_total_income"];
        $coid = $_POST["txt_coid"];
        $create_by = $_SESSION["user_id"];
        $CustomerCode =Generate_customer_code();
        
        //check upload document
        $id1_document = upload_image($_FILES["txt_id_document"],"Customers/ID/");
        //End uplaod document

        $sql = "INSERT INTO d_customer (
                code,
                first_name_en,
                last_name_en,
                first_name_kh,
                last_name_kh,
                gender,
                dob,
                phone,
                email,
                id1_type,
                id1_number,
                id1_document,
                id1_issue,
                id1_expire,
                country,
                province,
                district,
                commune,
                village,
                address_line1,
                address_line2,
                remark,
                is_owner,
                target,
                occupation,
                company_name,
                total_income,
                co_id,
                currency,
                created_by    
                )
                VALUES
                (
                '".$CustomerCode."',
                '".$first_name_en."',
                '".$last_name_en."',
                '".$first_name_kh."',
                '".$last_name_kh."',
                '".$gender."',
                '".$dob."',
                '".$phone."',
                '".$email."',
                '".$id1_type."',
                '".$id1_number."',
                '".$id1_document."',
                '".$id1_issue."',
                '".$id1_expire."',
                '".$country."',
                '".$province."',
                '".$district."',
                '".$commune."',
                '".$village."',
                '".$address_line1."',
                '".$address_line2."',
                '".$remark."',
                '".$is_owner."',
                '".$target."',
                '".$occupation."',
                '".$company_name."',
                '".$total_income."',
                '".$coid."',
                'USD',
                '".$create_by."'
                )";
        //echo $sql;
        $data = create($conn, $sql);
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
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="text-danger"><u> <i class="fa fa-arrow-right"></i> General Information</u>(*)</label>
                    <input type="hidden" class="form-control txt_code" name="txt_code" id="txt_code" value="" readonly>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_id_type">ID Type<i class="text-danger">(*)</i></label>
                    <select name="txt_id_type" id="txt_id_type" class="form-control txt_id_type" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "ID_TYPE");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_id_number">ID Number<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_id_number" name="txt_id_number" id="txt_id_number" placeholder="9 Digit">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_issue_date">ID issue date<i class="text-danger">(*)</i></label>
                    <input type="date" class="form-control txt_issue_date" name="txt_id_issue" id="txt_issue_date">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_exp_date">ID expire date</label>
                    <input type="date" class="form-control txt_exp_date" name="txt_id_expire" id="txt_exp_date" >
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_first_name_en">First Name en<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_first_name_en" name="txt_first_name_en" id="txt_first_name_en" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_last_name_en">Last Name en<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_last_name_en" name="txt_last_name_en" id="txt_last_name_en" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_first_name_kh">First Name kh<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_first_name_kh" name="txt_first_name_kh" id="txt_first_name_kh" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_last_name_kh">last Name kh<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_last_name_kh" name="txt_last_name_kh" id="txt_last_name_kh" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_dob">Date of Birth<i class="text-danger">(*)</i></label>
                    <input type="date" class="form-control txt_dob" name="txt_dob" id="txt_dob" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_gender">Gender<i class="text-danger">(*)</i></label>
                    <select name="txt_gender" id="txt_gender" class="form-control txt_gender" required>
                        <option value="">---Select item---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_phone">Phone Number<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_phone" name="txt_phone" id="txt_phone" required>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_email">Email</label>
                    <input type="text" class="form-control txt_email" name="txt_email" id="txt_email">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_document">ID Document <i class="text-danger">(*)</i></label>
                    <input type="file" class="form-control txt_document" name="txt_id_document" required id="txt_document">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="text-danger"><u> <i class="fa fa-arrow-right"></i> Address Information</u>(*)</label>
                </div>
                
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_country">Coutry<i class="text-danger">(*)</i></label>
                    <select name="txt_country" id="txt_country" class="form-control txt_country" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "COUNTRY");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_province">Province<i class="text-danger">(*)</i></label>
                    <select name="txt_province" id="txt_province" class="form-control txt_province" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "PROVINCE");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["code"]?>-<?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_district">District<i class="text-danger">(*)</i></label>
                    <select name="txt_district" id="txt_district" class="form-control txt_district" required>
                        <option value="">---Select item---</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_commune">Commune<i class="text-danger">(*)</i></label>
                    <select name="txt_commune" id="txt_commune" class="form-control txt_commune" required>
                        <option value="">---Select item---</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_village">Village<i class="text-danger">(*)</i></label>
                    <select name="txt_village" id="txt_village" class="form-control txt_village" required>
                        <option value="">---Select item---</option>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_address_line1">Address Line 1<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_address_line1" name="txt_address_line1" id="txt_address_line1" >
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_address_line2">Address Line 2<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_address_line2" name="txt_address_line2" id="txt_address_line2">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                    <label for="txt_remark">Remark</label>
                    <input type="text" class="form-control txt_remark" name="txt_remark" id="txt_remark">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="" class="text-danger"><u> <i class="fa fa-arrow-right"></i> Income Information</u>(*)</label>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_is_owner">Is Owner<i class="text-danger">(*)</i></label>
                    <select name="txt_is_owner" id="txt_is_owner" class="form-control txt_is_owner" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "IS_OWNER");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_target">Target<i class="text-danger">(*)</i></label>
                    <select name="txt_target" id="txt_target" class="form-control txt_target" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "TARGET");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_company">Company's name<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_company" name="txt_company_name" id="txt_company">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_occupation">Occupation<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_occupation" name="txt_occupation" id="txt_occupation">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_income">Total Income $ <i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_income" name="txt_total_income" id="txt_income">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_coid">Credit Officer<i class="text-danger">(*)</i></label>
                    <select name="txt_coid" id="txt_coid" class="form-control txt_coid" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "CO");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>"><?=$data["code"]?> - <?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-success btn_save" name="btn_save"><i class="fas fa-save"></i> Save</button>
                    <button type="reset" class="btn btn-warning"><i class="fas fa-redo"></i> Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer.php"); ?>
<script src="Customer.js"></script>