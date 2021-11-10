<?= view ('sections/header')?>
<div class = "container" style="display:flex;height: min-content">
    <div class="row align-items-center" style="display:flex;width= 50%;
        border: 2px solid black;padding:10px 20px;">

            <div class="form-group col sm-4">
                <label for = "name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required>
            </div>

            <div class="form-group col sm-4">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
            </div>

            <div class="form-group col sm-4">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
            </div>

            <div class = "form-group col sm-4">
                <label for = "surname"><b>Surname</b></label>
                <input type="text" placeholder="Enter Surname" name="surname" required>
            </div>

            <div class="form-group col sm-4">
                <label for="eMail"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="eMail" required>
            </div>

            <div class="form-group col sm-4">
                <label for="c_psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password Again" name="c_psw" required>
            </div>

            <div class="form-inline" style="width: min-content;height: auto;margin: 0 auto;position:relative">
                <fieldset class="form-group col sm-4 offset sm-4">
                    <p>Gender</p>
                    <label for="gender" class="paper-switch-tile">
                        <input id="gender" name="gender" type="checkbox" />
                        <div class="paper-switch-tile-card border">
                            <div class="paper-switch-tile-card-front border">Male</div>
                            <div class="paper-switch-tile-card-back border">Female</div>
                        </div>
                    </label>
                </fieldset>
            </div>

    </div>

</div>

<div style="width:min-content;margin: 0 auto; position: relative">
    <button class="btn-outline-primary" type="submit">SignUp</button>
</div>

<?= view ('sections/footer')?>
