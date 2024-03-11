<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-2 text-gray-800">Типы меню</h1>
			<a href="/admin/message/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>

		<p class="mb-4">Список типов меню.</p>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Все типы</h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>ID</th>
						<th>Цепочка</th>
						<th>Сообщение</th>
						<th>Автор</th>
						<th>Дата</th>
						<th class="text-center">Действие</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th>ID</th>
						<th>Цепочка</th>
						<th>Сообщение</th>
						<th>Автор</th>
						<th>Дата</th>
						<th class="text-center">Действие</th>
					</tr>
					</tfoot>
					<tbody>
					<?php foreach ($list as $item) : ?>
						<tr>
							<td class="w-7"><?= $item->id ?></td>
							<td><?= $item->chain_title ?></td>
							<td><?= $item->message ?></td>
							<td><?= $item->login ?></td>
							<td><?= date_format(date_create($item->created_at), 'd.m.y в H:i:s') ?></td>
							<td class="w-18 text-center">
								<a class="tooltip actions" href="/admin/message/<?= $item->id ?>" data-title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
								<a class="tooltip actions" href="/admin/message/edit/<?= $item->id ?>" data-title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
								<a class="tooltip actions" href="/admin/message/delete/<?= $item->id ?>" data-title="Удалить"><i class="fas fa-trash color-delete"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>