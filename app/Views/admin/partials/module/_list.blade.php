<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <h1 class="h3 mb-2 text-gray-800">Модули</h1>
    <a href="/admin/{{ $page }}/add" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить</a>
</div>

<p class="mb-4">Список модулей, расширяющих стандартный функционал.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Все модули</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th class="w-25">Ключ</th>
                    <th>Название</th>
                    <th class="text-center">Действие</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th class="w-25">Ключ</th>
                    <th>Название</th>
                    <th class="text-center">Действие</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($data['list'] as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td class="w-18 text-center">
                            <a class="actions" href="/admin/{{ $page }}/{{ $item->name }}" data-toggle="tooltip" data-placement="top" title="Параметры"><i class="fas fa-cog color-view"{{ $item->status ? '' : ' disabled'}}></i></a>
                            @if(!isset($data['modules'][$item->name]->status))
                                <a class="actions" href="/admin/{{ $page }}/{{ $item->name }}/uninstall" data-toggle="tooltip" data-placement="top" title="Установить"><i class="fas fa-box-open color-edit"></i></a>
                            @else
                                @if ($data['modules'][$item->name]->status == 1)
                                    <a class="actions" href="/admin/{{ $page }}/{{ $item->name }}/uninstall" data-toggle="tooltip" data-placement="top" title="Деактивировать"><i class="fas fa-toggle-on color-gold"></i></a>
                                @else
                                    <a class="actions" href="/admin/{{ $page }}/{{ $item->name }}/install" data-toggle="tooltip" data-placement="top" title="Активировать"><i class="fas fa-toggle-off color-gray"></i></a>
                                @endif
                                <a class="actions" href="/admin/{{ $page }}/{{ $item->name }}/install" data-toggle="tooltip" data-placement="top" title="Удалить"><i class="fas fa-trash color-delete"></i></a>
                            @endisset
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>