<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-4 text-gray-800">Тип пукнта меню</h1>
			<a href="/admin/menu-type/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="mb-3 font-weight-font-weight-bold text-primary"><i class="fas fa-eye"></i> Просмотр типа</h6>
				<h4 class="title my-1">
					<i class="fas fa-heading"></i>
					<?= $item->name ?>
				</h4>
			</div>
			<div class="card-body">
				<p>
					<a class="btn btn-dark" href="/admin/menu-type">Назад</a>
					<a class="btn btn-success" href="/admin/menu-type/edit/<?= $item->id ?>">Изменить</a>
					<a class="btn btn-danger" href="/admin/menu-type/delete/<?= $item->id ?>">Удалить</a>
				</p>
			</div>
		</div>
	</div>
</main>
