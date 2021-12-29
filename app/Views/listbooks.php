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
        <ul class="sort-options" style="display:flex">
            <div class="form-group">
                <h4 class="nav-title" style="margin-top: 80px">Sort Options</h4>
                <paper-dropdown-menu id="sort-author" label="Author" style="height: min-content">
                    <paper-listbox slot="dropdown-content" selected="0">
                        <?php foreach ($authors as $key => $author): ?>
                            <a href="/bookcontroller/sort_by_author/<?= $author->auth_id; ?>">
                                <paper-item><?= $author->auth_name; ?> <?= $author->auth_surname; ?></paper-item>
                            </a>
                        <?php endforeach ?>
                    </paper-listbox>
                </paper-dropdown-menu>
                <paper-dropdown-menu id="sort-category" label="Category" style="height: min-content">
                    <paper-listbox slot="dropdown-content" selected="0">
                        <?php foreach ($categories as $key => $category): ?>
                            <a href="/bookcontroller/sort_by_category/<?= $category->cat_id; ?>">
                                <paper-item><?= $category->cat_name; ?></paper-item>
                            </a>
                        <?php endforeach ?>
                    </paper-listbox>
                </paper-dropdown-menu>
            </div>
        </ul>
    </div>
    <div class="container sm-12" id="booklistcontainer">
        <div class="booklist">
            <?php $bcount = count($books) ?>
            <?php for ($b_index = 0; $b_index < $bcount; $b_index++): $book = $books[$b_index] ?>
                <a class="paper-btn margin"  href="/bookcontroller/view_details/<?= $book->bk_id; ?>"
                   style="width: 290px;height: 515px">
                    <img src='<?= ($book->bk_mainImgUrl) ?>' style="box-sizing: border-box;width:255px;height:320px">
                    <ul class="book-title"><?= $book->bk_title; ?></ul>
                    <ul class="book-author">Author:
                        <?= $books_authors[$b_index]->auth_name; ?> <?= $books_authors[$b_index]->auth_surname; ?></ul>
                    <ul class="book-edition-number">Edition Number:<?= $book->bk_editionNumber; ?></ul>
                    <ul class="book-category">Categories:
                        <?php foreach ($books_categories[$b_index] as $key1 => $books_category): ?>
                            <?php if ($key1 != count($books_categories[$b_index]) - 1): ?>,
                            <?php endif; ?>
                        <?php endforeach ?>
                    </ul>
                </a>
            <?php endfor ?>
        </div>
    </div>
</div>

<div style="display:flex;margin-left: 180px">
    <label style="font-size: 30px; margin: 15px"><b>Page: </b></label>
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


<?= view('sections/footer'); ?>