<?= view('sections/header') ?>
<form action="#" style="display: contents">

    <div class="row flex-center">
        <div class="col-4">
            <div class="card-header" style="display: flex;justify-content: space-around;padding: 5px">
                <div style="line-height: 50px;">Your Side</div>
                <div style="float: right"><img src="https://avatars.githubusercontent.com/u/28766071?v=4"
                                               alt="Random Unsplash" style="height: 50px;"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Books to be given</h4>
                <ul style="width: 100%;list-style: none;min-height: 200px;">
                    <li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;">
                        <div style="width: calc( 100% - 50px)">
                            <h6>bunu ekledin</h6>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : 6</span>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Sil</span>
                        </div>
                        <img src="https://unsplash.it/900" alt="Random Unsplash" style="height: 50px;">
                    </li>
                    <li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;">
                        <div style="width: calc( 100% - 50px)">
                            <h6>bunu ekledin</h6>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : 6</span>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Sil</span>
                        </div>
                        <img src="https://unsplash.it/900" alt="Random Unsplash" style="height: 50px;">
                    </li>
                    <li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;">
                        <div style="width: calc( 100% - 50px)">
                            <h6>bunu ekledin</h6>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : 6</span>
                            <span class="border border-2 border-primary" style="padding: 2px 5px;">Sil</span>
                        </div>
                        <img src="https://unsplash.it/900" alt="Random Unsplash" style="height: 50px;">
                    </li>
                </ul>
                <div class="form-inline" style="display: flex;justify-items: end;">
                    <select name="" id="" style="width: calc( 100% - 50px);">
                        <option value="afs">asfafs</option>
                    </select>
                    <span class="alert alert-success" style="width: 50px;height: 50px;margin-bottom: 0px;">+</span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-header" style="display: flex;justify-content: space-around; padding: 5px;">
                <div style="line-height: 50px;">Target User</div>
                <div style="float: right"><img src="https://unsplash.it/900" alt="Random Unsplash"
                                               style="height: 50px;"></div>
            </div>
            <div class="card-body">
                <h4 class="card-title">Books to want</h4>
                <div class="form-inline" style="display: flex;">
                    <ul style="width: 100%;list-style: none;min-height: 200px;">
                        <li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;">
                            <div style="width: calc( 100% - 50px)">
                                <h6>bunu ekledin</h6>
                                <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : 6</span>
                                <span class="border border-2 border-primary" style="padding: 2px 5px;">Sil</span>
                            </div>
                            <img src="https://unsplash.it/900" alt="Random Unsplash" style="height: 50px;">
                        </li>
                        <li class=" d-flex" style="padding: 3px 5px;margin-top: 5px;">
                            <div style="width: calc( 100% - 50px)">
                                <h6>bunu ekledin</h6>
                                <span class="border border-2 border-primary" style="padding: 2px 5px;">Edition : 6</span>
                                <span class="border border-2 border-primary" style="padding: 2px 5px;">Sil</span>
                            </div>
                            <img src="https://unsplash.it/900" alt="Random Unsplash" style="height: 50px;">
                        </li>
                    </ul>
                    <select name="" id="" style="width: calc( 100% - 50px);">
                        <option value="afs">asfafs</option>
                    </select>
                    <span class="alert alert-success" style="width: 50px;height: 50px;margin-bottom: 0px;">+</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-center" style="padding: ">
        <div class="form-group col-8">
            <label for="">Description:</label>
            <textarea class="col-8" name="" style="width: 100%;" id="" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <button class="btn-warning" style="float: right;">Lets Change</button>
        </div>
    </div>
</form>

<?= view('sections/footer'); ?>

