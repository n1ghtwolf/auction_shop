@csrf
<div class="modal-header">
    <h4 class="modal-title" id="formModalLabel">Просмотреть лот</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideModal()">×</button>
</div>
<div class="modal-body">
    <div class="form-group row align-items-center">
        <label class="col-sm-3 text-left text-sm-right mb-0">Категория</label>
        <div class="col-sm-9">
            <select class="form-control" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 text-left text-sm-right mb-0">Действие</label>
        <div class="col-sm-9">
            <input class="form-control" id="newCategoryInput" type="text" value="" rel="newCategory"
                   style="display: none">
            <input class="form-control" id="changeCategoryInput" type="text" value="" rel="changeCategory"
                   style="display: none">
            <button class="btn btn-success" onclick="saveCategory()" style="display: none" rel="newCategory">Сохранить
            </button>
            <button class="btn btn-success" id="changeCategoryApply" onclick="changeCategoryApply()"
                    style="display: none" rel="changeCategory">Сохранить изменения
            </button>
            <button class="btn btn-success" id="newCategoryButton" onclick="newCategory()">Новая</button>
            <button class="btn btn-warning" onclick="changeCategory()" id="changeCategoryButton">Изменить выбранную
            </button>
            <button class="btn btn-danger" onclick="cancelChangeCategory()" style="display: none"
                    id="cancelChangeCategoryButton" rel="changeCategory">Отмена
            </button>
            <button class="btn btn-danger" onclick="deleteCategory()">Удалить выбранную</button>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="hideModal()">закрыть</button>
</div>
<script>
    function cancelChangeCategory() {
        $('[rel="changeCategory"]').hide();
        $('#changeCategoryButton').show();
        $('#changeCategoryInput').val('');
        $('#changeCategoryInput').hide();
        $('#changeCategoryApply').hide();
    }

    function changeCategory() {
        $('[rel="changeCategory"]').show();
        $('#changeCategoryButton').hide();
        $('#changeCategoryInput').val($('#category option:selected').text())
    }
    function CategoryChanged(id, name) {
        $('[rel="changeCategory"]').hide();
        $('#changeCategoryButton').show();
        $('#changeCategoryInput').val('');
        $("#category option[value=" + id + "]").remove();
        $('#category').append(new Option(name, id));
        $('#category').val(id).change();
    }
    function changeCategoryApply() {
        let category_id = $('#category').val();
        let category_name = $('#changeCategoryInput').val();
        $.ajax({
            url: "{{ route('lots.manage_change') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: category_id,
                name: category_name,
            },
            success: function (response) {
                if (response?.status == 1) {
                    CategoryChanged(response?.data?.id, category_name);
                }
                console.log(response);
            },
        });
    }

    function saveCategory() {
        let category_name = $('#newCategoryInput').val();
        $.ajax({
            url: "{{ route('lots.manage_new') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: category_name
            },
            success: function (response) {
                if (response?.status == 1) {
                    newCategoryInserted(response?.data?.id, category_name);
                }
                console.log(response);
            },
        });
    }

    function deleteCategory() {
        console.log($('#category').val());
        let category_id = $('#category').val();
        $.ajax({
            url: "{{ route('lots.manage_destroy') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                category_id: category_id,
            },
            success: function (response) {
                if (response?.status == 1) {
                    $("#category option[value=" + category_id + "]").remove();
                }
                console.log(response);
            },
        });
    }
    function newCategory() {
        $('[rel="newCategory"]').show();
        $('#newCategoryButton').hide();
    }
    function newCategoryInserted(id, name) {
        $('[rel="newCategory"]').hide();
        $('#newCategoryButton').show();
        $('#newCategoryInput').val('');
        $('#category').append(new Option(name, id));
        $('#category').val(id).change();
    }
    $('#ChangeCategoryForm').on('submit', function (event) {
        console.log(this);
        event.preventDefault();

        let lot_id = $('#lot_id').val();
        let name = $('#name').val();
        let description = $('#description').val();
        let category_id = $('#category').val();
        let category_name = $('#category option:selected').text();

        // console.log(battery);
        $.ajax({
            url: "{{ route('lots.manage_apply') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                lot_id: lot_id,
                name: name,
                description: description,
                category_id: category_id,

            },
            success: function (response) {
                if (response?.status == 1) {
                    hideModal();
                    // console.log($('#category option:selected').text());
                    change_row(lot_id, name, description, category_name)
                }
                console.log(response);
            },
        });
    });
</script>
