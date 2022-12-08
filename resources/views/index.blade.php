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
                    onclick="showDialog('{{route('category.show')}}')">Управление категориями
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
    const router = {
        lots:
            {
                show: "{{ route('lots.show') }}",
                change: "{{ route('lots.change') }}",
                destroy: "{{ route('lots.destroy') }}",
            },
        category: {
            show: "{{ route('category.show') }}",
            update: "{{ route('category.update') }}",
            destroy: "{{ route('category.destroy') }}",
            create: "{{ route('category.create') }}",
        }
    };
    var table = $("#table_lots");


</script>
<script src="js/auctionLots.js"></script>
</html>
