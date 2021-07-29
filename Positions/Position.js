$(document).ready(function () {

});

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