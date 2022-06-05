$(document).ready(function () {

});
function add() {
    var main_row = $(".main_row").html();
    main_row = `<div class='row'><div class=\"col-12\"><br></div>${main_row}</div>`;
    $(".parent_row").append(main_row);
}
function remove_this_row(e){
    $(e).parents(".row").not(".main_row").remove();
}
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
                        if(data == 1){
                            $.notify("Record Deleted!", "success");
                            $(e).parents("tr").remove();
                        }
                        else{
                            $.notify("Can't Deleted! Please contact to system admin.", "error");
                        }
                    });
            } else {
                $.notify("Your record is safe!", "info");
            }
        });
}