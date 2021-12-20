<?= view('dashboard_sections/vw_dash_header') ?>

    <main id="app-main" class="app-main in">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <!-- DOM dataTable -->

                <div class="col-md-6">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Add User</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form method="post" action="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control" name="usr_name"
                                           value="<?= (isset($userEdit) ? $userEdit->usr_name : ''); ?>"
                                           placeholder="User Name">
                                    <input type="hidden" name="usr_id"
                                           value="<?= (isset($userEdit) ? $userEdit->usr_id : ''); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Surname</label>
                                    <input type="text" class="form-control" name="usr_surname"
                                           value="<?= (isset($userEdit) ? $userEdit->usr_surname : ''); ?>"
                                           placeholder="User surname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="usr_username"
                                           value="<?= (isset($userEdit) ? $userEdit->usr_username : ''); ?>"
                                           placeholder="User username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User email</label>
                                    <input type="email" class="form-control" name="usr_mail"
                                           value="<?= (isset($userEdit) ? $userEdit->usr_mail : ''); ?>"
                                           placeholder="User email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="usr_password"
                                           placeholder="User password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Again</label>
                                    <input type="password" class="form-control" name="usr_password_again"
                                           placeholder="User password again">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">User Photo</label>
                                    <input type="file" id="exampleInputFile" name="usr_img_url" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Save</button>
                            </form>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Add
                                    Author <?= (isset($author) ? '- Now Update Form' : '') ?></h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form method="POST" action="">
                                    <input type="hidden" name="auth_id"
                                           value="<?= (isset($author) ? $author->auth_id : '') ?>">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Name</label>
                                        <input type="text" class="form-control" name="auth_name"
                                               value="<?= (isset($author) ? $author->auth_name : '') ?>"
                                               placeholder="Author Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Surname</label>
                                        <input type="text" class="form-control" name="auth_surname"
                                               value="<?= (isset($author) ? $author->auth_surname : '') ?>"
                                               placeholder="Author Surname">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Description</label>
                                        <textarea class="form-control" name="auth_description"
                                                  style="min-height: 69px;"><?= (isset($author) ? trim($author->auth_description) : '') ?></textarea>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary btn-md"><?= (isset($author) ? 'Update' : 'Save') ?></button>
                                </form>
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Add
                                    Category <?= (isset($categoryEdit) ? '- Now Update Form' : '') ?></h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" name="cat_name"
                                               value="<?= (isset($categoryEdit)) ? $categoryEdit->cat_name : ''; ?>"
                                               placeholder="Category Name">
                                        <input type="hidden" name="cat_id"
                                               value="<?= (isset($categoryEdit)) ? $categoryEdit->cat_id : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Category</label>
                                        <select name="cat_parentId" class="form-control">
                                            <option>Please select a parent category</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category->cat_id; ?>" <?= (isset($categoryEdit) && $categoryEdit->cat_parentId == $category->cat_id) ? 'selected=selected' : ''; ?>><?= $category->cat_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-primary btn-md"><?= (isset($categoryEdit) ? 'Update' : 'Save'); ?></button>
                                </form>
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="widget editBookContainer" data-current="<?= isset($bookEdit)?>">
                        <header class="widget-header">
                            <h4 class="widget-title">Add Book</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="bk_title"
                                               value="<?= (isset($bookEdit) ? $bookEdit->bk_title : ''); ?>"
                                               placeholder="Title">
                                        <input type="hidden" name="bk_id"
                                               value="<?= (isset($bookEdit) ? $bookEdit->bk_id : ''); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Edition Number</label>
                                        <input type="text" class="form-control" name="bk_editionNumber"
                                               value="<?= (isset($bookEdit) ? $bookEdit->bk_editionNumber : ''); ?>"
                                               placeholder="Edition Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" name="bk_description"
                                              style="min-height: 69px;"><?= (isset($bookEdit) ? trim($bookEdit->bk_description) : ''); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Owner</label>
                                    <select name="cat_parentId" class="form-control">
                                        <option>Please select a User</option>
                                        <?php foreach ($users as $user): ?>
                                            <option value="<?= $user->usr_id; ?>" <?= (isset($bookEdit) && $bookEdit->bk_ownerId == $user->usr_id) ? 'selected=selected' : ''; ?>>
                                                <?= $user->usr_id . '-' . $user->usr_username; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Author</label>
                                    <select name="cat_parentId" class="form-control">
                                        <option>Please select a author</option>
                                        <?php foreach ($authors as $author): ?>
                                            <option value="<?= $author->auth_id; ?>" <?= (isset($bookEdit) && $bookEdit->bk_authorId == $author->auth_id) ? 'selected=selected' : ''; ?>>
                                                <?= $author->auth_name . ' ' . $author->auth_surname; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Cover Image</label>
                                    <input type="file"  name="bk_mainImgUrl" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Save</button>
                            </form>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div>
            </div><!-- .row -->
        </section><!-- .app-content -->
    </div><!-- .wrap -->

<?= view('dashboard_sections/vw_dash_footer', ['scripts' => [
    'lister.js',
    "../libs/misc/datatables/datatables.min.css",
    "../libs/misc/datatables/datatables.min.js"
]]) ?>