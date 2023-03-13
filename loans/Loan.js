// For add.php by Vanda 24072021
$(document).ready(function () {
    
});

// For index.php by Vanda 24072021
function remove(id, e) {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.post("Ajax/delete.php", {
                        id: id
                    },
                    function (data, status) {
                        //$(e).parents("tr").remove();
                        $.notify("Cannot delete credit account! Please contact to system administor.");
                    });
            } else {
                $.notify("Your record is safe!", "info");
            }
        });

}
// End

function calPMT(apr, term,loan)
{
  apr = apr / 1200;
  amount = apr * -loan * Math.pow((1 + apr), term) / (1 - Math.pow((1 + apr), term));
  return amount;
}

$('.btn_generate').click(function(){
    if( $('.txt_repay_type').val() == "EMI"){
        GenScheduleEMI();
    }
    else if($('.txt_repay_type').val() == "EMP"){
        GenScheduleEMP();
    }
});

function GenScheduleEMI(){
    var amount = $('.txt_amount').val();
    var interest = $('.txt_interest').val();
    var tenor = $('.txt_tenor').val();
    var vdate = new Date($('.txt_date').val());

    var currency = $('.txt_currency').val();

    var cur_symbol = "";
    if(currency == "USD"){
        cur_symbol = "";
    }
    else if(currency == "KHR"){
        cur_symbol = "";
    }
    
    var newDate = new Date();

    var ptm = calPMT(interest,tenor,amount);

    var tableBody = "";

    var interest_L = 0;
    var prin_L = 0;
    var balance_L = 0;

    var interest_S = 0;
    var prin_S = 0;
    var balance_S = 0;
    var payment_S = 0;

    for(var i = 1; i <= tenor ; i++){

        if(i == 1){
            interest_L = amount*(interest/100)*30/360;
            prin_L = ptm - interest_L;
            balance_L = amount - prin_L;
            newDate = new Date(vdate.setMonth(vdate.getMonth()+1));
        }
        else{
            interest_L = balance_L*(interest/100)*30/360;
            prin_L = ptm - interest_L;
            balance_L = balance_L - prin_L;
            newDate = new Date(newDate.setMonth(newDate.getMonth()+1));
        }

        tableBody += "<tr>"+
                        "<td class='text-center'>"+i+"</td>"+
                        "<td>"+formatDate(newDate)+cur_symbol+"</td>"+
                        "<td>"+ptm.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+prin_L.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+interest_L.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+balance_L.toFixed(2)+cur_symbol+"</td>"+
                    "</tr>";
        payment_S += ptm;
        prin_S += prin_L;
        interest_S += interest_L;
        balance_S += balance_L;
    }
    var tableFoot = "<tr>"+
                        "<th colspan='2' class='text-center'>Total</th>"+
                        "<th>"+payment_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+prin_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+interest_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+balance_S.toFixed(2)+cur_symbol+"</th>"+
                    "</tr>";

    $(".tbl_body").html(tableBody);
    $(".tbl_foot").html(tableFoot);
}

