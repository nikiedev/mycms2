<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-4 text-gray-800">Статусы материалов</h1>
			<a href="/admin/article-status/add" class="d-none d-sm-inline-block btn btn-success shadow-sm mb-4"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="m-0 font-weight-font-weight-font-weight-bold text-primary"><i class="fas fa-pencil-alt"></i> Новый статус</h6>
		    </div>
		    <div class="card-body">
		        <div class="item add">
	                <form action="/admin/article-status/add" method="post" enctype="multipart/form-data">
		                <p>
			                <a class="btn btn-dark" href="/admin/article-status">Отмена</a>
			                <button name="action" value="list" class="btn btn-twitter save-and-back">Сохранить и вернуться</button>
			                <button name="action" value="edit" class="btn btn-facebook save-and-stay">Сохранить и остаться</button>
		                </p>
	                    <div class="form-group row mx-0 pr-075">
	                        <label for="name" class="col-xs-4 col-sm-4 font-weight-bold">
	                            <i class="fas fa-heading"></i>
	                            Название статуса:
	                        </label>
	                        <input name="name" type="text" id="name" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите название" required="required">
	                    </div>
	                    <button class="btn btn-success" name="action" value="view">Сохранить</button>
	                </form>
		        </div>
		    </div>
		</div>
	</div>
</main>