<?= view('sections/header') ?>

<div class="offer-container">
    <div class="form-group">
        <label for="offer_desc">Offer Description</label>
        <textarea id="offer_desc" placeholder="Enter Your Offer Description Here!"></textarea>
    </div>
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
