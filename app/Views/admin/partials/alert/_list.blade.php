<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-2 text-gray-800">Категории</h1>
    <a href="/admin/{{ $page }}/add" class="d-none d-sm-inline-block btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
</div>

<p class="mb-4">Список категорий, где располагаются материалы.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Все категории</h6>
    </div>
    <div class="card-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#cat_list">Список</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#cat_structure">Структура</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active container pt-3 pb-3 border-lrb" id="cat_list">
                <div class="table-responsive">
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
                        @foreach ($categories as $category)
                            <tr>
                                <td data-label="ID" class="w-5">{{ $category->id }}</td>
                                <td data-label="Заголовок">{{ $category->name }}</td>
                                <td data-label="Действие" class="w-18 text-center">
                                    <a class="actions" href="/admin/{{ $page }}/{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Посмотреть"><i class="fas fa-eye color-view"></i></a>
                                    <a class="actions" href="/admin/{{ $page }}/edit/{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Изменить"><i class="fas fa-pencil-alt color-edit"></i></a>
                                    <a class="actions" href="/admin/{{ $page }}/delete/{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="fas fa-trash color-delete"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane container pt-3 pb-3 border-lrb" id="cat_structure">
                <ul class="tree">
                    @each('admin.partials.structure', $categoryStructure, 'item')
                </ul>
            </div>
        </div>
    </div>
</div>