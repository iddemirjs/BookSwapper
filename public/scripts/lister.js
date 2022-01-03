var myInterval;
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
    $(".makeOffer").click(function (event) {
        let bookId = $(this).data("bookid");
        if (bookId !== undefined) {
            window.location = "/offer/make/" + bookId;
        }
    });

    $(".addBookToList").click(function (event) {
        let dropDown = $(this).closest('div').find('select');
        let bookList = $(this).closest('.card-body').find('ul');
        let bookId = dropDown.val();
        let selectedLiDOM = $(this).closest('div').find(`select>option[value='${dropDown.val()}']`);
        $.ajax({
            url: '/book/'+bookId,
            type: 'GET',
            dataType: 'json',
        }).done(function (data) {
            if (data.status){
                selectedLiDOM.remove();
                const listItem = convertListItem(data.book);
                bookList.append(listItem);
            }
        }).fail(function (error) {
            console.log(error);
        }).always(function () {
            console.log("complete");
        });
    });
    if ($(".secondsForRedirect").length) {
        let count = 5;
        var countdown = setInterval(function(){
            $(".secondsForRedirect").html(count);
            if (count == 0) {
                clearInterval(countdown);
                window.open('/user', "_self");
            }
            count--;
        }, 1000);
    }
    $(document).on('click','.deleterBook',function (event) {
        let bookId = $(this).closest('li').data('id');
        let willInsertedSelect = $(this).closest('.card-body').find('select');
        $(this).closest('li').remove();
        $.ajax({
            url: '/book/'+bookId,
            type: 'GET',
            dataType: 'json',
        }).done(function (data) {
            console.log(data);
            if (data.status){
                willInsertedSelect.append(`<option value="${data.book.bk_id}">${data.book.bk_title} - EN : ${data.book.bk_editionNumber}</option>`);
            }
        }).fail(function (error) {
            console.log(error);
        }).always(function () {
            console.log("complete");
        });
    });
});

function scrollDown() {
    $(window).load(function () {
        $("html,body").animate({
            scrollTop: $(".editBookContainer").offset().top
        }, "slow");
    });
}

function convertListItem(book) {
    return `<li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;" data-id="${book.bk_id}">
                        <input name="books[${book.bk_ownerId}][]" value="${book.bk_id}" type="hidden">
                        <div style="width: calc( 100% - 50px)">
                            <h6>${book.bk_title}</h6>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : ${book.bk_editionNumber}</span>
                            <span class="border border-2 border-primary deleterBook" style="padding: 2px 5px;">Sil</span>
                        </div>
                        <img src="/uploads/book_images/${book.bk_mainImgUrl}" alt="Random Unsplash" style="height: 50px;">
                    </li>`;
}