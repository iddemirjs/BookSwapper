<script src="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/paper-dropdown-menu.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-item/paper-item.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-listbox/paper-listbox.html">

<?= view('sections/header') ?>
<div class="container" style="display: flex">
    <div class="container" style="display: flex">
            <div class="form-inline">
                <label for="paperSelects1" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;"> Author: </label>
                <select id="book_author">
                    <?php foreach ($authors as $key => $author): ?>
                        <option value="<?= $author->auth_id; ?>"><?= $author->auth_name . ' ' . $author->auth_surname;; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-inline" style="float: right">
                <label for="paperSelects1" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;"> Category: </label>
                <select id="book_categories">
                    <?php foreach ($categories as $key => $category): ?>
                        <option value="<?= $category->cat_id; ?>"><?= $category->cat_name; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
    </div>
</div>
<div class="container sm-12" id="booklistcontainer">
    <div class="row">
        <?php $bcount = count($books) ?>
        <?php for ($b_index = 0; $b_index < $bcount; $b_index++): $book = $books[$b_index] ?>
            <div class="card col-4 md-4" style="padding: 0px 0px;">
                <img src="<?= ($book->bk_mainImgUrl === null)?'https://picsum.photos/768':'/uploads/book_images/'.$book->bk_mainImgUrl; ?>" alt="Card example image">

                <div class="card-body">
                    <h4 class="card-title"><?= $book->bk_title; ?> EN: <?= $book->bk_editionNumber; ?></h4>
                    <h5 class="card-subtitle"><?= $books_authors[$b_index]->auth_name; ?> <?= $books_authors[$b_index]->auth_surname; ?></h5>
                    <p class="card-text">
                    <ul class="book-category" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;">
                        Categories:
                        <?php foreach ($books_categories[$b_index] as $key1 => $books_category): ?>
                            <li><?= $books_category->cat_name; ?></li>
                        <?php endforeach ?>
                    </ul>
                    </p>
                    <button class="btn-warning makeOffer" data-bookId="<?= $book->bk_id; ?>" style="position: absolute;bottom: 20px;right: 20px;">Make Offer</button>
                </div>
            </div>
        <?php endfor ?>
    </div>
</div>
</div>

<div style="display:flex;margin-left: 180px">
    <label style="font-size: 30px; margin: 15px;font-family: Patrick Hand SC,sans-serif;font-weight: 400;"><b>Page: </b></label>
    <?= $pager->links() ?>

    <style>
        .pagination li:before {
            content: '';
        }

        .pagination li {
            text-indent: 20px;
            font-size: 45px;
            display: inline-block;
            text-align: center;
        }
    </style>
</div>

<?= view('sections/footer',['scripts' => [
    'lister.js',
    "../libs/misc/datatables/datatables.min.css",
    "../libs/misc/datatables/datatables.min.js"
]]); ?>