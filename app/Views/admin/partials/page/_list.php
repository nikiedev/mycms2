<main class="content">
	<div class="container-fluid p-0">
		
		<div class="d-sm-flex align-items-center justify-content-between">
			<h1 class="h3 mb-2 text-gray-800">Страницы</h1>
			<a href="/admin/page/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		<p class="mb-4">Список материалов, предназначенных для отображения на сайте в виде статических страниц, таких как: <i>Главная</i>, <i>О компании</i>, <i>Контакты</i> и т.д.</p>
		
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
		                <th>Главная</th>
		                <th class="pl-30">Действие</th>
		            </tr>
		            </thead>
		            <tfoot>
		            <tr>
		                <th>ID</th>
		                <th>Иконка</th>
		                <th>Заголовок</th>
		                <th>Главная</th>
		                <th>Действие</th>
		            </tr>
		            </tfoot>
		            <tbody>
		            <?php foreach ($list as $item) : ?>
		                <tr>
		                    <td class="w-7"><?= $item->id ?></td>
		                    <td class="w-10"><img class="img-fluid" src="/media/images/<?= ($item->images->image_intro ? $fullPaths[(int)$item->category_id] . '/' . $item->images->image_intro : 'noimage.png') ?>" alt="<?= $item->images->alt_intro ?? 'no image' ?>"></td>
		                    <td><span class="d-block bottom-line"><?= $item->title ?></span><span class="d-block color-blue"><?= $item->url ?></span></td>
		                    <td class="w-14 text-center"><i class="fas fa-check <?= $item->home ? 'color-green' : 'color-gray' ?>"></i></td>
		                    <td class="w-18 text-center">
		                        <a class="tooltip actions" href="/admin/page/view/<?= $item->id ?>" data-title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
		                        <a class="tooltip actions" href="/admin/page/edit/<?= $item->id ?>" data-title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
		                        <a class="tooltip actions" href="/admin/page/delete/<?= $item->id ?>" data-title="Удалить" data-delete="<?= $item->id ?>" data-partial="page"><i class="fas fa-trash color-delete"></i></a>
		                    </td>
		                </tr>
		            <?php endforeach ?>
		            </tbody>
		        </table>
		    </div>
		</div>
	</div>
</main>