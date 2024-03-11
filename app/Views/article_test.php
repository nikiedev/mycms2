<?= $this->extend('layouts\default') ?>

<?= $this->section('content') ?>

<h1><?= 'Article' ?></h1>

<?//= view_cell('\Modules\Shop\Controllers\ShopController::productList') ?>

<?//= \App\Helpers\Module::load('Shop', 'productList') ?>
<?//= $this->include('Modules\Shop\Views\shop_product_list') ?>
<?//= $this->renderSection('product_list') ?>
<!---->
<?= $this->endSection() ?>

<?//= $this->renderSection('product_list') ?>

