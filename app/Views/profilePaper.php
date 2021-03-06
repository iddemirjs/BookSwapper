<?= view('sections/header') ?>
    <div class="flex-center" style="justify-content: center;align-items: center;display: flex">
        <div class="col-8">
            <div class="row" style="flex-direction: row;">
                <div class="col-3" style="height: 250px">
                    <img src="/uploads/user_images/<?= $user->usr_img_url; ?>" style="height: 285px;">
                </div>
                <div class="col-9">
                    <h1 style="margin-left: 20px;">
                        <?= $user->usr_name . ' ' . $user->usr_surname; ?>
                        <?php if (session()->get('user') !== null && session()->get('user')['usr_id'] == $user->usr_id): ?>
                            <button data-id="<?= $user->usr_id; ?>" class="btn-secondary editProfile" style="font-size: 24px;">Edit</button>
                        <?php endif ?>
                    </h1>
                    <h3 style="margin-left: 20px;"><?= '@' . $user->usr_username . ' ~ ' . $user->usr_mail ?></h3>
                    <span class="badge primary" style="margin-left: 20px;"><?= 'Has Books : ' . count($books) ?></span>
                    <span class="badge warning"
                          style="margin-left: 20px;"><?= 'Offers : ' . (count($rejectedOffers)+count($acceptedOffers) +count($waitingOffers)+ count($sentOffers)); ?></span>
                    <span class="badge danger" style="margin-left: 20px;"><?= 'Waiting Offers : ' . count($waitingOffers) ?></span>
                    <span class="badge success" style="margin-left: 20px;"><?= 'Accepted Offers : ' . count($acceptedOffers) ?></span>
                    <span class="badge danger" style="margin-left: 20px;"><?= 'Rejected Offers : ' . count($rejectedOffers) ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-center" style="display: flex;justify-content: center;align-items: center">
        <div class="col-8 flex-center tabs" style="padding: 10px;margin: 20px;">
            <input id="tab1" type="radio" name="tabs" checked>
            <label class="badge primary" style="color: #ddd" for="tab1">Books</label>

            <input id="tab5" type="radio" name="tabs">
            <label class="badge info" style="color: #ddd" for="tab5">Sent Offers</label>

            <input id="tab2" type="radio" name="tabs">
            <label class="badge warning" style="color: #ddd" for="tab2">Waiting Offers</label>

            <input id="tab3" type="radio" name="tabs">
            <label class="badge success" style="color: #ddd" for="tab3">Accepted Offers</label>

            <input id="tab4" type="radio" name="tabs">
            <label class="badge danger" style="color: #ddd" for="tab4">Rejected Offers</label>
            <div class="content" id="content5">
                <h3>Sent Offers</h3>

                <table class="table-hover">
                    <thead>
                    <tr>
                        <th>Details</th>
                        <th>#</th>
                        <th>OfferOwner</th>
                        <th>OfferTarget</th>
                        <th>OfferDescription</th>
                        <th>OfferStatus</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sentOffers as $sKey => $sentOffer): ?>
                        <tr>
                            <td><button class="btn-secondary exploder"><img style="width: 8px;height: 8px;" src="https://pngset.com/images/search-magnifier-search-icon-no-background-magnifying-tape-transparent-png-96875.png" alt=""></button></td>
                            <td><?= $sentOffer->of_id; ?></td>
                            <td><?= $sentOffer->ownerName; ?></td>
                            <td><?= $sentOffer->targetName; ?></td>
                            <td><?= $sentOffer->of_description; ?></td>
                            <td><?php if ($sentOffer->of_status == 0): ?>
                                    Waiting
                                <?php elseif($sentOffer->of_status == 1): ?>
                                    Accepted
                                <?php else: ?>
                                    Rejected
                                <?php endif ?></td>
                        </tr>
                    <tr class="explode hide">
                        <td colspan="6">
                            <div class="row">
                                <div class="md-6 text-center">
                                    <h3>Give</h3>
                                    <ul>
                                        <?php foreach ($sentOffer->books as $sBookId => $sBook): ?>
                                            <?php if ($sBook->line_currentUserId == $sentOffer->of_creatorUserId): ?>
                                                <li><?= $sBook->bk_title; ?></li>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="md-6 text-center">
                                    <h3>Take</h3>
                                    <ul>
                                        <?php foreach ($sentOffer->books as $sBookId => $sBook): ?>
                                            <?php if ($sBook->line_currentUserId == $sentOffer->of_targetUserId): ?>
                                                <li><?= $sBook->bk_title; ?></li>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="content" id="content1">
                <h3>Books</h3>
                <?php if ($books != null): ?>
                    <?php $bcount = count($books) ?>
                    <div class="row" style="display: flex">
                        <?php for ($b_index = 0; $b_index < $bcount; $b_index++): $book = $books[$b_index] ?>
                            <div class='md-3 book border border-5 border-primary' style="margin-right:30px;padding: 20px;position: relative">
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
                                <button class="btn-success editBook" data-bookId="<?= $book->bk_id; ?>" style="position: absolute;bottom: 20px;right: 20px;">Edit Book</button>
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
                        <th>OfferOwner</th>
                        <th>OfferTarget</th>
                        <th>OfferDescription</th>
                        <th>OfferStatus</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($waitingOffers as $sKey => $sentOffer): ?>
                        <tr>
                            <td><?= $sentOffer->of_id; ?></td>
                            <td><?= $sentOffer->ownerName; ?></td>
                            <td><?= $sentOffer->targetName; ?></td>
                            <td><?= $sentOffer->of_description; ?></td>
                            <td><?php if ($sentOffer->of_status == 0): ?>
                                    <a href="/offer/reject/<?= $sentOffer->of_id; ?>" style="background-image: none;" class="badge danger">Reject</a>
                                    <a href="/offer/accept/<?= $sentOffer->of_id; ?>" style="background-image: none;" class="badge success">Accept</a>
                                <?php elseif($sentOffer->of_status == 1): ?>
                                    Accepted
                                <?php else: ?>
                                    Rejected
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="content" id="content3">
                <h3>Accepted Offers</h3>
                <table class="table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>OfferOwner</th>
                        <th>OfferTarget</th>
                        <th>OfferDescription</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($acceptedOffers as $sKey => $sentOffer): ?>
                        <tr>
                            <td><?= $sentOffer->of_id; ?></td>
                            <td><?= $sentOffer->ownerName; ?></td>
                            <td><?= $sentOffer->targetName; ?></td>
                            <td><?= $sentOffer->of_description; ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="content" id="content4">
                <h3>Rejected Offers</h3>
                <table class="table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>OfferOwner</th>
                        <th>OfferTarget</th>
                        <th>OfferDescription</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rejectedOffers as $sKey => $sentOffer): ?>
                        <tr>
                            <td><?= $sentOffer->of_id; ?></td>
                            <td><?= $sentOffer->ownerName; ?></td>
                            <td><?= $sentOffer->targetName; ?></td>
                            <td><?= $sentOffer->of_description; ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= view('sections/footer',['scripts' => [
    'lister.js',
    "../libs/misc/datatables/datatables.min.css",
    "../libs/misc/datatables/datatables.min.js"
]]); ?>