<?= view('sections/header') ?>
<div class="row ">
    <div class="col-12" style="display: flex;align-items: center;justify-content: center;flex-direction: column">
        <img src="/img/book-swap.jpeg" style="" alt="">
        <h1 class="badge success" style="padding: 10px;font-size: 50px">Hello. Cangurations offer have been created.</h1>
        <h4 class="badge" style="font-size: 40px;">You are redirect to in <span class="secondsForRedirect">5</span> seconds for seeing your offer status.</h4>
    </div>
</div>
<?= view('sections/footer',['scripts' => [
    'lister.js',
    "../libs/misc/datatables/datatables.min.css",
    "../libs/misc/datatables/datatables.min.js"
]]); ?>
