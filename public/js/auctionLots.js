function deleteRow(lot_id) {

    $("[lot_id='" + lot_id + "']").remove();
    ajax_call(router.lots.destroy, lot_id, 'delete');

}

function ajax_call(url, data, type) {
    console.log(url);
    console.log(data);
    $.ajax({
        // the server script you want to send your data to
        'url': url,
        // all of your POST/GET variables
        'data': {id: data},
        // you may change this to GET, if you like...
        'type': type,
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
        table.prepend('<tr lot_id="' + row_id + '"><td>' + name + '</td><td>' + description + '</td><td>' + category + '</td><td>' + button_show + button_change + button_destroy + '</td><tr>')
    }
    let id = '?id=';
    let button_show = '<button onClick="showDialog(\'' + router.lots.show + id + row_id + '\')" >просмотреть</button>';
    let button_change = '<button onClick="showDialog(\'' + router.lots.change + id + row_id + '\')">изменить</button>';
    let button_destroy = '<button onclick="deleteRow(' + row_id + ')">удалить</button>';
    $("[lot_id='" + row_id + "']").html('<td>' + name + '</td><td>' + description + '</td><td>' + category + '</td><td>' + button_show + button_change + button_destroy + '</td>');
}
