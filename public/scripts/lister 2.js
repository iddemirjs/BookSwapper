$(document).ready(function () {
    let tableAuthor = $('#author-datatable').DataTable();
    $(document).on('click', 'tr .delete', function (event) {
        if (confirm("Are you sure deleting item?") == true) {
            let url = $(this).data('url');
            let clicked_btn = $(this);
            let clicked_table = $(this).closest('table');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            }).done(function (data) {
                if (data.result) {
                    tableAuthor.row(clicked_btn.closest('tr')).remove().draw();
                }
            }).fail(function (error) {
                console.log(error);
            }).always(function () {
                console.log("complete");
            });
        }
    });
    $(document).on('click', 'tr .edit', function () {
        if (confirm("Are you sure update item?") == true) {
            window.location.href = $(this).data('url');
        }
    });
    if ($(".editBookContainer").data("current")) scrollDown();
});
function scrollDown() {
    $(window).load(function () {
        $("html,body").animate({
            scrollTop: $(".editBookContainer").offset().top
        }, "slow");
    });
}