function GenScheduleEMP(){
    var amount = $('.txt_amount').val();
    var interest = $('.txt_interest').val();
    var tenor = $('.txt_tenor').val();
    var vdate = new Date($('.txt_date').val());
    var vdis_date = new Date($('.txt_dis_date').val());
    var currency = $('.txt_currency').val();

    var cur_symbol = "";
    if(currency == "USD"){
        cur_symbol = "";
    }
    else if(currency == "KHR"){
        cur_symbol = "";
    }

    var tableBody = "";

    var newDate = new Date();
    var tmpDate = new Date();
    
    var day_period=0;
    var interest_L=0;
    var prin_L = amount/tenor;
    var balance_L = 0;
    var payment_L = 0;

    var interest_S = 0;
    var prin_S = 0;
    var balance_S = 0;
    var payment_S = 0;

    for(var i = 1; i <= tenor ; i++){
        if(i == 1){
            day_period = datediff(((vdis_date)), ((vdate)));
            newDate = new Date(vdate);
            tmpDate = vdis_date;
            interest_L = amount*(interest/100)*day_period/360;
            balance_L = amount - prin_L;
            payment_L = interest_L + prin_L;
        }
        else{
            tmpDate = newDate;
            newDate = new Date(vdate.setMonth(vdate.getMonth()+1));
            day_period = datediff(tmpDate, newDate);
            interest_L = balance_L*(interest/100)*day_period/360;
            balance_L = balance_L - prin_L;
            payment_L = interest_L + prin_L;
        }
        

        tableBody += "<tr>"+
                        "<td class='text-center'>"+i+"</td>"+
                        "<td>"+formatDate(newDate)+"</td>"+
                        "<td>"+payment_L.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+prin_L.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+interest_L.toFixed(2)+cur_symbol+"</td>"+
                        "<td>"+Math.abs(balance_L).toFixed(2)+cur_symbol+"</td>"+
                    "</tr>";
        payment_S += payment_L;
        prin_S += prin_L;
        interest_S += interest_L;
        balance_S += balance_L;
    }

    var tableFoot = "<tr>"+
                        "<th colspan='2' class='text-center'>Total</th>"+
                        "<th>"+payment_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+prin_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+interest_S.toFixed(2)+cur_symbol+"</th>"+
                        "<th>"+balance_S.toFixed(2)+cur_symbol+"</th>"+
                    "</tr>";

    $(".tbl_body").html(tableBody);
    $(".tbl_foot").html(tableFoot);
}

function datediff(first, second) {
    var Difference_In_Time = second.getTime() - first.getTime();
    return Difference_In_Time / (1000 * 3600 * 24);
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

function getCreditInfo(e){
    var crdcd = $(e).val();

    $.post("Ajax/getCreditInfo.php", {
        id: crdcd
    },
    function (data, status) {
        var obj = JSON.parse(data);
        
        var CrdID = obj.id;
        var first_repayment_date = obj.first_repayment_date;
        var request_amount = obj.request_amount;
        var interest = obj.interest;
        var tenor = obj.tenor;
        var repayment_type = obj.repayment_type;
        var dis_date = obj.dis_date;
        var currency = obj.currency;

        $('.txt_crd_id').val(CrdID);
        $('.txt_date').val(first_repayment_date);
        $('.txt_amount').val(request_amount);
        $('.txt_interest').val(interest);
        $('.txt_tenor').val(tenor);
        $('.txt_repay_type').val(repayment_type);
        $('.txt_dis_date').val(dis_date);
        $('.txt_currency').val(currency);


        $.notify("Generated!","success");
    });
}

$(".btn_save_scedule").click(function () {
    swal({
            title: "Be alert!",
            text: "Please make sure you have done review Due date and Amount.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var tbody = $(".tbl_body");
                var CrdID = $('.txt_crd_id').val();
                var CrdCD = $('.txt_cus_id').val();

                var dataSchedule = new Array();
                tbody.find("tr").each(function (index, element) {
                    // element == this
                    dataSchedule[index] = {
                        CrdID: CrdID,
                        Num: $(element).find("td:nth-child(1)").text(),
                        Date: $(element).find("td:nth-child(2)").text(),
                        payment: $(element).find("td:nth-child(3)").text(),
                        prin: $(element).find("td:nth-child(4)").text(),
                        int: $(element).find("td:nth-child(5)").text(),
                        bal: $(element).find("td:nth-child(6)").text()
                    };
                });

                $.post("Ajax/saveCreditSchedule.php", {
                        data: dataSchedule
                    },
                    function (data, status) {
                        if (data == 1) {
                            $.notify("Sechedule Saved.", "success");
                        } else {
                            $.notify("Schedule already present, Please contact system admin!","error");
                        }
                    });
            } else {
                $.notify("Your data is safe!", "info");
            }
        });
});