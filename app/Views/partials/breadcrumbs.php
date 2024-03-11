<section class="breadcrumbs">
	<div class="container">

		<div class="d-flex justify-content-between align-items-center">
			<h1>
				<?= $page->title ?? $article->title ?? $articles[0]->c_name ?? 'Публикации' ?>
			</h1>
			<ul><span class="me-3"><?php if (!empty($breadcrumbs)): ?>Вы здесь: <?php endif; ?></span>
				<?php foreach ($breadcrumbs as $breadcrumb) : ?>
					<li>
						<?php if ($breadcrumb == end($breadcrumbs)) : ?>
							<?= $breadcrumb->name ?>
						<?php else: ?>
							<a href="/<?= $breadcrumb->url ?>">
								<?= $breadcrumb->name ?>
							</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div>
</section>