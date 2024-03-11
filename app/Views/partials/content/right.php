<div class="col-md-3 col-12">
	<div class="row">
		<!--<div class="col-12 mb-4">
			<div class="module search-form">
				<div class="d-flex">
					<div class="search-box">
						<input class="field" type="text" placeholder="Поиск...">
					</div>
					<div class="search-icon">
						<i class="bi bi-search"></i>
					</div>
				</div>
			</div>
		</div>-->
		<div class="col-12 mb-4">
			<div class="module">
				<h3>Категории</h3>
				<div class="accordion-menu" data-accordion-menu>
					<ul>
						<li>
							<a href="<?= $mainCategory; ?>">
								<span>Все</span>
							</a>
						</li>
						<?php if (isset($categories[$mainCategory]->children)) : ?>
						<?php foreach ($categories[$mainCategory]->children as $category) : ?>
							<?= view('category_list', ['category' => $category]) ?>
						<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				
				</div>
			</div>
		</div>
		<div class="col-12 mb-4">
			<div class="module">
				<h3>Метки</h3>
				<div class="tags">
					<?php foreach ($tags as $tag) : ?>
					<a class="tag" href="tags-<?= $tag->url ?>">
						<i class="bi bi-tag-fill"></i>
						<span class="label"><?= $tag->name ?></span>
					</a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="col-12 mb-4">
			<div class="module">
				<h3>Module title here</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos dolore dolorem ducimus enim et, expedita hic in incidunt ipsa labore magnam minus modi nemo, nesciunt reprehenderit sequi unde?</p>
			</div>
		</div>
	</div>
</div>
