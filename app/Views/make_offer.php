<?= view('sections/header') ?>
<form action="/offer/create" method="post" style="display: contents">

    <div class="row flex-center">
        <div class="col-4">
            <div class="card-header" style="display: flex;justify-content: space-around;padding: 5px">
                <div style="line-height: 50px;">Your Side
                    : <?= $offerUser->usr_name . ' ' . $offerUser->usr_surname; ?></div>
                <div style="float: right">
                    <img src="/uploads/user_images/<?= $offerUser->usr_img_url; ?>"
                         alt="Random Unsplash" style="height: 50px;">
                </div>
                <input name="of_creatorUserId" type="hidden" value="<?= $offerUser->usr_id; ?>">
            </div>
            <div class="card-body">
                <h4 class="card-title">Books to be given</h4>
                <ul style="width: 100%;list-style: none;min-height: 200px;">

                </ul>
                <div class="form-inline" style="display: flex;justify-items: end;">
                    <select name="" id="" style="width: calc( 100% - 50px);">
                        <?php foreach ($offerBooks as $key => $book): ?>
                            <option value="<?= $book->bk_id; ?>"><?= $book->bk_title . ' - EN : ' . $book->bk_editionNumber; ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="alert alert-success addBookToList"
                          style="width: 50px;height: 50px;margin-bottom: 0px;">+</span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card-header" style="display: flex;justify-content: space-around; padding: 5px;">
                <div style="line-height: 50px;">Target User :
                    : <?= $targetUser->usr_name . ' ' . $targetUser->usr_surname; ?></div>
                <div style="float: right">
                    <img src="/uploads/user_images/<?= $targetUser->usr_img_url; ?>"
                         alt="Random Unsplash"
                         style="height: 50px;">
                </div>
                <input name="of_targetUserId" type="hidden" value="<?= $targetUser->usr_id; ?>">

            </div>
            <div class="card-body">
                <h4 class="card-title">Books to want</h4>
                <div class="form-inline" style="display: flex;">
                    <ul style="width: 100%;list-style: none;min-height: 200px;">

                    </ul>
                    <select name="" id="" style="width: calc( 100% - 50px);">
                        <?php foreach ($targetUserBooks as $key => $book): ?>
                            <option value="<?= $book->bk_id; ?>"><?= $book->bk_title . ' - EN : ' . $book->bk_editionNumber; ?></option>
                        <?php endforeach ?>
                    </select>
                    <span class="alert alert-success addBookToList"
                          style="width: 50px;height: 50px;margin-bottom: 0px;">+</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-center" style="padding: ">
        <div class="form-group col-8">
            <label for="">Description:</label>
            <textarea class="col-8" name="of_description" style="width: 100%;" id="" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <button class="btn-warning" type="submit" style="float: right;">Lets Change</button>
        </div>
    </div>
</form>

<?= view('sections/footer', ['scripts' => [
    'lister.js',
    "../libs/misc/datatables/datatables.min.css",
    "../libs/misc/datatables/datatables.min.js"
]]); ?>

