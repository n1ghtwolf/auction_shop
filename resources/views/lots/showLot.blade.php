<div class="modal-header">
    <h4 class="modal-title" id="formModalLabel">Просмотреть лот</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideModal()">×</button>
</div>
<div class="modal-body">
    <div class="form-group row align-items-center">
        <label class="col-sm-3 text-left text-sm-right mb-0">Название лота</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Квартира" value="{{$lot->name}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-3 text-left text-sm-right mb-0">Описание лота</label>
        <div class="col-sm-9">
                <textarea rows="5" class="form-control"
                          placeholder="Описание.." disabled> {{$lot->description}}
                </textarea>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 text-left text-sm-right mb-0">Категория</label>
        <div class="col-sm-9">
            <select class="form-control" disabled>
                <option value="">{{$lot->category->name}}</option>
            </select>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="hideModal()">закрыть</button>
</div>
