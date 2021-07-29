$(document).ready(function () {
    $(".btn_save").click(function () {
        var v_user_group = $(".txt_user_group").val();
        var v_menu_group = $(".txt_menu_group").val();

        var data = new Array();

        var i = 0;
        
        $(".tbody tr").each(function () {

            data[i] = new Array();

            data[i][0] = $(this).find(".txt_id").val();
            data[i][1] = $(this).find(".views").is(':checked') ? "1" : "0";
            data[i][2] = $(this).find(".adds").is(':checked') ? "1" : "0";
            data[i][3] = $(this).find(".updates").is(':checked') ? "1" : "0";
            data[i][4] = $(this).find(".deletes").is(':checked') ? "1" : "0";
            
            i++;

        });
        
        $.post("Ajax/save.php", {
            user_group : v_user_group,
            menu_group : v_menu_group,
            detail : data
        },
        function (data, status) {
            // alert(data);
            $.notify("Saved!!", "success");
        });
    });
});