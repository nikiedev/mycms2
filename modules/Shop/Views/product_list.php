<?= $this->extend('layouts\default') ?>

<?= $this->section('content') ?>
<h2>Module</h2>
<ul>
	<?php foreach ($products as $product): ?>
	<li>
		Model: <?= $product['model'] ?>,
		Price: <?= $product['price'] ?>
	</li>
	<?php endforeach ?>
</ul>
<?= $this->endSection() ?>