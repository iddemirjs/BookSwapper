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
        <form action="<?= base_url('book/viewDetails'); ?>">
            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>

            <button id="book" class="paper-btn margin" for="modal-1">
                <img src="https://onehundredonebooks.files.wordpress.com/2011/02/1984-book9.jpg" alt="1984"
                     style="box-sizing: border-box">
                <p class="book-title">1984</p>
                <span class="book-author">Orwell, George</span>
                <span class="book-pub-date">June 8, 1949</span>
            </button>
        </form>
    </div>
</div>
<?= view('sections/footer'); ?>