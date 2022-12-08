<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</head>
<body>
<table id="table_lots" class="table_price">
    <thead>
    <tr>
        <th>
            Название
        </th>
        <th>
            Описание
        </th>
        <th>
            Категория
            <button class="btn btn-small" id='ManageCategories'
                    onclick="showDialog('{{route('lots.manageCategories')}}')">Управление категориями
            </button>
        </th>
        <th>
            <button id='newAuctionLot' onclick="showDialog('{{route('lots.newLot')}}')">добавить</button>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($lots as $lot)

        <tr lot_id="{{$lot->id}}">
            <td>
                {{$lot->name}}
            </td>
            <td>
                {{$lot->description}}
            </td>
            <td>
                {{$lot->category->name}}
            </td>
            <td>
                <button onclick="showDialog('{{route('lots.show')}}?id={{$lot->id}}')">просмотреть</button>
                <button onclick="showDialog('{{route('lots.change')}}?id={{$lot->id}}')">изменить</button>
                <button id="del_{{$lot->id}}" onclick="deleteRow({{$lot->id}})">удалить</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include('modal')
</body>
<script>
    let table = $("#table_lots");

    function deleteRow(lot_id) {

        $("[lot_id='" + lot_id + "']").remove();
        ajax_call("{{ route('lots.destroy') }}", lot_id);

    }

    function makeForm(row, text) {
        row.innerHTML = "<input type=text value=" + text + ">" + text;
    }

    window.onload = function () {
        if (window.jQuery) {
            // jQuery is loaded
            console.log("jQuery is loaded");
        } else {
            // jQuery is not loaded
            console.log("jQuery is not loaded");
        }
    }

    function ajax_call(url, data) {
        console.log(url);
        console.log(data);
        $.ajax({
            // the server script you want to send your data to
            'url': url,
            // all of your POST/GET variables
            'data': {id: data},
            // you may change this to GET, if you like...
            'type': 'post',
            // the kind of response that you want from the server
            'beforeSend': function () {
                // anything you want to have happen before sending the data to the server...
                // useful for "loading" animations
            }, success: function (response) {
                console.log(response);
            },
        });
    }

    function change_row(row_id, name, description, category, type = 'change') {
        if (type == 'addRow') {
            table.prepend('<tr lot_id="' + row_id + '"><td>' + name + '</td><td>' + description + '</td><td>' + category + '</td><tr>')
        }
        $("[lot_id='" + row_id + "']").html('<td>' + name + '</td><td>' + description + '</td><td>' + category + '</td><td><button onclick="showDialog(\'{{route('lots.show')}}?id=' + row_id + '\')" >просмотреть</button><button onclick="showDialog(\'{{route('lots.change')}}?id=' + row_id + '\')" >изменить</button><button onclick="deleteRow(' + row_id + ')">удалить</td>');
    }

</script>
</html>
