<main class="content">
	<div class="container-fluid p-0">
		
		<div class="d-sm-flex align-items-center justify-content-between">
		    <h1 class="h3 mb-2 text-gray-800">Статусы пользователей</h1>
		    <a href="/admin/user-status/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
		</div>
		
		<p class="mb-4">Список статусов пользователя. Вы можете использовать эти статусы чтобы видеть состояние аккаунта пользователя.</p>
		
		<div class="card shadow mb-4">
		    <div class="card-header py-3">
		        <h6 class="m-0 font-weight-bold text-primary">Все статусы</h6>
		    </div>
		    <div class="card-body">
	            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>Название</th>
	                    <th class="text-center">Действие</th>
	                </tr>
	                </thead>
	                <tfoot>
	                <tr>
	                    <th>ID</th>
	                    <th>Название</th>
	                    <th class="text-center">Действие</th>
	                </tr>
	                </tfoot>
	                <tbody>
	                <?php foreach ($list as $item) : ?>
	                    <tr>
	                        <td data-label="ID" class="w-7"><?= $item->id ?></td>
	                        <td data-label="Название"><?= $item->name ?></td>
	                        <td data-label="Действие" class="w-18 text-center">
	                            <a class="tooltip actions" href="/admin/user-status/<?= $item->id ?>" data-title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
	                            <a class="tooltip actions" href="/admin/user-status/edit/<?= $item->id ?>" data-title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
	                            <a class="tooltip actions" href="/admin/user-status/delete/<?= $item->id ?>" data-title="Удалить"><i class="fas fa-trash color-delete"></i></a>
	                        </td>
	                    </tr>
	                <?php endforeach ?>
	                </tbody>
	            </table>
		    </div>
		</div>
	</div>
</main>