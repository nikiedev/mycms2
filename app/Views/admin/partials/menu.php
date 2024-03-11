<?php $isActive = \Helpers\Str::equals($item->basename, uri_string()) ?>
<li class="sidebar-item<?= $isActive ? ' active' : '' ?>">
	<?php if (!empty($item->children)) : ?>
		<a data-bs-target="#<?= $item->basename ?>" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
			<i class="fas fa-<?= $item->icon ?>"></i> <span class="align-middle"><?= $item->name ?></span>
		</a>
		<ul id="<?= $item->basename ?>" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
			<?php foreach ($item->children as $item) : ?>
				<?= view('admin/partials/menu', ['item' => $item]) ?>
			<?php endforeach; ?>
		</ul>
	<?php else: ?>
		<a class="sidebar-link" href="/<?= $item->url ?>">
			<i class="fas fa-<?= $item->icon ?>"></i> <span class="align-middle"><?= $item->name ?></span>
		</a>
	<?php endif; ?>
</li>