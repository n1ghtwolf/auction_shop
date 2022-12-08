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

function changeCategoryApply() {
    let category_id = $('#category').val();
    let category_name = $('#changeCategoryInput').val();
    $.ajax({
        url: router.category.update,
        type: "PATCH",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
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
        url: router.category.create,
        type: "POST",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
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
        url: router.category.destroy,
        type: "DELETE",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
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
