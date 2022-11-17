<form id="ChangeLotForm" novalidate="novalidate" method="POST" action="{{ route('lots.update') }}">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Просмотреть лот</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideModal()">×</button>
    </div>
    <div class="modal-body">
        <input type="hidden" id="lot_id" value="{{$lot->id}}">
        <div class="form-group row align-items-center">
            <label class="col-sm-3 text-left text-sm-right mb-0">Название лота</label>
            <div class="col-sm-9">
                <input type="text" id="name" class="form-control" placeholder="Квартира" value="{{$lot->name}}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-left text-sm-right mb-0">Описание лота</label>
            <div class="col-sm-9">
                <textarea rows="5" class="form-control"
                          placeholder="Описание.." id="description"> {{$lot->description}}
                </textarea>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label class="col-sm-3 text-left text-sm-right mb-0">Категория</label>
            <div class="col-sm-9">
                <select class="form-control" id="category">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if ($category->id == $lot->category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="hideModal()">закрыть</button>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>

<script>
    $('#ChangeLotForm').on('submit', function (event) {
        console.log(this);
        event.preventDefault();

        let lot_id = $('#lot_id').val();
        let name = $('#name').val();
        let description = $('#description').val();
        let category_id = $('#category').val();
        let category_name = $('#category option:selected').text();

        // console.log(battery);
        $.ajax({
            url: "{{ route('lots.update') }}",
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
                    console.log($('#category option:selected').text());
                    change_row(lot_id, name, description, category_name)
                }
                console.log(response);
            },
        });
    });
</script>
