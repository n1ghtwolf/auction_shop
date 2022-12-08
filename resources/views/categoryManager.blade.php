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
<script src="js/categoryManage.js"></script>
