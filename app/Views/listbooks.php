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
                <paper-item>Author1</paper-item>
                <paper-item>Author2</paper-item>
                <paper-item>Author3</paper-item>
                <paper-item>Author4</paper-item>
            </paper-listbox>
        </paper-dropdown-menu>
        <paper-dropdown-menu id="sort-genre" label="Genre" style="height: min-content">
            <paper-listbox slot="dropdown-content" selected="0">
                <paper-item>Genre1</paper-item>
                <paper-item>Genre2</paper-item>
                <paper-item>Genre3</paper-item>
                <paper-item>Genre4</paper-item>
            </paper-listbox>
        </paper-dropdown-menu>
    </ul>
</div>
<div class="container" id="booklistcontainer">
    <div class="booklist">
        <?php foreach ($books as $key => $book): ?>
        <a href="/bookcontroller/view_details/<?= $book->bk_id; ?>">
            <btn class="paper-btn margin"
                 style="width: max-content;height: max-content">
                <img src='<?= ($book->bk_mainImgUrl) ?>' style="box-sizing: border-box">
                <p class="book-title"><?= $book->bk_title; ?></p>
                <span class="book-author">Orwell, George</span>
                <span class="book-edition-number"><?= $book->bk_editionNumber; ?></span>
            </btn>
        </a>
        <?php endforeach ?>
    </div>
</div>
<?= view('sections/footer'); ?>