<li>
	<?php if (!empty($category->children)) : ?>
		<a href="<?= $category->parent_url ?>">
			<span><?= $category->name ?></span>
			<i class="bi bi-chevron-down"></i>
		</a>
		<ul class="hidden">
			<?php foreach ($category->children as $category) : ?>
				<?= view('category_list', ['category' => $category]) ?>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<a href="/<?= $category->parent_url ?>">
			<span><?= $category->name ?></span>
		</a>
	<?php endif; ?>
</li>