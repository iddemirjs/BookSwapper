$(document).ready(function () {
    let tableAuthor = $('#author-datatable').DataTable();
    $(document).on('click','.delete',function (event) {
        if (confirm("Are you sure deleting item?") == true) {
            let url= $(this).data('url');
            let clicked_btn = $(this);
            let clicked_table = $(this).closest('table');
            console.log(url);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            }).done(function(data) {
                if (data.result) {
                    tableAuthor.row(clicked_btn.closest('tr')).remove().draw();
                }
            }).fail(function(error) {
                console.log(error);
            }).always(function() {
                console.log("complete");
            });
        }
    });
});