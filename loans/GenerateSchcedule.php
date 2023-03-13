<?php include("../Layout/Header.php"); ?>


<div class="card">
    <div class="card-header">
        <!-- <h3 class="card-title">Import Record</h3> -->
        <h3>
            Generate Repayment Schedule
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_cus_id">Credit Account<i class="text-danger">(*)</i></label>
                <input type="hidden" class="txt_crd_id" id="txt_cus_id">
                <input type="text" class="form-control txt_cus_id" name="txt_cus_id" id="txt_cus_id"
                    placeholder="18 Digit" onchange="getCreditInfo(this)">
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_date">First Repayment Date<i class="text-danger">(*)</i></label>
                <input type="date" class="form-control txt_date" name="txt_date" id="txt_date" readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_dis_date">Disbursement Date<i class="text-danger">(*)</i></label>
                <input type="date" class="form-control txt_dis_date" name="txt_dis_date" id="txt_dis_date" readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_amount">Loan Amount<i class="text-danger">(*)</i></label>
                <input type="number" class="form-control txt_amount" name="txt_amount" id="txt_amount" readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_currency">Currency<i class="text-danger">(*)</i></label>
                <input type="text" class="form-control txt_currency" name="txt_currency" id="txt_currency" readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_repay_type">Repayment Type<i class="text-danger">(*)</i></label>
                <input type="text" class="form-control txt_repay_type" name="txt_repay_type" id="txt_repay_type"
                     readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_interest">Interest Rate<i class="text-danger">(*)</i></label>
                <input type="number" class="form-control txt_interest" name="txt_interest" id="txt_interest"
                     readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_tenor">Tenor<i class="text-danger">(*)</i></label>
                <input type="number" class="form-control txt_tenor" name="txt_tenor" id="txt_tenor"
                     readonly>
            </div>
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_cus_id"> &emsp;<i class="text-danger"> </i></label>
                <br>
                <button type="button" class="btn btn-info btn_generate" name="btn_generate"><i class="fas fa-arrow-down"></i>
                    Show Data</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <br>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-info text-center">
                    <tr>
                        <th>Nº</th>
                        <th>Date</th>
                        <th>Total Payment</th>
                        <th>Principle</th>
                        <th>Interest</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody class="tbl_body">
                </tbody>
                <tfoot class="tbl_foot bg-info">
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <label for="txt_cus_id"> &emsp;<i class="text-danger"> </i></label>
                <br>
                <button type="button" class="btn btn-success btn_save btn_save_scedule btn_add" name="btn_save"><i class="fas fa-save"></i>
                    Save Schedule</button>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

<?php include("../Layout/Footer.php"); ?>
<script src="Loan.js?v=1.2"></script>