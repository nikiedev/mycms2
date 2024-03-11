<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Группы</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-font-weight-font-weight-bold text-primary"><i class="fas fa-pencil-alt"></i> Изменение группы</h6>
    </div>
    <div class="card-header bg-white-fb">
        <h4 class="title my-1">
            <i class="fas fa-heading"></i>
            {{ $data->name }}
        </h4>
    </div>
    <div class="card-body">
        <p>
            <a class="btn btn-danger" href="/admin/{{ $page }}/{{ $data->id }}">Отмена</a>
        </p>
        <div class="content">
            <div class="item py-3">
                <form action="/admin/{{ $page }}/edit/{{ $data->id }}" method="post" enctype="multipart/form-data">
                    <button name="save_and_back" value="save_and_back" class="btn btn-twitter save-and-back">Сохранить и вернуться</button>
                    <button name="save_and_stay" value="save_and_stay" class="btn btn-facebook save-and-stay">Сохранить и остаться</button>
                    <div class="form-group row mx-0 pr-075">
                        <label for="name" class="col-xs-4 col-sm-4 font-weight-bold">
                            <i class="fas fa-heading"></i>
                            Название группы:
                        </label>
                        <input name="name" type="text" id="name" class="col-xs-8 col-sm-8 form-control" placeholder="Укажите название" value="{{ $data->name }}">
                    </div>
                    <button class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</div>
