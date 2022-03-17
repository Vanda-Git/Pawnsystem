$(document).ready(function () {

});
function add() {
    var main_row = $(".main_row").html();
    main_row = "<div class='row'>"+
                main_row+
                "<button class='btn btn-danger btn-xs'><i class='fa fa-minus'></i></button>"+
                "</div>";
    $(".parent_row").append(main_row);
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
                        $.notify("Can't Deleted! Please contact to system admin.", "error");
                    });
            } else {
                $.notify("Your record is safe!", "info");
            }
        });

}