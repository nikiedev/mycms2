<main class="content">
	<div class="container-fluid p-0">

		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-2 text-gray-800">Публикации</h1>
			<a href="/admin/article/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<p class="mb-4">Список материалов, предназначенных для публикации на блоге в виде статтей/записей.</p>

		<div class="row">
			<div class="col-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Все материалы</h6>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
							<tr>
								<th>ID</th>
								<th>Иконка</th>
								<th>Заголовок</th>
								<th>Избранный</th>
								<th class="text-center">Действие</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th>ID</th>
								<th>Иконка</th>
								<th>Заголовок</th>
								<th>Избранный</th>
								<th class="text-center">Действие</th>
							</tr>
							</tfoot>
							<tbody>
							<?php foreach ($list as $item) : ?>
								<tr class="<?= $item->status == 2 ? 'grayscale text-secondary' : '' ?>" data-c_name_tooltip="<?= 'Категория' ?>" data-c_name="<?= $item->c_name ?? 'Нет' ?>"
								    data-u_name_tooltip="<?= 'Автор' ?>"
								    data-u_name="<?= $item->login ?>"
								    data-created_at_tooltip="<?= 'Опубликовано' ?>"
								    data-created_at="<?= date_format(date_create($item->created_at), 'd.m.y в H:i:s') ?>"
								    data-hits_tooltip="<?= 'Промотров' ?>"
								    data-hits="<?= $item->hits ?>"
								    data-likes_tooltip="<?= 'Понравилось' ?>"
								    data-likes="<?= $item->likes ?>"
								    data-status_tooltip="<?= 'Статус' ?>"
								    data-status="<?= $item->s_name ?>"
								>
								<td data-label="ID" class="w-7"><?= $item->id ?></td>
								<td data-label="Иконка" class="w-10">
									<img class="img-fluid" src="/media/images/<?= ($item->images->image_intro ? $fullPaths[(int)$item->category_id] . '/' . $item->images->image_intro : 'noimage.png') ?>" alt="<?= $item->images->alt_intro ?? 'no image' ?>">
								</td>
								<td data-label="Заголовок"><span class="d-block bottom-line"><?= $item->title ?></span><span class="d-block color-blue"><?= $item->url ?></span></td>
								<td data-label="Избранный" class="w-14 text-center"><i class="fas fa-star <?= $item->featured ? 'color-gold' : 'color-gray' ?>"></i></td>
								<td data-label="Действие" class="w-18 text-center">
									<a class="tooltip actions" href="/admin/article/view/<?= $item->id ?>" data-title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
									<a class="tooltip actions" href="/admin/article/edit/<?= $item->id ?>" data-title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
									<a class="tooltip actions" href="/admin/article/delete/<?= $item->id ?>" data-title="Удалить" data-delete="<?= $item->id ?>" data-partial="article"><i class="fas fa-trash color-delete"></i></a>
									<span class="tooltip actions position-relative detail" data-title="Подробности">
			                            <span class="dt-arrow">
			                                <span class="ari-1"></span>
			                                <span class="ari-2"></span>
			                            </span>
			                        </span>
								</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


