<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .book ul{
        padding-inline-start: 0px;
    }
</style>
<body>



<div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button" onclick="openTab('books')">Books</button>
    <button class="w3-bar-item w3-button" onclick="openTab('Received Waiting')">Received Waiting Offers</button>
    <button class="w3-bar-item w3-button" onclick="openTab('Send Waiting')">Send Waiting Offers</button>
    <button class="w3-bar-item w3-button" onclick="openTab('Completed Offers')">Completed Offers History</button>
</div>

<div id="books" class="w3-container tab">
    <h2>Books</h2>
    <?php if ($have_books): ?>
        <?php $bcount = count($books)?>
        <div style="display: flex">
            <?php for($b_index= 0;$b_index<$bcount;$b_index++): $book = $books[$b_index]?>
                <div class='book' style="margin-right:55px">
                    <img src='<?= ($book->bk_mainImgUrl) ?>' style="box-sizing: border-box;width:227px;height:338px">
                    <ul class="book-title"><?= $book->bk_title; ?></ul>
                    <ul class="book-author">Author:
                        <?=$books_authors[$b_index]->auth_name;?> <?=$books_authors[$b_index]->auth_surname;?></ul>
                    <ul class="book-edition-number">Edition Number:<?= $book->bk_editionNumber; ?></ul>
                    <ul class="book-category">Categories:
                <?php foreach ($books_categories[$b_index] as $key1 => $books_category): ?>
                    <?= $books_category->cat_name; ?>
                    <?php if($key1 != count($books_categories[$b_index]) - 1):?>,
                        <?php endif;?>
                <?php endforeach ?>
            </ul>
                </div>
            <?php endfor ?>
        </div>
    <?php else: ?>
        <h3>No Books Found</h3>
    <?php endif; ?>
</div>

<div id="Received Waiting" class="w3-container tab" style="display:none">
    <h2>Received Waiting Offers</h2>
</div>

<div id="Send Waiting" class="w3-container tab" style="display:none">
    <h2>Send Waiting Offers</h2>
</div>

<div id="Completed Offers" class="w3-container tab" style="display:none">
    <h2>Completed Offers History</h2>
</div>

<script>
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tab");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
</script>

</body>
</html>
