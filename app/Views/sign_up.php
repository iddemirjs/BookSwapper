<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Join Us</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="../user/create" method="POST" class="row" style="display:flex;padding:10px 20px;flex: 1;">
        <div class="alert alert-danger">Sign up Error!</div>
    <div class="row" style="display:flex;padding:10px 20px;flex: 1;">
            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="usr_username" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_mail"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="usr_mail" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="usr_name" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_surname"><b>Surname</b></label>
                <input type="text" placeholder="Enter Surname" name="usr_surname" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="usr_password" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="usr_passwordAgain"><b>Password</b></label>
                <input type="password" placeholder="Enter Password Again" name="usr_passwordAgain" required>
            </div>
      
            <div class="sm-6" style="display: flex;align-items: end;flex-direction: row-reverse;">
                <button class="btn-outline-primary" type="submit">SignUp</button>
            </div>
    </div>
    </form>
    <div style="background: url('<?= base_url('img/img.png') ?>');flex: 1;background-size: contain;">

    </div>
</div>

<?= view('sections/footer') ?>
