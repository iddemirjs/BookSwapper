<script src="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/paper-dropdown-menu.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-item/paper-item.html">
<link rel="import"
      href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/../paper-listbox/paper-listbox.html">

<?= view('sections/header') ?>
<div class="container">
    <h3 class="nav-title">Sort Options</h3>
    <ul class="sort-options" style="display: inline">
        <paper-dropdown-menu id="sort-author" label="Author" style="height: min-content">
            <paper-listbox slot="dropdown-content" selected="0">
                <?php foreach ($authors as $key => $author):?>
                <paper-item><?=$author->auth_name; ?> <?=$author->auth_surname; ?></paper-item>
                <?php endforeach ?>
            </paper-listbox>
        </paper-dropdown-menu>
        <paper-dropdown-menu id="sort-category" label="Category" style="height: min-content">
            <paper-listbox slot="dropdown-content" selected="0">
                <?php foreach ($categories as $key => $category):?>
                <a href="/bookcontroller/sort_by_category/<?=$category->cat_id;?>"
                <paper-item><?=$category->cat_name; ?></paper-item>
                <?php endforeach ?>
            </paper-listbox>
        </paper-dropdown-menu>
    </ul>
</div>
<div class="container" id="booklistcontainer">
    <div class="booklist">
        <?php $i = 0 ?>
        <?php foreach ($books as $key => $book): ?>
        <a href="/bookcontroller/view_details/<?= $book->bk_id; ?>">
            <btn class="paper-btn margin"
                 style="width: max-content;height: max-content">
                <img src='<?= ($book->bk_mainImgUrl) ?>' style="box-sizing: border-box">
                <p class="book-title"><?= $book->bk_title; ?></p>
                <span class="book-author">Orwell, George</span>
                <span class="book-edition-number"><?= $book->bk_editionNumber; ?></span>
                <span class="book-category">

                <?php foreach ($books_categories[$i] as $key => $books_category): ?>
                    <?= $books_category->cat_name; ?>
                <?php endforeach ?>

                </span>
                <?php $i = $i + 1?>
            </btn>
        </a>
        <?php endforeach ?>
    </div>
</div>

<?= $pager->links() ?>

<style>
    ul li:before{
        content: '';
    }
    ul li{
        text-indent: 20px;
        font-size: 45px;
        display: inline-block;
    }
</style>

<?= view('sections/footer'); ?>