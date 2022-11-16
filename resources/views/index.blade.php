<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
<table>
    <thead>
    <tr>
        <th>

        </th>
        <th>
            Название
        </th>
        <th>
            Описание
        </th>
        <th>
            Категория
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($lots as $lot)

        <tr>
            <td>

            </td>
            <td>
                {{$lot->name}}
            </td>
            <td>
                {{$lot->description}}
            </td>
            <td>
                {{$lot->category->name}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
<script>
    window.onload = function () {
        if (window.jQuery) {
            // jQuery is loaded
            console.log("jQuery is loaded");
        } else {
            // jQuery is not loaded
            console.log("jQuery is not loaded");
        }
    }
</script>
</html>
