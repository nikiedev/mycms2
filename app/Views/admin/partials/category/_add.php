<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-4 text-gray-800">Категории</h1>
			<a href="/admin/article/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="m-0 font-weight-font-weight-font-weight-bold text-primary"><i class="fas fa-pencil-alt"></i> Новая категория</h6>
		    </div>
		    <div class="card-body">
		        <div class="item add">
	                <form action="/admin/category/add" method="post" enctype="multipart/form-data">
		                <p>
			                <a class="btn btn-dark" href="/admin/category">Отмена</a>
			                <button name="action" value="list" class="btn btn-twitter save-and-back">Сохранить и вернуться</button>
			                <button name="action" value="edit" class="btn btn-facebook save-and-stay">Сохранить и остаться</button>
		                </p>
	                    <div class="form-group">
	                        <label for="name" class="col-xs-4 col-sm-4 font-weight-bold">
	                            <i class="fas fa-heading"></i>
	                            Название категории:
	                        </label>
	                        <input name="name" type="text" id="name" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите название" required="required">
	                    </div>
	                    <div class="form-group">
	                        <label for="url" class="col-xs-4 col-sm-4 font-weight-bold">
	                            <i class="fas fa-globe"></i>
	                            Адрес категории (url):
	                        </label>
	                        <input name="url" type="text" id="url" class="col-xs-8 col-sm-8 form-control" placeholder="Генерируется автоматически из названия категории">
		                    <?php if (isset($url_error)) : ?>
			                    <span class="alert alert-danger col-sm-offset-4 col-sm-8" role="alert">Ошибка! URL адрес: <strong><?= $url_error ?></strong> - уже существует.
            </span>
		                    <?php endif ?>
	                    </div>
	                    <div class="form-group">
	                        <label for="parent_id" class="col-xs-4 col-sm-4 font-weight-bold">
	                            <i class="fas fa-folder"></i>
	                            Родительская категория:
	                        </label>
	                        <select name="parent_id" id="parent_id" class="col-xs-8 col-sm-8 form-control">
	                            <option value="0">Нет</option>
	                            <?php foreach ($categories as $category) : ?>
	                                <option value="<?= $category->id ?>">
	                                    <?= $category->name ?>
	                                </option>
	                            <?php endforeach ?>
	                        </select>
	                    </div>
		                <div class="form-group">
			                <label for="img" class="col-xs-4 col-sm-4 font-weight-bold">
				                <i class="fas fa-image"></i>
				                Изображение:
			                </label>
			                <input name="img" type="file" id="img" class="form-control">
		                </div>
	                    <button class="btn btn-success" name="action" value="view">Сохранить</button>
	                </form>
	            </div>
		    </div>
		</div>
	</div>
</main>