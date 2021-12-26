<style>
    .pagination li:before{
        content: '';
    }
    .pagination li{
        text-indent: 20px;
        font-size: 45px;
        display: inline-block;
        text-align: center;
    }
</style>

<?= view('sections/header') ?>

<div class="container" id="author_list_container">
    <div class="author_list" >
        <?php foreach($authors as $key => $author):?>
            <a class="paper-btn margin" style="width: 290px" href="/authorcontroller/view_author/<?= $author->auth_id; ?>">
                <ul class="Author-name">Author:
                    <?=$author->auth_name;?> <?=$author->auth_surname;?>
                </ul>
                <p class = "Author-Desc">Author Description:
                    <?=$author->auth_description;?>
                </p>
            </a>
        <?php endforeach ?>
        <?= $pager->links() ?>
    </div>
</div>

<?= view('sections/footer'); ?>
