// For add.php by Vanda 24072021
$(document).ready(function () {
    $(".txt_province").change(function(){
        var province_code = $(this).val();
        var district = generate_address(province_code,"DISTRICT",".txt_district");
    });
    $(".txt_district").change(function(){
        var district_code = $(this).val();
        var commune = generate_address(district_code,"COMMUNE",".txt_commune");
    });
    $(".txt_commune").change(function(){
        var commune_code = $(this).val();
        var village = generate_address(commune_code,"VILLAGE",".txt_village");
    });

    $(".txt_is_owner").change(function(){
        var is_owner = $(this).val();
        if(is_owner == "SE"){
            $(".txt_target").val("OT").change();
            $(".txt_target").attr("disabled", true);
        }
        else{
            $(".txt_target").val("").change();
            $(".txt_target").attr("disabled", false);
        }
    });

    //Save data
    // $(".btn_save").click(function(){
    //     var first_name_en = $(".txt_first_name_en").val();
    //     var last_name_en = $(".txt_last_name_en").val();
    //     var first_name_kh = $(".txt_first_name_kh").val();
    //     var last_name_kh = $(".txt_last_name_kh").val();
    //     var gender = $(".txt_gender").val();
    //     var dob = $(".txt_dob").val();
    //     var phone = $(".txt_phone").val();
    //     var email = $(".txt_email").val();
    //     var id1_type = $(".txt_id_type").val();
    //     var id1_number = $(".txt_id_number").val();
    //     var id1_document = $(".txt_document").val();
    //     var id1_issue = $(".txt_issue_date").val();
    //     var id1_expire = $(".txt_exp_date").val();
    //     var country = $(".txt_country").val();
    //     var province = $(".txt_province").val();
    //     var district = $(".txt_district").val();
    //     var commune = $(".txt_commune").val();
    //     var village = $(".txt_village").val();
    //     var address_line1 = $(".txt_address_line1").val();
    //     var address_line2 = $(".txt_address_line2").val();
    //     var is_owner = $(".txt_is_owner").val();
    //     var target = $(".txt_target").val();
    //     var occupation = $(".txt_occupation").val();
    //     var company_name = $(".txt_company").val();
    //     var total_income = $(".txt_income").val();

    //     $.post("Ajax/add.php", {
    //         first_name_en: first_name_en,
    //         last_name_en: last_name_en,
    //         first_name_kh: first_name_kh,
    //         last_name_kh: last_name_kh,
    //         gender: gender,
    //         dob: dob,
    //         phone: phone,
    //         email: email,
    //         id1_type: id1_type,
    //         id1_number: id1_number,
    //         id1_document: id1_document,
    //         id1_issue: id1_issue,
    //         id1_expire: id1_expire,
    //         country: country,
    //         province: province,
    //         district: district,
    //         commune: commune,
    //         village: village,
    //         address_line1: address_line1,
    //         address_line2: address_line2,
    //         target: target,
    //         is_owner: is_owner,
    //         occupation: occupation,
    //         company_name: company_name,
    //         total_income: total_income
    //     },
    //     function (data, status) {
    //         alert(data);
    //     });
    // });
});

function generate_address(parent_code,cdname,field_name){
    $.post("Ajax/get_address.php", {
        name: cdname,
        parent_code: parent_code
    },
    function (data, status) {
        var districs = JSON.parse(data);
        var options="<option value=''>---Select Item---</option>";
        districs.forEach(element => {
            options+="<option value='"+element.code+"'>"+element.caption+"</option>";
        });
        $(field_name).html(options);
    });
}
// End

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
                        $(e).parents("tr").remove();
                        $.notify("Deleted!"+data, "error");
                    });
            } else {
                $.notify("Your record is safe!", "info");
            }
        });

}
// End