<?= view('sections/header') ?>

<div class = "container" style="display:flex;width: min-content; margin-bottom: 100px; margin-top: 100px; border: 2px solid black;">
    <div class="row align-items-center" style="display:table-cell; margin-top: 0px; padding: 10px">
        <form action="<?= base_url('user/login'); ?>" method="POST">
            <div class="form-group">
                <div class="form-group" style="justify-content: center; display: flex; font-size: xxx-large">
                    <label><b>LOGIN</b></label>
                </div>
                <div class="form-group col sm-4">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="usr_username" style="width: fit-content" required>
                </div>
                <div class="form-group col sm-4">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="usr_password" style="width: fit-content" required>
                </div>
            </div>
            <div class = "form-group" style="display: flex; justify-content: center;">
                <div style="display:flex;">
                    <input type="checkbox" name="paperChecks" id="paperChecks1" value="option 1" style="width: min-content">
                    <label for="paperChecks1" style="width: fit-content"><span>Remember Me</span></label>
                </div>
            </div>

            <div style="display:flex;justify-content: center">
                <button class="btn-outline-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
<?= view('sections/footer'); ?>
