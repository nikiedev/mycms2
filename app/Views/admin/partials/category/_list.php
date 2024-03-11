<main class="content">
	<div class="container-fluid p-0">
		<div class="d-sm-flex align-items-center justify-content-between">
		    <h1 class="h3 mb-2 text-gray-800">Категории</h1>
		    <a href="/admin/category/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<p class="mb-4">Список категорий, где располагаются материалы.</p>
		
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="m-0 font-weight-bold text-primary">Все категории</h6>
		    </div>
		    <div class="card-body">
			    <!-- Nav tabs -->
			    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
				    <button class="nav-link active" id="cat-list-tab" data-bs-toggle="tab" data-bs-target="#cat-list" type="button" role="tab" aria-controls="cat-list" aria-selected="true">Список</button>
				    <button class="nav-link" id="cat-structure-tab" data-bs-toggle="tab" data-bs-target="#cat-structure" type="button" role="tab" aria-controls="cat-structure" aria-selected="false">Структура</button>
			    </div>
			    <!-- Tab content -->
			    <div class="tab-content" id="nav-tabContent">
				    <div class="tab-pane fade show active" id="cat-list" role="tabpanel" aria-labelledby="cat-list-tab">
					    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						    <thead>
						    <tr>
							    <th>ID</th>
							    <th>Иконка</th>
							    <th>Название</th>
							    <th class="text-center">Действие</th>
						    </tr>
						    </thead>
						    <tfoot>
						    <tr>
							    <th>ID</th>
							    <th>Иконка</th>
							    <th>Название</th>
							    <th class="text-center">Действие</th>
						    </tr>
						    </tfoot>
						    <tbody>
						    <?php foreach ($list as $item) : ?>
							    <tr>
								    <td data-label="ID" class="w-7"><?= $item->id ?></td>
								    <td data-label="img" class="w-10"><img class="img-fluid" src="/media/images/<?= ($item->img ? $fullPaths[(int)$item->id] . '/' . $item->img : 'noimage.png') ?>" alt="<?= $item->name ?? 'no image' ?>"></td>
								    <td data-label="Заголовок"><span class="d-block bottom-line"><?= $item->name ?></span><span class="d-block color-blue"><?= $item->url ?></span></td>
								    <td data-label="Действие" class="w-18 text-center">
									    <a class="tooltip actions" href="/admin/category/view/<?= $item->id ?>" data-title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
									    <a class="tooltip actions" href="/admin/category/edit/<?= $item->id ?>" data-title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
									    <a class="tooltip actions" href="/admin/category/delete/<?= $item->id ?>" data-title="Удалить" data-delete="<?= $item->id ?>" data-partial="category"><i class="fas fa-trash color-delete"></i></a>
								    </td>
							    </tr>
						    <?php endforeach ?>
						    </tbody>
					    </table>
				    </div>
				    <div class="tab-pane fade" id="cat-structure" role="tabpanel" aria-labelledby="cat-structure-tab">
					    <div class="tree">
						    <ol>
							    <?php foreach ($structure as $item) : ?>
								    <li><?= view('admin/partials/structure', ['item' => $item]) ?></li>
							    <?php endforeach ?>
						    </ol>
					    </div>
				    </div>
			    </div>
		    </div>
		</div>
	</div>
</main>