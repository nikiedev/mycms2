<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<main id="main" data-aos="fade-up">

	<!-- ======= Breadcrumbs Section ======= -->
	<?= $this->include('partials/breadcrumbs') ?>

	<!-- ======= Portfolio Details Section ======= -->
	<section id="portfolio-details" class="portfolio-details">
		<div class="container">

			<div class="row gy-4">

				<div class="col-lg-8">
					<div class="swiper-gallery-section">
						<div class="portfolio-details-slider swiper-container">
							<div class="swiper-wrapper align-items-center">
	
								<?php if (isset($article->images->image_full)): ?>
									<div class="swiper-slide">
										<img src="media/images<?= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?>/_full/<?= $article->images->image_full; ?>" alt="<?= $article->images->alt_full ?? $article->title; ?>">
									</div>
								<?php endif; ?>
                                
                                <?php if (isset($article->images->gallery)): ?>
	                                <?php foreach ($article->images->gallery as $image): ?>
										<div class="swiper-slide">
											<img src="media/images<?= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?>/_gallery/<?= $image->img; ?>" alt="<?= $image->alt ?? $article->title; ?>">
										</div>
									<?php endforeach; ?>
                                <?php endif; ?>
	
							</div>
							<div class="swiper-pagination"></div>
						</div>
						<div class="swiper thumbs-details-slider">
							<div class="swiper-wrapper">
                                
                                <?php if (isset($article->images->image_full)): ?>
									<div class="swiper-slide">
										<img src="media/images<?= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?>/_full/<?= $article->images->image_full; ?>" alt="<?= $article->images->alt_full ?? $article->title; ?>">
									</div>
                                <?php endif; ?>
                                
                                <?php if (isset($article->images->gallery)): ?>
                                    <?php foreach ($article->images->gallery as $image): ?>
										<div class="swiper-slide">
											<img src="media/images<?= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?>/_gallery/<?= $image->img; ?>" alt="<?= $image->alt ?? $article->title; ?>">
										</div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
								
							</div>
						</div>
					</div>
					<div class="content">
						<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
							<button class="nav-link active" id="art-full-text-tab" data-bs-toggle="tab" data-bs-target="#art-full-text" type="button" role="tab" aria-controls="art-full-text" aria-selected="true">Описание</button>
							<button class="nav-link" id="art-comments-tab" data-bs-toggle="tab" data-bs-target="#art-comments" type="button" role="tab" aria-controls="art-comments" aria-selected="true">Отзывы</button>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="art-full-text" role="tabpanel" aria-labelledby="art-full-text-tab">
								<article class="card">
									<div class="card-body">
										<div class="row">
											<div class="col">
