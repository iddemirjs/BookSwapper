<?= view('sections/header') ?>
<div class = "container" style="display:flex;width: min-content; margin-bottom: 100px; margin-top: 100px; border: 2px solid black;padding:25px">
    <div class="row align-items-center" style="display:table-cell; margin-top: 0px; padding: 10px">
        <div class = "form-group">
            <div class="form-group" style="justify-content: center; display: flex; font-size: xxx-large">
                <label><b>LOGIN</b></label>
            </div>
            <div class="form-group col sm-2">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            </div>
            <div class="form-group col sm-2">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>
        </div>
        <div style="display:flex;justify-content: center">
            <button class="btn-outline-primary" type="submit">Login</button>
        </div>
    </div>
</div>
<?= view('sections/footer'); ?>
