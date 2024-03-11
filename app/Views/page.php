<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main id="main" class="inner-page" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<?= $this->include('partials/breadcrumbs') ?>

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4">

				<div class="col-lg-8">
					<div class="portfolio-details-slider swiper-container">
						<div class="swiper-wrapper align-items-center">
                            
                            <?php if (isset($page->images->image_full)): ?>
								<div class="swiper-slide">
									<img src="media/images<?= $page->parent_url == base_url() ? '' : '/' . $page->parent_url; ?>/_full/<?= $page->images->image_full; ?>" alt="<?= $page->images->alt_full ?? $page->title; ?>">
								</div>
                            <?php endif; ?>
                            
                            <?php if (isset($page->images->gallery)): ?>
                                <?php foreach ($page->images->gallery as $image): ?>
									<div class="swiper-slide">
										<img src="media/images<?= $page->parent_url == base_url() ? '' : '/' . $page->parent_url; ?>/_gallery/<?= $image->img; ?>" alt="<?= $image->alt ?? $page->title; ?>">
									</div>
                                <?php endforeach; ?>
                            <?php endif; ?>

						</div>
						<div class="swiper-pagination"></div>
					</div>

					<div class="content">
						<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
							<button class="nav-link active" id="art-full-text-tab" data-bs-toggle="tab" data-bs-target="#art-full-text" type="button" role="tab" aria-controls="art-full-text" aria-selected="true">Описание</button>
						</div>
						
						<article class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<?= $page->text_full; ?>
									</div>
								</div>
							</div>
						</article>
						
					</div>

				</div>

				<div class="col-lg-4">
					<div class="portfolio-info">
						<h3>Подробная информация</h3>
						<ul>
							<li><strong>Категория</strong>: <a data-category href="<?= $page->parent_url; ?>"><?= $page->c_name; ?></a></li>
							<li><strong>Автор</strong>: <?= $page->nickname ?? $page->login ?></li>
							<li>
								<strong>Рейтинг</strong>:
								<?php for ($i = 5, $j = $page->rating; $i > 0; $i--, $j--): ?>
									<?php if ($j > 0 and $j % 10 == 0): ?>
										<i class="bi bi-star-half"></i>
									<?php elseif ($j > 0 and $j % 10 != 0): ?>
										<i class="bi bi-star-fill"></i>
									<?php else: ?>
										<i class="bi bi-star"></i>
									<?php endif; ?>
								<?php endfor; ?>
							</li>
							<li><strong>Просмотров</strong>: <?= $page->hits ?></li>
							<li><strong>Понравилось</strong>: <?= $page->likes ?></li>
							<li><strong>Опубликовано</strong>: <?= $page->created_at ?></li>
							<li><strong>Обновлено</strong>: <?= $page->updated_at ?? 'Еще не редактировалось' ?></li>
						</ul>
					</div>
					<div class="portfolio-description">
						<h2>This is an example of portfolio detail</h2>
						<p>
							Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
						</p>
					</div>
				</div>

			</div>



		</div>
	</section><!-- End Portfolio Details Section -->
	
<?//= $this->include('partials/content/left') ?>
<?//= $this->include('partials/content/main') ?>
<?//= $this->include('partials/content/right') ?>
</main><!-- End #main -->

<?= $this->endSection() ?>
