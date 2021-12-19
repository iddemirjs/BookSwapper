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
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control" name="usr_name" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User Surname</label>
                                    <input type="text" class="form-control" name="usr_surname" placeholder="User surname">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" name="usr_username" placeholder="User username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User email</label>
                                    <input type="email" class="form-control" name="usr_mail" placeholder="User email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control" name="usr_password" placeholder="User password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Again</label>
                                    <input type="password" class="form-control"  placeholder="User password again">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">User Photo</label>
                                    <input type="file" id="exampleInputFile" class="form-control">
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
                                <h4 class="widget-title">Add Author</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form>
                                    <input type="hidden" name="auth_id" value="<?=(isset($author)?$author->auth_id:'')?>">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Name</label>
                                        <input type="text" class="form-control" id="cat_name" placeholder="Author Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Surname</label>
                                        <input type="text" class="form-control" id="cat_name" placeholder="Author Surname">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Author Description</label>
                                        <textarea class="form-control" style="min-height: 69px;">

                                    </textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                                </form>
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Add Category</h4>
                            </header><!-- .widget-header -->
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="cat_name" placeholder="Category Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Parent Category</label>
                                        <select name="" id="" class="form-control">
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category->cat_id; ?>"><?= $category->cat_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                                </form>
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div>
                </div>
            </div><!-- .row -->
        </section><!-- .app-content -->
    </div><!-- .wrap -->

<?= view('dashboard_sections/vw_dash_footer') ?>