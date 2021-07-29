$(document).ready(function () {
    $(".btn_move").click(function(){
        var selected_user = $(".txt_all_user option:selected");
        $(".txt_active_user").append(selected_user);
    });
    $(".btn_move_back").click(function(){
        var selected_user = $(".txt_active_user option:selected");
        $(".txt_all_user").append(selected_user);
    });
    
    $(".btn_move_all").click(function(){
        var selected_user = $(".txt_all_user option");
        $(".txt_active_user").append(selected_user);
    });
    $(".btn_move_back_all").click(function(){
        var selected_user = $(".txt_active_user option");
        $(".txt_all_user").append(selected_user);
    });
    
    $(".btn_save").click(function () {
        var v_user_group = $(".txt_user_group").val();

        var data = new Array();

        var i = 0;
        
        $(".txt_active_user option").each(function () {
            data[i] = $(this).val();
            i++;
        });
        
        $.post("Ajax/save.php", {
            user_group : v_user_group,
            detail : data
        },
        function (data, status) {
            // alert(data);
            $.notify("Saved!!", "success");
        });
    });
});