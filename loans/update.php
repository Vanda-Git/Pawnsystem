<?php include("../Layout/Header.php"); ?>

<?php
    $id = @$_GET["update_id"];
    if(isset($_POST["btn_save"])){
        $cycle = $_POST["txt_cycle"];
        $request_amount = $_POST["txt_rq_amount"];
        $currency = $_POST["txt_ccy"];
        $interest = $_POST["txt_int"];
        $tenor = $_POST["txt_tenor"];
        $repayment_type = $_POST["txt_repay_type"];
        $repayment_term = $_POST["txt_repay_term"];
        $dis_date = $_POST["txt_dis_date"];
        $first_repayment_date = $_POST["txt_frep_date"];
        $product_type = $_POST["txt_prod_type"];
        $purpose = $_POST["txt_purpose"];
        $admin_fee = $_POST["txt_admin_fee"];
        $other_fee = $_POST["txt_other_fee"];
        $status = 'P';
        $note = $_POST["txt_remark"];
        $co_id = $_POST["txt_coid"];
        $ctmType = $_POST["txt_ctm_type"];
        $customerId = Get_CTM_Id($conn,$ctmType,$_POST["txt_cus_id"]);

        $create_by = $_SESSION["user_id"];
        $CustomerCode =Generate_customer_code();

        $sql = "update d_credit set
                                customerId = '".$customerId."'
                                , cycle = '".$cycle."'
                                , request_amount = '".$request_amount."'
                                , currency = '".$currency."'
                                , interest = '".$interest."'
                                , tenor = '".$tenor."'
                                , repayment_type = '".$repayment_type."'
                                , repayment_term = '".$repayment_term."'
                                , dis_date = '".$dis_date."'
                                , first_repayment_date = '".$first_repayment_date."'
                                , product_type = '".$product_type."'
                                , purpose = '".$purpose."'
                                , admin_fee = '".$admin_fee."'
                                , other_fee = '".$other_fee."'
                                , status = '".$status."'
                                , note = '".$note."'
                                , co_id = '".$co_id."'
                                , updated_by = '".$create_by."'
                                , ctmType = '".$ctmType."'
                where id = '".$id."'";
        //echo $sql;
        $data = update($conn, $sql);
    }

    if(isset($_GET["update_id"])){
        $data_single_credit = fetch_single($conn,"select * from d_credit where id = '$id'");
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
                    <label for="txt_id_type">Loan Type<i class="text-danger">(*)</i></label>
                    <select name="txt_ctm_type" id="txt_ctm_type" class="form-control txt_ctm_type" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "CTM_TYPE");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["ctmType"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_cus_id">Customer/Group Code<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_cus_id" name="txt_cus_id" id="txt_cus_id" placeholder="18 Digit" value="<?=Get_CTM_Code($conn,$data_single_credit["ctmType"],$data_single_credit["customerId"])?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_cycle">Loan Cycle<i class="text-danger">(*)</i></label>
                    <input type="number" class="form-control txt_cycle" name="txt_cycle" id="txt_cycle" value="<?=$data_single_credit["cycle"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_rq_amount">Request Amount</label>
                    <input type="number" class="form-control txt_rq_amount" name="txt_rq_amount" id="txt_rq_amount" value="<?=$data_single_credit["request_amount"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_ccy">Currency<i class="text-danger">(*)</i></label>
                    <select name="txt_ccy" id="txt_ccy" class="form-control txt_ccy" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "CCY");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["currency"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_tenor">Tenor<i class="text-danger">(*)</i></label>
                    <input type="number" class="form-control txt_tenor" name="txt_tenor" id="txt_tenor" required value="<?=$data_single_credit["tenor"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_repay_type">Repayment Type<i class="text-danger">(*)</i></label>
                    <select name="txt_repay_type" id="txt_repay_type" class="form-control txt_repay_type" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "REPAYMENT_TYPE");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["repayment_type"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_repay_term">Repayment Term<i class="text-danger">(*)</i></label>
                    <select name="txt_repay_term" id="txt_repay_term" class="form-control txt_repay_term" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "REPAYMENT_TERM");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["repayment_term"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_dis_date">Disbursment Date<i class="text-danger">(*)</i></label>
                    <input type="date" class="form-control txt_dis_date" name="txt_dis_date" id="txt_dis_date" required value="<?=$data_single_credit["dis_date"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_frep_date">First Repayment Date<i class="text-danger">(*)</i></label>
                    <input type="date" class="form-control txt_frep_date" name="txt_frep_date" id="txt_frep_date" required value="<?=$data_single_credit["first_repayment_date"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_prod_type">Product Type<i class="text-danger">(*)</i></label>
                    <select name="txt_prod_type" id="txt_prod_type" class="form-control txt_prod_type" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "PRODUCT_TYPE");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["product_type"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_purpose">Loan Purpose<i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_purpose" name="txt_purpose" id="txt_purpose" required value="<?=$data_single_credit["purpose"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_int">Interest Rate % <i class="text-danger">(*)</i></label>
                    <input type="number" class="form-control txt_int" name="txt_int" required id="txt_int" value="<?=$data_single_credit["interest"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_admin_fee">Admin Fee % <i class="text-danger">(*)</i></label>
                    <input type="number" class="form-control txt_admin_fee" name="txt_admin_fee" required id="txt_admin_fee" value="<?=$data_single_credit["admin_fee"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_other_fee">Other Fee % <i class="text-danger">(*)</i></label>
                    <input type="number" class="form-control txt_other_fee" name="txt_other_fee" required id="txt_other_fee" value="<?=$data_single_credit["other_fee"]?>">
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_coid">Credit Officer % <i class="text-danger">(*)</i></label>
                    <select name="txt_coid" id="txt_coid" class="form-control txt_coid" required>
                            <option value="">---Select item---</option>
                        <?php
                            $datas = get_master($conn, "CO");
                            foreach($datas as $key=>$data){
                        ?>
                            <option value="<?=$data["code"]?>" <?=$data_single_credit["co_id"]==$data["code"]?"selected":""?>><?=$data["caption"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                    <label for="txt_other_fee">Remark <i class="text-danger">(*)</i></label>
                    <input type="text" class="form-control txt_remark" name="txt_remark" required id="txt_remark" value="<?=$data_single_credit["note"]?>">
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
<script src="Loan.js"></script>