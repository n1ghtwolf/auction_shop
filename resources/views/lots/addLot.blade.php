<form id="newLotForm" novalidate="novalidate" method="POST" action="{{ route('lots.create') }}">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title" id="formModalLabel">Добавить лот</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideModal()">×</button>
    </div>
    <div class="modal-body">

        <div class="form-group row align-items-center">
            <label class="col-sm-3 text-left text-sm-right mb-0">Название лота</label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="Квартира" value="" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 text-left text-sm-right mb-0">Описание лота</label>
            <div class="col-sm-9">
                <textarea rows="5" id="description" class="form-control"
                          placeholder="Описание..">
                </textarea>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label class="col-sm-3 text-left text-sm-right mb-0">Название лота</label>
            <div class="col-sm-9">
                <select id="category" name="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="hideModal()">Отмена</button>
        <button type="submit" class="btn btn-primary">Оформить заказ</button>

    </div>
</form>
<script>

    $('#newLotForm').on('submit', function (event) {
        // console.log(this);
        event.preventDefault();

        let name = $('#name').val();
        let description = $('#description').val();
        let category_id = $('#category').val();
        let category_name = $('#category option:selected').text();

        $.ajax({
            url: "{{ route('lots.create') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                name: name,
                description: description,
                category_id: category_id,

            },
            success: function (response) {
                if (response?.status == 1) {
                    hideModal();
                    // console.log($('#category option:selected').text());
                    change_row(response?.data?.id, name, description, category_name, 'addRow')
                }
                console.log(response);
            },
        });
    });
</script>
