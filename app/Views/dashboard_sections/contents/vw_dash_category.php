<?= view('dashboard_sections/vw_dash_header') ?>

    <main id="app-main" class="app-main in">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <!-- DOM dataTable -->
                <div class="col-md-4">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Categories</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive" style="overflow: hidden">
                                <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="default-datatable" data-plugin="DataTable"
                                                   class="table table-striped dataTable" cellspacing="0" width="100%"
                                                   role="grid" aria-describedby="default-datatable_info"
                                                   style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($categories as $key => $category): ?>
                                                    <tr>
                                                        <th><?= $category->cat_id; ?></th>
                                                        <th><?= $category->cat_name; ?></th>
                                                        <th>
                                                            <button class="btn-primary-outline"><i class="fa fa-edit"
                                                                                                   aria-hidden="true"></i>
                                                            </button>
                                                            <button class="btn-danger-outline"><i class="fa fa-trash"
                                                                                                  aria-hidden="true"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div>
                <!-- END column -->
                <div class="col-md-8">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Authors</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive" style="overflow: hidden">
                                <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="author-datatable"
                                                   class="table table-striped dataTable" cellspacing="0" width="100%"
                                                   role="grid" aria-describedby="default-datatable_info"
                                                   style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Office</th>
                                                    <th>Office</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Office</th>
                                                    <th>Office</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($authors as $key => $author): ?>
                                                    <tr>
                                                        <th><?= $author->auth_id; ?></th>
                                                        <th><?= $author->auth_name; ?></th>
                                                        <th><?= $author->auth_surname; ?></th>
                                                        <th><?= $author->auth_description; ?></th>
                                                        <th>
                                                            <button class="btn-primary-outline"><i class="fa fa-edit"
                                                                                                   aria-hidden="true"></i>
                                                            </button>
                                                            <button class="btn-danger-outline delete"
                                                                    data-url="/dashboard/delete_category/<?= $author->auth_id; ?>">
                                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                        </th>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div>
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">Books</h4>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive" style="overflow: hidden">
                                <div id="default-datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="default-datatable" data-plugin="DataTable"
                                                   class="table table-striped dataTable" cellspacing="0" width="100%"
                                                   role="grid" aria-describedby="default-datatable_info"
                                                   style="width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th>BookId</th>
                                                    <th>Owner</th>
                                                    <th>Book name</th>
                                                    <th>Author</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>BookId</th>
                                                    <th>Owner</th>
                                                    <th>Book name</th>
                                                    <th>Author</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($books as $key => $book): ?>
                                                    <tr>
                                                        <th><?= $book->bk_id; ?></th>
                                                        <th><?= $book->usr_name; ?></th>
                                                        <th><?= $book->bk_title; ?></th>
                                                        <th><?= $book->auth_name; ?></th>
                                                        <th>
                                                            <button class="btn-primary-outline"><i class="fa fa-edit"
                                                                                                   aria-hidden="true"></i>
                                                            </button>
                                                            <button class="btn-danger-outline"><i class="fa fa-trash"
                                                                                                  aria-hidden="true"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    ]
]); ?>