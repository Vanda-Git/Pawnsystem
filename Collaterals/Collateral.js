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
                        $(e).parents("tr").remove();
                        $.notify("Deleted!"+data, "error");
                    });
            } else {
                $.notify("Your record is safe!", "info");
            }
        });

}
// End