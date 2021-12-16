<?= view('sections/header') ?>

<div class="container" style="display:flex;width: min-content; margin-bottom: 0px; margin-top: 0px;">
    <div style="display:table-row; margin-top: 20px; padding: 100px">

        <form action="<?= base_url('user/login'); ?>" method="POST">
            <div class="form-group">
                <div class="form-group" style="justify-content: center; display: flex; font-size: xxx-large">
                    <label><b>LOGIN</b></label>
                </div>
                <div class="form-group row flex-spaces">
                    <div class="alert alert-danger">Your mother has been died because of colera</div>
                </div>
                <div class="form-group">
                    <label for="usr_username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="usr_username" style="width: fit-content" required="">
                </div>
                <div class="form-group">
                    <label for="usr_password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="usr_password" style="width: fit-content" required="">

                </div>
            </div>
            <div class="form-group" style="display: flex; justify-content: center;">
                <div style="display:flex;">
                    <input type="checkbox" name="paperChecks" id="paperChecks1" value="option 1" style="width: min-content">
                    <label for="paperChecks1" style="width: fit-content"><span>&nbsp;Remember Me</span></label>
                </div>
            </div>

            <div style="display:flex;justify-content: center">
                <button class="btn-outline-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<?= view('sections/footer'); ?>
