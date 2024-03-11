<nav id="sidebar" class="sidebar js-sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="/admin">
			<span class="align-middle">Админка</span>
		</a>
		<div class="quick-actions">
			<a class="quick-link" href="/" title="">
				<i class="fas fa-home"></i>
			</a>
			<a class="quick-link" href="/" title="Перейти на сайт" target="_blank">
				<i class="fas fa-external-link-alt"></i>
			</a>
			<a class="quick-link" href="/" title="">
				<i class="fas fa-sync-alt"></i>
			</a>
			<a class="quick-link" href="/" title="">
				<i class="fas fa-map-marked-alt"></i>
			</a>
		</div>
		<ul class="sidebar-nav">
			<?php foreach ($menu as $item) : ?>
				<?php if ($item->basename == 'articles') : ?>
					<li class="sidebar-header">
						<h4><i class="fas fa-angle-double-right"></i> Основное</h4>
					</li>
				<?php endif; ?>
				<?php if ($item->basename == 'media') : ?>
					<li class="sidebar-header">
						<h4><i class="fas fa-angle-double-right"></i> Галлерея</h4>
					</li>
				<?php endif; ?>
				<?php if ($item->basename == 'extensions') : ?>
					<li class="sidebar-header">
						<h4><i class="fas fa-angle-double-right"></i> Система</h4>
					</li>
				<?php endif; ?>
				<?php if ($item->basename == 'information') : ?>
					<li class="sidebar-header">
						<h4><i class="fas fa-angle-double-right"></i> Справка</h4>
					</li>
				<?php endif; ?>
				<?= view('admin/partials/menu', ['item' => $item]) ?>
			<?php endforeach; ?>
		</ul>
	</div>
</nav>