<!--												<div class="par"><img class="img1 img-fluid" data-zoom="media/images--><?//= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?><!--/_full/--><?//= $article->images->image_full; ?><!--?w=500&ch=DPR&dpr=2" src="media/images--><?//= $article->parent_url == base_url() ? '' : '/' . $article->parent_url; ?><!--/_full/--><?//= $article->images->image_full; ?><!--" alt=""></div>-->
												<?= $article->text_full; ?>
											</div>
										</div>
									</div>
								</article>
							</div>
							<div class="tab-pane fade" id="art-comments" role="tabpanel" aria-labelledby="art-comments-tab">
								<div class="comments card">
									<div class="card-body p-4">
										<div class="row">
											<div class="col">
												<div class="d-flex flex-start">
													<img
															class="rounded-circle shadow-1-strong me-3"
															src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg"
															alt="avatar"
															width="65"
															height="65"
													/>
													<div class="flex-grow-1 flex-shrink-1">
														<div class="comment-block">
															<div class="d-flex justify-content-between align-items-center">
																<p class="mb-1 fw-bold">
																	<span class="user-name">Maria Smantha</span>
																	<span class="small comment-date">- 2 hours ago</span>
																</p>
															</div>
															<p class="small mb-0">
																It is a long established fact that a reader will be distracted by
																the readable content of a page.
															</p>
															<div class="d-flex justify-content-start align-items-center comment-footer">
																<div class="comment-actions">
																	<button class="btn-simple" title="Понравилось">
																		<i class="fas fa-thumbs-up"></i>
																		<span><?= $article->vote_up ?? 0 ?></span>
																	</button>
																	<button class="btn-simple" title="Не понравилось">
																		<i class="fas fa-thumbs-down"></i>
																		<span><?= $article->vote_down ?? 0 ?></span>
																	</button>
																	<button class="btn-simple" title="Поблагодарить">
																		<i class="fas fa-heart"></i>
																		<span><?= $article->thank ?? 0 ?></span>
																	</button>
																	<button class="btn-simple">
																		<i class="fas fa-reply"></i>
																		<span>Ответить</span>
																	</button>
																	<button class="btn-simple">
																		<i class="fas fa-share-alt"></i>
																		<span>Поделиться</span>
																	</button>
																</div>
															</div>
														</div>

														<div class="d-flex flex-start mt-4">
															<a class="me-3" href="#">
																<img
																		class="rounded-circle shadow-1-strong"
																		src="https://mdbootstrap.com/img/Photos/Avatars/img%20(11).jpg"
																		alt="avatar"
																		width="65"
																		height="65"
																/>
															</a>
															<div class="flex-grow-1 flex-shrink-1">
																<div class="comment-block">
																	<div class="d-flex justify-content-between align-items-center">
																		<p class="mb-1 fw-bold">
																			<span class="user-name">Simona Disa</span> <span class="small comment-date">- 3 hours ago</span>
																		</p>
																	</div>
																	<p class="small mb-0">
																		letters, as opposed to using 'Content here, content here',
																		making it look like readable English.
																	</p>
																	<div class="d-flex justify-content-start align-items-center comment-footer">
																		<div class="comment-actions">
																			<button class="btn-simple">
																				<i class="bi bi-chevron-up"></i>
																				<span>Понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-chevron-down"></i>
																				<span>Не понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-suit-heart-fill"></i>
																				<span>Поблагодарить</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-reply-fill"></i>
																				<span>Ответить</span>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="d-flex flex-start mt-4">
															<a class="me-3" href="#">
																<img
																		class="rounded-circle shadow-1-strong"
																		src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg"
																		alt="avatar"
																		width="65"
																		height="65"
																/>
															</a>
															<div class="flex-grow-1 flex-shrink-1">
																<div class="comment-block">
																	<div class="d-flex justify-content-between align-items-center">
																		<p class="mb-1 fw-bold">
																			<span class="user-name">John Smith</span> <span class="small comment-date">- 4 hours ago</span>
																		</p>
																	</div>
																	<p class="small mb-0">
																		the majority have suffered alteration in some form, by
																		injected humour, or randomised words.
																	</p>
																	<div class="d-flex justify-content-start align-items-center comment-footer">
																		<div class="comment-actions">
																			<button class="btn-simple">
																				<i class="bi bi-chevron-up"></i>
																				<span>Понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-chevron-down"></i>
																				<span>Не понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-suit-heart-fill"></i>
																				<span>Поблагодарить</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-reply-fill"></i>
																				<span>Ответить</span>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="d-flex flex-start mt-4">
													<img
															class="rounded-circle shadow-1-strong me-3"
															src="https://mdbootstrap.com/img/Photos/Avatars/img%20(12).jpg"
															alt="avatar"
															width="65"
															height="65"
													/>
													<div class="flex-grow-1 flex-shrink-1">
														<div class="comment-block">
															<div class="d-flex justify-content-between align-items-center">
																<p class="mb-1 fw-bold">
																	<span class="user-name">Natalie Smith</span>
																	<span class="small comment-date">- 2 hours ago</span>
																</p>
															</div>
															<p class="small mb-0">
																The standard chunk of Lorem Ipsum used since the 1500s is
																reproduced below for those interested. Sections 1.10.32 and
																1.10.33.
															</p>
															<div class="d-flex justify-content-start align-items-center comment-footer">
																<div class="comment-actions">
																	<button class="btn-simple">
																		<i class="bi bi-chevron-up"></i>
																		<span>Понравилось</span>
																	</button>
																	<button class="btn-simple">
																		<i class="bi bi-chevron-down"></i>
																		<span>Не понравилось</span>
																	</button>
																	<button class="btn-simple">
																		<i class="bi bi-suit-heart-fill"></i>
																		<span>Поблагодарить</span>
																	</button>
																	<button class="btn-simple">
																		<i class="bi bi-reply-fill"></i>
																		<span>Ответить</span>
																	</button>
																</div>
															</div>
														</div>

														<div class="d-flex flex-start mt-4">
															<a class="me-3" href="#">
																<img
																		class="rounded-circle shadow-1-strong"
																		src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
																		alt="avatar"
																		width="65"
																		height="65"
																/>
															</a>
															<div class="flex-grow-1 flex-shrink-1">
																<div class="comment-block">
																	<div class="d-flex justify-content-between align-items-center">
																		<p class="mb-1 fw-bold">
																			<span class="user-name"></span>Lisa Cudrow <span class="small comment-date">- 4 hours ago</span>
																		</p>
																	</div>
																	<p class="small mb-0">
																		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
																		scelerisque ante sollicitudin commodo. Cras purus odio,
																		vestibulum in vulputate at, tempus viverra turpis.
																	</p>
																	<div class="d-flex justify-content-start align-items-center comment-footer">
																		<div class="comment-actions">
																			<button class="btn-simple">
																				<i class="bi bi-chevron-up"></i>
																				<span>Понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-chevron-down"></i>
																				<span>Не понравилось</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-suit-heart-fill"></i>
																				<span>Поблагодарить</span>
																			</button>
																			<button class="btn-simple">
																				<i class="bi bi-reply-fill"></i>
																				<span>Ответить</span>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="d-flex flex-start mt-4">
															<a class="me-3" href="#">
																<img
																		class="rounded-circle shadow-1-strong"
																		src="https://mdbootstrap.com/img/Photos/Avatars/img%20(29).jpg"
																		alt="avatar"
																		width="65"
																		height="65"
																/>
															</a>
															<div class="flex-grow-1 flex-shrink-1">
																<div class="comment-block">
																	<div class="d-flex justify-content-between align-items-center">
																		<p class="mb-1 fw-bold">
																			<span class="user-name">Maggie McLoan</span>
																			<span class="small comment-date">- 5 hours ago</span>
																		</p>
																	</div>
																	<p class="small mb-0">
																		a Latin professor at Hampden-Sydney College in Virginia,
																		looked up one of the more obscure Latin words, consectetur
																	</p>
																	<div class="d-flex justify-content-start align-items-center comment-footer">
																		<div class="comment-actions">
																			<button class="btn-anim2">
																				<span class="noselect">
																					<i class="bi bi-chevron-up"></i>
																					<span>Понравилось</span>
																				</span>
																			</button>
																			<button class="btn-anim2">
																				<span class="noselect">
																					<i class="bi bi-chevron-down"></i>
																					<span>Не понравилось</span>
																				</span>
																			</button>
																			<button class="btn-anim2">
																				<span class="noselect">
																					<i class="bi bi-suit-heart-fill"></i>
																					<span>Поблагодарить</span>
																				</span>
																			</button>
																			<button class="btn-anim2">
																				<span class="noselect">
																					<i class="bi bi-reply-fill"></i>
																					<span>Ответить</span>
																				</span>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="d-flex flex-start mt-4">
															<a class="me-3" href="#">
																<img
																		class="rounded-circle shadow-1-strong"
																		src="https://mdbootstrap.com/img/Photos/Avatars/img%20(32).jpg"
																		alt="avatar"
																		width="65"
																		height="65"
																/>
															</a>
															<div class="flex-grow-1 flex-shrink-1">
																<div class="comment-block">
																	<div class="d-flex justify-content-between align-items-center">
																		<p class="mb-1 fw-bold">
																			<span class="user-name">John Smith</span> <span class="small comment-date">- 6 hours ago</span>
																		</p>
																	</div>
																	<p class="small mb-0">
																		Autem, totam debitis suscipit saepe sapiente magnam officiis
																		quaerat necessitatibus odio assumenda, perferendis quae iusto
																		labore laboriosam minima numquam impedit quam dolorem!
																	</p>
																	<div class="d-flex justify-content-start align-items-center comment-footer">
																		<div class="comment-actions">
																			<button class="btn-anim">
																				<span class="ib-a">
																					<span class="ib-b">
																				        <span class="ib-c">
																							<i class="bi bi-chevron-up"></i>
																							<span>Понравилось</span>
																				        </span>
																					</span>
																				</span>
																			</button>
																			<button class="btn-anim">
																				<span class="ib-a">
																					<span class="ib-b">
																				        <span class="ib-c">
																							<i class="bi bi-chevron-down"></i>
																							<span>Не понравилось</span>
																				        </span>
																					</span>
																				</span>
																			</button>
																			<button class="btn-anim">
																				<span class="ib-a">
																					<span class="ib-b">
																				        <span class="ib-c">
																							<i class="bi bi-suit-heart-fill"></i>
																							<span>Поблагодарить</span>
																				        </span>
																					</span>
																				</span>
																			</button>
																			<button class="btn-anim">
																				<span class="ib-a">
																					<span class="ib-b">
																				        <span class="ib-c">
																							<i class="bi bi-reply-fill"></i>
																							<span>Ответить</span>
																				        </span>
																					</span>
																				</span>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>

				<div class="col-lg-4">
					<div class="portfolio-info">
						<h3>Подробная информация</h3>
						<ul>
							<li><strong>Категория</strong>: <a data-category href="<?= $article->parent_url; ?>"><?= $article->c_name; ?></a></li>
							<li><strong>Автор</strong>: <?= $article->nickname ?? $article->login ?></li>
							<li>
								<strong>Рейтинг</strong>:
								<?php for ($i = 5, $j = $article->rating; $i > 0; $i--, $j--): ?>
									<?php if ($j > 0 and $j % 10 == 0): ?>
										<i class="bi bi-star-half"></i>
									<?php elseif ($j > 0 and $j % 10 != 0): ?>
										<i class="bi bi-star-fill"></i>
									<?php else: ?>
										<i class="bi bi-star"></i>
									<?php endif; ?>
								<?php endfor; ?>
							</li>
							<li><strong>Просмотров</strong>: <?= $article->hits ?></li>
							<li><strong>Понравилось</strong>: <?= $article->likes ?></li>
							<li><strong>Опубликовано</strong>: <?= $article->created_at ?></li>
							<li><strong>Обновлено</strong>: <?= $article->updated_at ?? 'Еще не редактировалось' ?></li>
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

</main><!-- End #main -->
<?//= $this->include('partials/content/left') ?>
<?//= $this->include('partials/content/main') ?>
<?//= $this->include('partials/content/right') ?>

<?= $this->endSection() ?>
