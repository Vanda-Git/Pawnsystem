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
    var amount = $('.txt_amount').val();
    var interest = $('.txt_interest').val();
    var tenor = $('.txt_tenor').val();
    var vdate = new Date($('.txt_date').val());

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
                        "<td>"+formatDate(newDate)+"</td>"+
                        "<td>"+ptm.toFixed(2)+"</td>"+
                        "<td>"+prin_L.toFixed(2)+"</td>"+
                        "<td>"+interest_L.toFixed(2)+"</td>"+
                        "<td>"+balance_L.toFixed(2)+"</td>"+
                    "</tr>";
        payment_S += ptm;
        prin_S += prin_L;
        interest_S += interest_L;
        balance_S += balance_L;
    }
    var tableFoot = "<tr>"+
                        "<th colspan='2' class='text-center'>Total</th>"+
                        "<th>"+payment_S.toFixed(2)+"</th>"+
                        "<th>"+prin_S.toFixed(2)+"</th>"+
                        "<th>"+interest_S.toFixed(2)+"</th>"+
                        "<th>"+balance_S.toFixed(2)+"</th>"+
                    "</tr>";

    $(".tbl_body").html(tableBody);
    $(".tbl_foot").html(tableFoot);
});

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
        
        var first_repayment_date = obj.first_repayment_date;
        var request_amount = obj.request_amount;
        var interest = obj.interest;
        var tenor = obj.tenor;

        $('.txt_date').val(first_repayment_date);
        $('.txt_amount').val(request_amount);
        $('.txt_interest').val(interest);
        $('.txt_tenor').val(tenor);


        $.notify("Generated!","success");
    });
}