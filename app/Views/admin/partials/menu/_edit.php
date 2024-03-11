<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-4 text-gray-800">Меню</h1>
			<a href="/admin/menu/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-font-weight-font-weight-bold text-primary"><i class="fas fa-pencil-alt"></i> Изменение пункта меню</h6>
			</div>
			<div class="card-header bg-white-fb">
				<h4 class="title my-1">
					<i class="fas fa-heading"></i>
					<?= $item->name ?>
				</h4>
			</div>
			<div class="card-body">
				<div class="item edit">
					<form action="/admin/menu/edit/<?= $item->id ?>" method="post" enctype="multipart/form-data">
						<p>
							<a class="btn btn-dark" href="/admin/menu">Отмена</a>
							<button name="action" value="list" class="btn btn-twitter save-and-back">Сохранить и вернуться</button>
							<button name="action" value="edit" class="btn btn-facebook save-and-stay">Сохранить и остаться</button>
						</p>
						<div class="form-group row mx-0 pr-075">
							<label for="name" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-heading"></i>
								Название пункта меню:
							</label>
							<input name="name" type="text" id="name" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите название" value="<?= $item->name ?>">
						</div>
						<div class="form-group row mx-0 pr-075">
							<label for="url" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-globe"></i>
								Адрес пункта меню (url):
							</label>
							<input name="url" type="text" id="url" class="col-xs-8 col-sm-8 form-control" placeholder="Генерируется автоматически из названия пункта меню" value="<?= $item->url ?>">
							<?php if (isset($url_error)) : ?>
								<span class="alert alert-danger col-sm-offset-4 col-sm-8" role="alert">Ошибка! URL адрес: <strong><?= $url_error ?></strong> - уже существует.
        </span>
							<?php endif ?>
						</div>
						<div class="form-group">
							<label for="parent_id" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-folder"></i>
								Родительский пункт меню:
							</label>
							<select name="parent_id" id="parent_id" class="col-xs-8 col-sm-8 form-control">
								<option value="0">Нет</option>
								<?php foreach ($menuItems as $mItem) : ?>
									<option value="<?= $mItem->id ?>">
										<?= $mItem->name ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="icon" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-image"></i>
								Иконка:
							</label>
							<input name="icon" type="file" id="icon" class="form-control">
						</div>
						<div class="form-group">
							<label for="type_id" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-folder"></i>
								Тип пункта меню:
							</label>
							<select name="type_id" id="type_id" class="col-xs-8 col-sm-8 form-control">
								<option value="0">Нет</option>
								<?php foreach ($menuTypes as $mType) : ?>
									<option value="<?= $mType->id ?>"
										<?php if ($item->type_id == $mType->id) : ?>
											selected="selected"
										<?php endif ?>
									><?= $mType->title ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="side_id" class="col-xs-4 col-sm-4 font-weight-bold">
								<i class="fas fa-folder"></i>
								Сторона отображения:
							</label>
							<select name="side_id" id="side_id" class="col-xs-8 col-sm-8 form-control">
								<option value="0">Нет</option>
								<?php foreach ($menuSides as $mSide) : ?>
									<option value="<?= $mSide->id ?>"
										<?php if ($item->side_id == $mSide->id) : ?>
											selected="selected"
										<?php endif ?>
									><?= $mSide->name ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<button class="btn btn-success" name="action" value="view">Сохранить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>