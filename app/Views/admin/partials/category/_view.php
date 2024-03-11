<main class="content">
	<div class="container-fluid p-0">

		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-2 text-gray-800">Категории</h1>
			<a href="/admin/category/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<p class="mb-4">Список категорий, где располагаются материалы.</p>

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-font-weight-bold text-primary"><i class="fas fa-eye"></i> Просмотр категории</h6>
			</div>
			<div class="card-header bg-white-fb">
				<h4 class="title my-1">
					<i class="fas fa-heading"></i>
					<?= $item->name ?>
				</h4>
			</div>
			<div class="card-body">
				<p>
					<a class="btn btn-dark" href="/admin/category">Назад</a>
					<a class="btn btn-warning" href="/admin/category/edit/<?= $item->id ?>">Изменить</a>
					<a class="btn btn-danger" href="/admin/category/delete/<?= $item->id ?>">Удалить</a>
				</p>
				<div class="item view">
					<div class="row">
						<div class="col-xs-4 col-sm-4">
							<p class="font-weight-bold">
								<i class="fas fa-globe"></i>
								Ардес категории (url):
							</p>
						</div>
						<div class="col-xs-8 col-sm-8">
							<p><?= $item->url ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>