<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?//= $articles[0]->title ?>
<!--<h1>--><?//= $articles[0]->title ?? 'www' ?><!--</h1>-->
<!--<h1>--><?//= $articles[1]->title ?? '222' ?><!--</h1>-->
<?//= $this->include('partials/content/left') ?>
<main id="main" class="inner-page" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<?= $this->include('partials/breadcrumbs') ?>

	<!-- ======= Sort Section ======= -->
	<section class="sort-area">
		<div class="container">

			<div class="d-flex justify-content-between align-items-center">
				<div id="sort">
					<label class="select" for="sort-type">
						<select id="sort-type" required="required">
							<option value="date_desc" selected="selected">Новые первыми</option>
							<option value="date_asc">Новые последними</option>
							<option value="rating">По рейтингу</option>
							<option value="title">По названию</option>
							<option value="likes">По количеству лайков</option>
							<option value="hits">По количеству просмотров</option>
						</select>
						<svg>
							<use xlink:href="#select-arrow-down"></use>
						</svg>
					</label>
					<!-- SVG Sprites-->
					<svg class="sprites">
						<symbol id="select-arrow-down" viewbox="0 0 10 6">
							<polyline points="1 1 5 5 9 1"></polyline>
						</symbol>
					</svg>
				</div>
				<!--<div id="view">
					<button class="btn grid-view active">
						<i class="bi bi-grid-3x3-gap-fill"></i>
					</button>
					<button class="btn list-view">
						<i class="bi bi-list"></i>
					</button>
				</div>-->
				<div class="search-form">
					<div class="d-flex">
						<div class="search-box">
							<input id="search" class="field" type="text" placeholder="Поиск...">
						</div>
						<div class="search-icon">
							<i class="bi bi-search"></i>
						</div>
					</div>
					<div id="search-results"></div>
				</div>
			</div>

		</div>
	</section><!-- Sort Section -->
	
	<section class="blog-list">
		<div class="container">
	
			<div class="row">
	
				<div class="col-md-9 col-12">
<!--					<div class="section-title">-->
<!--						<h2>Фильтр</h2>-->
<!--						<p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>-->
<!--					</div>-->
					<div class="row" data-list>
						<?php foreach ($articles as $article) : ?>
						<div class="col-lg-4 col-md-6 col-12 mb-4" data-item>
							<div class="blog-item">
								<img data-image class="img-fluid" src="media/images<?= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?>/_intro/<?= $article->images->image_intro; ?>" alt="<?= $article->images->alt_intro; ?>">
								<div class="item-title">
									<h3><a data-title href="<?= $article->parent_url . '/' . $article->url; ?>"><?= $article->title; ?></a></h3>
									<div class="intro"> <a data-category href="<?= $article->parent_url; ?>"><?= $article->c_name; ?></a> </div>
								</div>
								<div class="item-info">
									<div class="text-intro" data-text><?= $article->text_intro; ?></div>
									<div class="text-center">
										<a data-readmore
										   href="<?= $article->parent_url . '/' . $article->url; ?>"
										>Читать далее<span class="licon icon-arr icon-black"></span></a>
									</div>
								</div>
								<div class="utility-info">
									<ul class="utility-list">
										<li>
											<div class="utility-item">
												<i class="bi bi-eye-fill" title="Просмотров"></i>
												<a data-hits href="#"><?= $article->hits; ?></a>
											</div>
											<div class="utility-item">
												<i class="bi bi-heart-fill" title="Понравилось"></i>
												<a data-likes href="#"><?= $article->likes; ?></a>
											</div>
											<div class="utility-item">
												<i class="bi bi-chat-dots-fill" title="Комментариев"></i>
												<a data-comments href="#"><?= $article->comments_count ?? 0 ?></a>
											</div>
										</li>
										<li>
											<div class="utility-item">
												<i class="bi bi-calendar2-check-fill" title="Опубликовано"></i>
												<span data-date><?= $article->created_at; ?></span>
											</div>
											<div class="utility-item">
												<i class="bi bi-star-fill" data-rtitle title="Рейтинг: <?= $article->rating; ?> из <?= $article->rating_count; ?> голосов"></i>
												<span data-rating>
													<?= $article->rating; ?> / <?= $article->rating_count; ?>
												</span>
											</div>
										</li>
										<li data-tags>
											<i class="bi bi-tags-fill" title="Метки"></i>
											<?php if (isset($article->tags)): ?>
												<?php foreach ($article->tags as $tag): ?>
													<a href="tags-<?= $tag->url; ?>">
														<?= $tag->name; ?>
													</a>
												<?php endforeach; ?>
											<?php elseif (isset($article->t_id)): ?>
												<a href="tags-<?= $article->t_url; ?>">
													<?= $article->t_name; ?>
												</a>
											<?php else: ?>
												<span>Меток нет</span>
											<?php endif; ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
				
				<?= $this->include('partials/content/right') ?>
				
				
	
			</div>
	
		</div>
	</section>
</main>


<?= $this->endSection() ?>
