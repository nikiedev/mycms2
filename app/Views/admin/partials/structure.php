<span><?= $item->name ?></span>
<?php if (!empty($item->children)) : ?>
    <ol>
        <?php foreach($item->children as $item) : ?>
            <li><?= view('admin/partials/structure', ['item' => $item]) ?></li>
        <?php endforeach ?>
    </ol>
<?php endif ?>