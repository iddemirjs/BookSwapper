<?= view('sections/header') ?>
    <div class="flex-center" style="justify-content: center;align-items: center;display: flex">
        <div class="col-8">
            <div class="row" style="flex-direction: row;">
                <div class="col-3" style="height: 250px">
                    <img src="/uploads/user_images/<?= $user->usr_img_url; ?>" style="height: max-content">
                </div>
                <div class="col-9">
                    <h1 style="margin-left: 20px;"><?= $user->usr_name . ' ' . $user->usr_surname; ?></h1>
                    <h3 style="margin-left: 20px;"><?= '@' . $user->usr_username . ' ~ ' . $user->usr_mail ?></h3>
                    <span class="badge primary" style="margin-left: 20px;"><?= 'Has Books : ' . count($books) ?></span>
                    <span class="badge warning"
                          style="margin-left: 20px;"><?= 'Offers : ' . (count($received_offers) + count($send_offers)); ?></span>
                    <span class="badge success" style="margin-left: 20px;"><?= 'Accepting Offers : ' . '5' ?></span>
                    <span class="badge danger" style="margin-left: 20px;"><?= 'Rejected Offers : ' . '5' ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-center" style="display: flex;justify-content: center;align-items: center">
        <div class="col-8 flex-center tabs" style="padding: 10px;margin: 20px;">
            <input id="tab1" type="radio" name="tabs" checked>
            <label class="badge primary" style="color: #ddd" for="tab1">Books</label>

            <input id="tab2" type="radio" name="tabs">
            <label class="badge warning" style="color: #ddd" for="tab2">Waiting Offers</label>

            <input id="tab3" type="radio" name="tabs">
            <label class="badge success" style="color: #ddd" for="tab3">Accepting Offers</label>

            <input id="tab4" type="radio" name="tabs">
            <label class="badge danger" style="color: #ddd" for="tab4">Rejected Offers</label>

            <div class="content" id="content1">
                <h3>Books</h3>
                <?php if ($books != null): ?>
                    <?php $bcount = count($books) ?>
                    <div style="display: flex">
                        <?php for ($b_index = 0; $b_index < $bcount; $b_index++): $book = $books[$b_index] ?>
                            <div class='book border border-5 border-primary' style="margin-right:30px;padding: 20px;">
                                <img src='/uploads/book_images/<?= ($book->bk_mainImgUrl) ?>'
                                     style="box-sizing: border-box;width:227px;height:338px">
                                <ul class="book-title"><?= $book->bk_title; ?></ul>
                                <ul class="book-author">Author:
                                    <?= $books_authors[$b_index]->auth_name; ?> <?= $books_authors[$b_index]->auth_surname; ?></ul>
                                <ul class="book-edition-number">Edition Number:<?= $book->bk_editionNumber; ?></ul>
                                <ul class="book-category" style="font-family: Patrick Hand SC,sans-serif;font-weight: 400;">
                                    Categories:
                                    <?php foreach ($books_categories[$b_index] as $key1 => $books_category): ?>
                                        <li><?= $books_category->cat_name; ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endfor ?>
                    </div>
                <?php else: ?>
                    <h3>No Books Found</h3>
                <?php endif; ?>
            </div>
            <div class="content" id="content2">
                <h3>Waiting Offers</h3>
                <table class="table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bob Dylan</td>
                        <td>Musician</td>
                        <td>
                            <span class="badge success">Accept</span>
                            <span class="badge danger">Reject</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Eric Clapton</td>
                        <td>Musician</td>
                        <td>
                            <span class="badge success">Accept</span>
                            <span class="badge danger">Reject</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Daniel Kahneman</td>
                        <td>Psychologist</td>
                        <td>
                            <span class="badge success">Accept</span>
                            <span class="badge danger">Reject</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="content" id="content3">
                <p>
                    Bacon ipsum dolor sit amet beef venison beef ribs kielbasa...
                </p>
                <p>
                    Brisket meatball turkey short loin boudin leberkas meatloaf...
                </p>
            </div>
            <div class="content" id="content4">
                <p>
                    Bacon ipsum dolor sit amet landjaeger sausage brisket...
                </p>
            </div>
        </div>
    </div>
<?= view('sections/footer'); ?>