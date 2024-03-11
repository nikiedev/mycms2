<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
		    <h1 class="h3 mb-4 text-gray-800">Публикации</h1>
		    <a href="/admin/article/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="mb-3 font-weight-font-weight-bold text-primary"><i class="fas fa-eye"></i> Просмотр материала</h6>
			    <h4 class="title my-1">
				    <i class="fas fa-heading"></i>
				    <?= $item->title ?>
			    </h4>
		    </div>
		    <div class="card-body">
		        <p>
		            <a class="btn btn-dark" href="/admin/article">Назад</a>
		            <a class="btn btn-warning" href="/admin/article/edit/<?= $item->id ?>">Изменить</a>
		            <a class="btn btn-danger" href="/admin/article/delete/<?= $item->id ?>">Удалить</a>
		        </p>
		        <div class="item view">
		            <div class="row">
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-window-maximize"></i>
		                        Заголовок (в браузере):
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->meta_title ?? 'Нет' ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-globe"></i>
		                        Ардес страницы (url):
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->url ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-paragraph"></i>
		                        Вступление:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
			                <div class="field"><?= $item->text_intro ?? 'Нет' ?></div>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-file-alt"></i>
		                        Текст:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <div class="field"><?= $item->text_full ?? 'Нет' ?></div>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-image"></i>
		                        Картинка (миниатюра):
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p>
		                        <img class="img-fluid preview" src="/media/images/<?= ($item->images->image_intro ? $fullPaths[(int)$item->category_id] . '/_intro/' . $item->images->image_intro : 'noimage.png') ?>" alt="<?= $item->images->alt_intro ?? 'Нет' ?>">
		                    </p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p title="Атрибут alt" class="font-weight-bold">
		                        <i class="fas fa-pen"></i>
		                        Описание картинки:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->images->alt_intro ?? 'Нет' ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-image"></i>
		                        Картинка (полный размер):
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p>
		                        <img class="img-fluid preview" src="/media/images/<?= ($item->images->image_full ? $fullPaths[(int)$item->category_id] . '/_full/' . $item->images->image_full : 'noimage.png') ?>" alt="<?= $item->images->alt_full ?? 'Нет' ?>">
		                    </p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p title="Атрибут alt" class="font-weight-bold">
		                        <i class="fas fa-pen"></i>
		                        Описание картинки:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->images->alt_full ?? 'Нет' ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-folder"></i>
		                        Категория:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->c_name ?? 'Нет' ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-tag"></i>
		                        Метки:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p class="tags">
		                        <?php if(isset($item->t_name)) : ?>
		                            <?= '<span class="badge badge-pill badge-primary">'.$item->t_name.'</span>' ?>
			                    <?php elseif (isset($item->tags)) : ?>
		                            <?= '<span class="badge badge-pill badge-primary">'.implode('</span> <span class="badge badge-pill badge-primary">', $item->tags->name).'</span>' ?>
			                    <?php else: ?>
		                            <?= 'Нет' ?>
			                    <?php endif ?>
		                    </p>
		                </div>
			            <div class="col-xs-4 col-sm-4">
				            <p class="font-weight-bold">
					            <i class="fas fa-star-half-alt"></i>
					            Рейтинг:
				            </p>
			            </div>
			            <div class="col-xs-8 col-sm-8">
				            <p><?= $item->rating  ?? 'Нет' ?></p>
			            </div>
			            <div class="col-xs-4 col-sm-4">
				            <p class="font-weight-bold">
					            <i class="fas fa-poll"></i>
					            Голосование:
				            </p>
			            </div>
			            <div class="col-xs-8 col-sm-8">
				            <p>
					            <?= !is_null($item->rating_count)
						            ? '<span class="badge badge-pill badge-green">Включено</span>'
						            : '<span class="badge badge-pill badge-red">Выключено</span>'
					            ?>
				            </p>
			            </div>
			            <div class="col-xs-4 col-sm-4">
				            <p class="font-weight-bold">
					            <i class="fas fa-comment"></i>
					            Комментарии:
				            </p>
			            </div>
			            <div class="col-xs-8 col-sm-8">
				            <p>
					            <?= $item->comments_on
						            ? '<span class="badge badge-pill badge-green">Разрешены</span>'
						            : '<span class="badge badge-pill badge-red">Запрещены</span>'
					            ?>
				            </p>
			            </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-star"></i>
		                        Избранный материал:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p>
			                    <?= $item->featured
				                    ? '<span class="badge badge-pill badge-green">Да</span>'
				                    : '<span class="badge badge-pill badge-red">Нет</span>'
			                    ?>
		                    </p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-eye"></i>
		                        Просмотров:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->hits ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-heart"></i>
		                        Понравилось:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->likes ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-calendar-plus"></i>
		                        Дата публикации:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= date_format(date_create($item->created_at), 'd.m.y в H:i:s') ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-calendar-check"></i>
		                        Дата изменения:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->updated_at ? date_format(date_create($item->updated_at), "d.m.y в H:i:s") : 'Еще не редактировалось' ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-check-square"></i>
		                        Статус:
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->s_name ?></p>
		                </div>
		                <div class="col-xs-4 col-sm-4">
		                    <p class="font-weight-bold">
		                        <i class="fas fa-pen-square"></i>
		                        Описание (SEO):
		                    </p>
		                </div>
		                <div class="col-xs-8 col-sm-8">
		                    <p><?= $item->meta_desc ?? 'Нет' ?></p>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</main>