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
            // $(".txt_target").attr("disabled", true);
        }
        else{
            $(".txt_target").val("").change();
            // $(".txt_target").attr("disabled", false);
        }
    });
    
    if($(".txt_code").val() != ""){
        var district_code = $(".hidden_district").val();
        var commune_code = $(".hidden_commune").val();
        var village_code = $(".hidden_village").val();
        var province_code = $(".txt_province").val();
        // generate_address(province_code,"DISTRICT",".txt_district");
        $(".txt_province").change();

        setTimeout(function(){
            $(".txt_district").val(district_code);
            $(".txt_district").change();
        },500);
        setTimeout(function(){
            $(".txt_commune").val(commune_code);
            $(".txt_commune").change();
        },1500);
        setTimeout(function(){
            $(".txt_village").val(village_code);
        },2500);
    }
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
            options+="<option value='"+element.code+"'>"+element.code+"-"+element.caption+"</option>";
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