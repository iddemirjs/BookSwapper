<?= view('sections/header') ?>
    <div class="main-content">
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
             style="min-height: 600px; background-image: url(https://raw.githack.com/creativetimofficial/argon-dashboard/master/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Hello <?= $user->usr_name ?></h1>
                        <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made
                            with
                            your work and manage your projects or assigned tasks</p>
                        <a href="#!" class="btn btn-info">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg"
                                             class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <h4>22</h4>
                                            <h4>Books</h4>
                                        </div>
                                        <div>
                                            <h4>10</h4>
                                            <h4>Offers</h4>
                                        </div>
                                        <div>
                                            <h4>89</h4>
                                            <h4>Exchanges</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    <?= $user->usr_name ?> <?= $user->usr_surname ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label"
                                                       for="profile-username">Username</label>
                                                <h3 id="profile-username"><?= $user->usr_username ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="profile-mail">Email
                                                    address</label>
                                                <h3 id="profile-mail"><?= $user->usr_mail ?> </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="profile-name">First name</label>
                                                <h3 id="profile-name"><?= $user->usr_name ?> </h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="profile-surname">Last
                                                    name</label>
                                                <h3 id="profile-surname"><?= $user->usr_surname ?> </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Below will be the listing for books.-->
                                <?=view('list_user_books',['books'=>$books,
                                    'received_offers'=>$received_offers,
                                    'send_offers'=>$send_offers,
                                    'books_categories'=>$books_categories,
                                    'books_authors'=>$books_authors]);?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= view('sections/footer'); ?>