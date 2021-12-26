<?= view('sections/header') ?>

<div class="offer-container">
    <form action="<?=base_url('BookController/send_offer/'.$bookId);?>" method="POST">
        <div class="form-group">
            <label for="offer_desc">Offer Description</label>
            <textarea id="offer_desc" style="border-color: #5e72e4" placeholder="Enter Your Offer Description Here!"></textarea>
        </div>
        <button type="submit">Send Offer</button>
    </form>
</div>

<?= view('sections/footer'); ?>

<style>
    .offer-container{
        width: max-content;
        height: max-content;
        display: -ms-inline-grid;
        margin: auto;
        alignment: center;
    }
    #offer_desc{
        min-height: 512px;
        min-width: 768px;
        padding: 0.9rem;
    }

</style>
