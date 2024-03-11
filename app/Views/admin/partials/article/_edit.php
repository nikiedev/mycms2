<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-4 text-gray-800">Публикации</h1>
			<a href="/admin/article/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-font-weight-font-weight-bold text-primary"><i class="fas fa-pencil-alt"></i> Изменение материала</h6>
				<h4 class="title my-1">
					<i class="fas fa-heading"></i>
					<?= $item->title ?>
				</h4>
			</div>
			<div class="card-body">
				<form action="/admin/article/edit/<?= $item->id ?>" method="post" enctype="multipart/form-data">
				<p>
					<a class="btn btn-dark" href="/admin/article">Отмена</a>
					<button name="action" value="list" class="btn btn-twitter save-and-back">Сохранить и вернуться</button>
					<button name="action" value="edit" class="btn btn-facebook save-and-stay">Сохранить и остаться</button>
				</p>
				<div class="item edit">
					<div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
						<button class="nav-link active" id="art-content-tab" data-bs-toggle="tab" data-bs-target="#art-content" type="button" role="tab" aria-controls="art-content" aria-selected="true">Контент</button>
						<button class="nav-link" id="art-images-tab" data-bs-toggle="tab" data-bs-target="#art-images" type="button" role="tab" aria-controls="art-images" aria-selected="true">Изображения</button>
						<button class="nav-link" id="art-options-tab" data-bs-toggle="tab" data-bs-target="#art-options" type="button" role="tab" aria-controls="art-options" aria-selected="true">Опции</button>
						<button class="nav-link" id="art-advanced-tab" data-bs-toggle="tab" data-bs-target="#art-advanced" type="button" role="tab" aria-controls="art-advanced" aria-selected="false">Расширенные</button>
					</div>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="art-content" role="tabpanel" aria-labelledby="art-content-tab">
							<div class="form-group">
								<label for="title" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-heading"></i>
									Заголовок материала (H1):
								</label>
								<input name="title" type="text" id="title" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите заголовок" value="<?= $item->title ?? '' ?>">
							</div>
							<div class="form-group">
								<label for="text_intro" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-paragraph"></i>
									Вступление:
								</label>
								<div class="col-xs-12 col-sm-12 wrap-editor">
									<textarea name="text_intro" type="text" id="text_intro" class="form-control editor" placeholder="Вводный текст"><?= $item->text_intro ?? '' ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="col-xs-4 col-sm-4 font-weight-bold hidden">
									<i class="fas fa-file-alt"></i>
									Текст:
								</label>
								<div class="col-xs-12 col-sm-12 wrap-editor">
									<div id="text"><?= $item->text_full ?? '' ?></div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="art-images" role="tabpanel" aria-labelledby="art-images-tab">
							<div class="form-group row">
								<div class="col-12 col-sm-6 field-group">
									<label for="image_intro" class="w-100">
										<i class="fas fa-image"></i>
										Изображение (вступление):
									</label>
									<input name="image_intro" type="file" id="image_intro" class="form-control" value="<?= $item->images->image_intro ?? '' ?>">
								</div>
								<div class="col-12 col-sm-6 field-group">
									<label for="alt_intro" class="w-100">
										<i class="fas fa-pen"></i>
										Атрибут alt (вступление):
									</label>
									<input name="alt_intro" type="text" id="alt_intro" class="form-control" placeholder="Описание картинки" value="<?= $item->images->alt_intro ?? '' ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12 col-sm-6 field-group">
									<label for="image_full" class="w-100">
										<i class="fas fa-image"></i>
										Изображение (материал):
									</label>
									<input name="image_full" type="file" id="image_full" class="form-control" value="<?= $item->images->image_full ?? '' ?>">
								</div>
								<div class="col-12 col-sm-6 field-group">
									<label for="alt_full" class="col-xs-4 col-sm-4 font-weight-bold">
										<i class="fas fa-pen"></i>
										Атрибут alt (материал):
									</label>
									<input name="alt_full" type="text" id="alt_full" class="form-control" placeholder="Описание картинки" value="<?= $item->images->alt_full ?? '' ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="font-weight-bold">
									<i class="fas fa-images"></i>
									Галерея:
								</div>
								<div id="drop-area" class="dropzone"></div>
							</div>
						</div>
						<div class="tab-pane fade" id="art-options" role="tabpanel" aria-labelledby="art-options-tab">
							<div class="form-group">
								<label for="catid" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-folder"></i>
									Категория:
								</label>
								<select class="form-control" name="category_id" id="category_id">
									<option value="0" selected="selected">Нет</option>
									<?php foreach ($categories as $category) : ?>
										<option value="<?= $category->id ?>"
											<?php if ($category->id == $item->c_id) : ?>
												selected="selected"
											<?php endif ?>
										><?= $category->name ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="tags" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-tag"></i>
									Метки:
								</label>
								<select name="tags[]" id="tags" class="col-xs-8 col-sm-8 form-control" autocomplete="off" multiple="multiple">
									<?php for ($i = 0; $i < count($tags); $i++) : ?>
										<?php if (isset($item->tags)) : ?>
											<option
												<?php if (in_array($tags[$i]->name, $item->tags->name)) : ?>
													selected="selected"
												<?php endif ?>
											value="<?= $tags[$i]->name ?>"><?= $tags[$i]->name ?></option>
										<?php else: ?>
											<option
												<?php if ($tags[$i]->name == $item->t_name) : ?>
													selected="selected"
												<?php endif ?>
											value="<?= $tags[$i]->name ?>"><?= $tags[$i]->name ?></option>
										<?php endif ?>
									<?php endfor ?>
								</select>
							</div>
							<div class="form-group">
								<div class="font-weight-bold">
									<i class="fas fa-star-half-alt"></i> Рейтинг:
								</div>
								<div class="radio">
									<div class="rating" data-rating="<?= $item->rating; ?>">
										<?php for ($i = 5; $i > 0; $i--): ?>
											<input type="radio" name="rating" id="r<?= $i; ?>" value="<?= $i; ?>" <?= $item->rating == $i ? ' checked' : '' ?>>
											<label for="r<?= $i; ?>" title="Оценка: <?= $i; ?>"></label>
										<?php endfor; ?>
									</div>
									<input type="text" id="current_rating" class="form-control current ml-100" title="Средняя оценка" placeholder="0.0" value="<?= $item->rating ?? '' ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="font-weight-bold" for="rating_count">
									<i class="fas fa-poll"></i> Голосование:
								</label>
								<div class="radio">
									<input data-tlabel="Разрешить"
									       type="radio"
									       class="form-control"
									       name="rating_count"
									       value="<?= $item->rating_count ?? 0 ?>"
										<?= !is_null($item->rating_count) ? ' checked' : '' ?>>
									<input data-tlabel="Запретить"
									       type="radio"
									       class="form-control"
									       name="rating_count"
									       value="-1"
										<?= is_null($item->rating_count) ? ' checked' : '' ?>>
									<input type="text" id="current_rating_count" class="form-control current" title="Всего голосов" placeholder="0" value="<?= $item->rating_count ?? '' ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="font-weight-bold">
									<i class="fas fa-comment"></i>
									Комментарии:
								</div>
								<div class="radio">
									<input data-tlabel="Включить"
									       type="radio"
									       class="form-control"
									       name="comments_on"
									       value="1"
										<?= $item->comments_on == 1 ? ' checked' : '' ?>>
									<input data-tlabel="Выключить"
									       type="radio"
									       class="form-control"
									       name="comments_on"
									       value="0"
										<?= $item->comments_on == 0 ? ' checked' : '' ?>>
								</div>
							</div>
							<div class="form-group">
								<div class="font-weight-bold">
									<i class="fas fa-star"></i>
									Избранный материал:
								</div>
								<div class="radio">
									<input data-tlabel="Да"
									       type="radio"
									       class="form-control"
									       name="featured"
									       value="1"<?= $item->featured == 1 ? ' checked' : '' ?>>
									<input data-tlabel="Нет"
									       type="radio"
									       class="form-control"
									       name="featured"
									       value="0"<?= $item->featured == 0 ? ' checked' : '' ?>>
								</div>
							</div>
							<div class="form-group">
								<div class="font-weight-bold">
									<i class="fas fa-check-square"></i>
									Статус:
								</div>
								<div class="radio">
									<?php foreach ($statuses as $status) : ?>
									<input data-tlabel="<?= $status->name ?>"
									       type="radio"
									       class="form-control"
									       name="status"
									       value="<?= $status->id ?>"<?= $item->status == $status->id ? ' checked' : '' ?>>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="art-advanced" role="tabpanel" aria-labelledby="art-advanced-tab">
							<div class="form-group">
								<label for="meta_title" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-window-maximize"></i>
									Заголовок в браузере (title):
								</label>
								<input name="meta_title" type="text" id="meta_title" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите заголовок страницы" value="<?= $item->meta_title ?? '' ?>">
							</div>
							<div class="form-group">
								<label for="meta_desc" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-pen-square"></i>
									Описание (SEO):
								</label>
								<textarea name="meta_desc" type="text" id="meta_desc" class="col-xs-8 col-sm-8 form-control" placeholder="Описание (в поисковой выдаче)"><?= $item->meta_desc ?? '' ?></textarea>
							</div>
							<div class="form-group">
								<label for="url" class="col-xs-4 col-sm-4 font-weight-bold">
									<i class="fas fa-globe"></i>
									Адрес страницы (url):
								</label>
								<input name="url" type="text" id="url" class="col-xs-8 col-sm-8 form-control" placeholder="Генерируется автоматически из названия материала" value="<?= $item->url ?>">
								<?php if (isset($url_error)) : ?>
									<span class="alert alert-danger col-sm-offset-4 col-sm-8" role="alert">Ошибка! URL адрес: <strong><?= $url_error ?></strong> - уже существует.
                </span>
								<?php endif ?>
							</div>
						</div>
					</div>
					
					<button class="btn btn-success" name="action" value="view">Сохранить</button>
					<textarea name="text_full" class="d-none"><?= $item->text_full ?? '' ?></textarea>
					<input type="hidden" name="user_id" value="<?= $item->user_id ?>">
					<input type="hidden" name="page" value="<?= $item->page ?>">
					<input type="hidden" name="home" value="<?= $item->home ?>">
					<input type="hidden" name="hits" value="<?= $item->hits ?>">
					<input type="hidden" name="likes" value="<?= $item->likes ?>">
					<input type="hidden" name="image_intro_old" value="<?= $item->images->image_intro ?>">
					<input type="hidden" name="image_full_old" value="<?= $item->images->image_full ?>">
					<input type="hidden" name="gallery">
<!--					<input type="hidden" name="gallery" value="--><?//= isset($item->images->gallery) ? implode(',', $item->images->gallery) : '' ?><!--">-->
					<input type="hidden" name="tags_old" value="<?= isset($item->tags) ? implode(',', $item->tags->name) : $item->t_name ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</main>