<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Add your book</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="../bookcontroller/create" method="POST" class="row" style="display:table-row;padding:10px 20px;flex: 1;">
    <!-- Error Warning -->
    <div id="alertMessage" class="alert alert-danger mb-3" style="display: none">
        <span id="alertMessage"></span>
    </div>

    <div class="row" style="display:flex;padding:10px 20px;flex: 1;">
        <div class="row">
            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="bk_title"><b>Book Title</b></label>
                <input type="text" placeholder="Enter Book Title" name="bk_title" required>
            </div>

            <!-- Burada yazarın ismi alınarak tablodan kontrol edilip ekleme yapılabilir. -->

<!--            <div class="form-group sm-6" style="padding-left: 5px">-->
<!--                <h3 class="nav-title">Sort Options</h3>-->
<!--                <ul class="sort-options" style="display: inline">-->
<!--                    <paper-dropdown-menu id="sort-author" label="Author" style="height: min-content">-->
<!--                        <paper-listbox slot="dropdown-content" selected="0">-->
<!--                            --><?php //foreach ($authors as $key => $author): ?>
<!--                                <paper-item>--><?//= $author->auth_name; ?><!-- --><?//= $author->auth_surname; ?><!--</paper-item>-->
<!--                            --><?php //endforeach ?>
<!--                        </paper-listbox>-->
<!--                    </paper-dropdown-menu>-->
<!--                    <paper-dropdown-menu id="sort-category" label="Category" style="height: min-content">-->
<!--                        <paper-listbox slot="dropdown-content" selected="0">-->
<!--                            --><?php //foreach ($categories as $key => $category): ?>
<!--                                <a href="/bookcontroller/sort_by_category/--><?//= $category->cat_id; ?><!--">-->
<!--                                    <paper-item>--><?//= $category->cat_name; ?><!--</paper-item>-->
<!--                                </a>-->
<!--                            --><?php //endforeach ?>
<!--                        </paper-listbox>-->
<!--                    </paper-dropdown-menu>-->
<!--                </ul>-->
<!--            </div>-->

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="bk_editionNumber"><b>Book Edition Number</b></label>
                <input type="text" placeholder="Enter Book Edition Number" name="bk_editionNumber">
            </div>

            <div class="form-group sm-6">
                <label for="bk_mainImgUrl"><b>Book Image URL</b></label>
                <!-- Placeholder eklenebilir. -->
                <input type="text" placeholder="Enter a book image url" name="bk_mainImgUrl">
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="bk_description"><b>Book Description</b></label>
                <input type="text" placeholder="Enter Book Description" name="bk_description">
            </div>
        </div>

        <div class="sm-6" style="display: flex;align-items: end;flex-direction: row-reverse;">
            <button type="submit" class="btn-outline-primary">Create</button>
        </div>
    </div>
</div>

<?= view('sections/footer'); ?>
