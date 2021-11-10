<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Join Us</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="save.php" method="POST" class="row" style="display:flex;padding:10px 20px;flex: 1;">
    <div class="row" style="display:flex;padding:10px 20px;flex: 1;">

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="name"><b>Username</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="eMail"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="eMail" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="surname"><b>Name</b></label>
                <input type="text" placeholder="Enter Surname" name="surname" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="c_psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password Again" name="c_psw" required>
            </div>

            <div class="form-group sm-6" style="padding-left: 5px">
                <label for="paperSwitch1" class="paper-switch-tile">
                    Gender
                    <input id="paperSwitch1" name="paperSwitch1" type="checkbox"/>
                    <div class="paper-switch-tile-card border">
                        <div class="paper-switch-tile-card-front border">Female</div>
                        <div class="paper-switch-tile-card-back border background-primary">Male</div>
                    </div>
                </label>
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
