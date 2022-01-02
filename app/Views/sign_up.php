<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Join Us</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="../user/create" method="POST" enctype="multipart/form-data" class="row" style="display:table-row;padding:10px 20px;flex: 1;">
        <!-- Error Warning -->
        <div id="alertMessage" class="alert alert-danger mb-3" style="display: none">
            <span id="alertMessage"></span>
        </div>

        <div class="row sm-6" style="display:flex;padding:10px 20px;flex: 1;">
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
        </div>

        <div class="form-group text-center sm-6">
            <img src="https://coldtimemuhendislik.com/wp-content/uploads/2020/06/default-placeholder.png" onclick="triggerClick()" id="imageDisplay">
            <label for="usr_img_url">Image</label>
            <input type="file" name="usr_img_url" onchange="displayImage(this)" id="usr_img_url" style="display: none">
        </div>

        <div class="sm-6" style="display: flex;align-items: end;flex-direction: row-reverse;">
            <button type="submit" name="save-user" class="btn-outline-primary">SignUp</button>
        </div>
    </form>
<!--
    <div style="background: url('<?= base_url('img/img.png') ?>');flex: 1;background-size: contain;">

    </div>
-->
</div>

<script>
    function triggerClick(){
        document.querySelector('#usr_img_url').click();
    }

    function displayImage(e){
        if(e.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                document.querySelector('#imageDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<style>
    #imageDisplay{
        display: block;
        width: 60%;
        margin: 10px auto;
        border-radius: 50%;
    }
</style>

<?= view('sections/footer') ?>
