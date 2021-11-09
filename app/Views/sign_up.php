<?= view ('sections/header')?>
<div class = "container" style="display:flex;height: min-content">
    <div class="row align-items-center" style="display:flex;width= 50%;border: 2px solid black;">
        <div class = "form-group" style="float:left">

            <label for = "name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
            <br>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <br>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <fieldset class="form-group" style="float:left">
                <p>Gender</p>
                <label for="gender" class="paper-switch-tile">
                    <input id="gender" name="gender" type="checkbox" />
                    <div class="paper-switch-tile-card border">
                        <div class="paper-switch-tile-card-front border">Male</div>
                        <div class="paper-switch-tile-card-back border">Female</div>
                    </div>
                </label>
        </div>
        <div class="form-group" style="float:right">


            <label for = "surname"><b>Surname</b></label>
            <input type="text" placeholder="Enter Surname" name="surname" required>
            <br>


            <label for="eMail"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="eMail" required>
            <br>

            <label for="c_psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password Again" name="c_psw" required>


            <br>
            <div style="float:right">
                <button class="btn-outline-primary" type="submit">SignUp</button>
            </div>


        </div>
    </div>

</div>
<?= view ('sections/footer')?>
