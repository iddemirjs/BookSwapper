<?= view('sections/header') ?>
<div class="author-container">
    <h2 style="margin-left: 100px">Author</h2>
    <div class="row">
        <div class="author-details container" style="margin-left: 100px;flex: border-box">
            <h3 class="author-name-surname"><?= $author->auth_name; ?> <?= $author->auth_surname; ?></h3>
            <div class="text-sm"><?= ($author->auth_description) ?> </div>
        </div>
        <div class="author_book_list" >
            <?php $bcount = count($author_books)?>
            <?php for($b_index= 0;$b_index<$bcount;$b_index++): $book = $author_books[$b_index]?>
                <a class="paper-btn margin" style="width: 290px" href="/bookcontroller/view_details/<?= $book->bk_id; ?>">
                    <img src='<?= ($book->bk_mainImgUrl) ?>' style="box-sizing: border-box;width:255px;height:320px">
                    <ul class="book-title"><?= $book->bk_title; ?></ul>
                    <ul class="book-author">Author:
                        <?=$author->auth_name;?> <?=$author->auth_surname;?></ul>
                    <ul class="book-edition-number">Edition Number:<?= $book->bk_editionNumber; ?></ul>
                    <ul class="book-category">Categories:
                        <?php foreach ($books_categories[$b_index] as $key1 => $books_category): ?>
                            <?= $books_category->cat_name; ?>
                            <?php if($key1 != count($books_categories[$b_index]) - 1):?>,
                            <?php endif;?>
                        <?php endforeach ?>
                    </ul>
                </a>
            <?php endfor ?>
        </div>
    </div>
</div>

<?= view('sections/footer'); ?>
