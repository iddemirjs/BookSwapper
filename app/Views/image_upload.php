<?php include 'imageProcessForm.php' ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
                <form action="image_upload.php" method="post" enctype="multipart/form-data">

                    <h3 class="text-center">Title</h3>

                    <?php if(!empty($msg)): ?>
                        <div class="alert <?php echo $css_class; ?>">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group text-center">
                        <img src="https://coldtimemuhendislik.com/wp-content/uploads/2020/06/default-placeholder.png" onclick="triggerClick()" id="imageDisplay">
                        <label for="image">Image</label>
                        <input type="file" name="image" onchange="displayImage(this)" id="image" style="display: none">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="save-image" class="btn btn-primary btn-block">Save Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function triggerClick(){
            document.querySelector('#image').click();
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
</body>
<style>
    .form-div{
        margin-top: 100px;
        border: 1px solid #e0e0e0;
        padding-top: 15px;
    }

    #imageDisplay{
        display: block;
        width: 60%;
        margin: 10px auto;
        border-radius: 50%;
    }
</style>
</html>