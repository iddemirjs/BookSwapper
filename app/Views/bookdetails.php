
<?= view('sections/header') ?>
<div class="book-container">
    <div class="row">
        <div class="book-image sm-4" style="width: fit-content">
            <img src="/uploads/book_images/<?=($book->bk_mainImgUrl)?>" alt="1984"
                 style="box-sizing: border-box;float: right">
        </div>
        <div class="book-details sm-4">
            <h3 class="book-title"><?= $book->bk_title; ?></h3>
            <!--Büyük bir özet gelirse scrollayabilecek şekilde hale getirelim-->
            <div class="text-sm"><?=($book->bk_description)?> </div>
        </div>
        <div class="book-offer sm-4">
        </div>
    </div>

</div>

<?= view('sections/footer'); ?>