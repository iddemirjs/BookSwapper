<?= view('sections/header') ?>
<h1 class="article-title text-center background-success" style="margin:0 0 30px 0;padding: .80rem 0; ">Join Us</h1>
<div class="container" style="display:flex;height: min-content">
    <form action="../user/create" method="POST" class="row" style="display:flex;padding:10px 20px;flex: 1;">

        <!-- Error Warning -->
        <div id="alertMessage" class="alert alert-danger mb-3" style="display: none">
            <span id="alertMessage"></span>
        </div>

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
                <button type="submit" class="btn-outline-primary">SignUp</button>
            </div>
        </div>
    </form>

    <div class="container mt-5 sm-4" style="max-width: fit-content; max-height: min-content">
        <form method="post" id="upload_image_form" enctype="multipart/form-data">
            <div class="d-grid text-center">
                <img class="mb-3" id="uploadedImage" alt="Preview Image" src="https://via.placeholder.com/300" />
            </div>

            <div class="mb-3">
                <input id="finput" type="file" name="file" multiple="true" onchange="onFileUpload(this);"
                       class="form-control form-control-lg"  accept="image/*">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-danger uploadBtn">Upload</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function onFileUpload(input, id) {
            id = id || '#uploadedImage';
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result).width(300)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function () {
            $('#upload_image_form').on('submit', function (e) {

                $('.uploadBtn').html('Uploading ...');
                $('.uploadBtn').prop('Disabled');

                e.preventDefault();
                if ($('#file').val() == '') {
                    alert("Choose File");
                    $('.uploadBtn').html('Upload');
                    $('.uploadBtn').prop('enabled');
                    document.getElementById("upload_image_form").reset();
                } else {
                    $.ajax({
                        url: "<?php echo base_url(); ?>/User/upload",
                        method: "POST",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: "json",
                        success: function (res) {
                            console.log(res.success);
                            if (res.success == true) {
                                $('#uploadedImage').attr('src', 'https://via.placeholder.com/300');
                                $('#alertMessage').html(res.msg);
                                $('#alertMessage').show();
                            }
                            else if (res.success == false) {
                                $('#alertMessage').html(res.msg);
                                $('#alertMessage').show();
                            }
                            setTimeout(function () {
                                $('#alertMessage').html('');
                                $('#alertMessage').hide();
                            }, 4000);

                            $('.uploadBtn').html('Upload');
                            $('.uploadBtn').prop('Enabled');
                            document.getElementById("upload_image_form").reset();
                        }
                    });
                }
            });
        });
    </script>

</div>

<?= view('sections/footer') ?>
