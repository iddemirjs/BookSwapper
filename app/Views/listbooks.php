<base href="https://raw-dot-custom-elements.appspot.com/PolymerElements/paper-dropdown-menu/v2.0.0/paper-dropdown-menu/">

<script src="../webcomponentsjs/webcomponents-lite.js"></script>
<link rel="import" href="paper-dropdown-menu.html">
<link rel="import" href="../paper-item/paper-item.html">
<link rel="import" href="../paper-listbox/paper-listbox.html">

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
        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <label id="book" class="paper-btn margin" for="modal-1">
            <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                 style="box-sizing: border-box">
            <p class="book-title">1984</p>
            <span class="book-author">Orwell, George</span>
            <span class="book-pub-date">June 8, 1949</span>
        </label>

        <input class="modal-state" id="modal-1" type="checkbox">
        <div class="modal">
            <label class="modal-bg" for="modal-1"></label>
            <div class="modal-body" style="max-width: 100%">
                <label class="btn-close" for="modal-1">X</label>
                <h3 class="modal-title">Book Information</h3>
                <div class="row">
                    <div class="form-group sm-6" style="width: fit-content">
                        <!-- Buraya kitabın küçük bir resmi eklenebilir. -->
                        <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                             style="box-sizing: border-box;max-width: 100%">
                    </div>
                    <div class="form-group sm-6" style="width: max-content">
                        <h3 class="modal-title">1984</h3>
                        <h5 id="author-name" class="modal-subtitle">Orwell, George</h5>
                        <p class="modal-text">Lorem Ipsum Dolor Sit Amet </p>
                    </div>
                </div>
                <label class="paper-btn" for="modal-1">Go to listing details</label>
            </div>
        </div>
    </div>
</div>
<?= view('sections/footer'); ?>